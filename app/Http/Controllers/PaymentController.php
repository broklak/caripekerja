<?php

namespace App\Http\Controllers;

use App\Employer;
use App\Helpers\GlobalHelper;
use App\Mail\ConfirmTopup;
use App\Mail\TopupRequested;
use App\PaymentMethod;
use App\TopupPackage;
use App\TopupTransaction;
use App\TransferConfirmation;
use App\WorkerTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    var $_employer;

    public function __construct()
    {
        $this->middleware('employer');
        $this->_employer = Auth::guard('employer')->user();
    }

    /**
     * Display a topup page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['package'] = TopupPackage::all();
        $data['payment'] = PaymentMethod::all();
        return view('payment.topup-create', $data);
    }

    /**
     * Display a topup page
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmTopup()
    {
        $data['package'] = TopupPackage::all();
        $data['payment'] = PaymentMethod::all();
        return view('payment.topup-confirm', $data);
    }

    /**
     * Process topup
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processTopup (Request $request) {

        $this->validate($request, [
            'package' => 'required',
            'payment' => 'required'
        ]);

        $payment = PaymentMethod::find($request->input('payment'));
        $accountNumber = $payment['account_number'];
        $accountName = $payment['account_name'];
        $bank = $payment['name'];

        $package = TopupPackage::find($request->input('package'));
        $amount = $package['price'];

        $employerId = $this->_employer['id'];
        $code = TopupTransaction::generateTransactionCode();

        $create = TopupTransaction::create([
           'code'           => $code,
           'employer_id'   => $employerId,
           'package_id'    => $request->input('package'),
            'payment_method_id' => $request->input('payment')
        ]);

        Mail::to($this->_employer['email'])->send(new TopupRequested($package, $payment, $create, $this->_employer));

        $message = GlobalHelper::setDisplayMessage('success', "Silahkan melakukan <b>$bank</b> ke rekening <b>$accountNumber</b> atas nama <b>$accountName</b> sebesar <b>".GlobalHelper::moneyFormat($amount)."</b>. Silahkan cek inbox atau folder spam email anda untuk melihat detil transaksi. Terima Kasih");
        return redirect(route('topup-finished', ['topupId' => $create->id]))->with('displayMessage', $message);

    }

    /**
     * Process Confirmation
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processConfirmTopup (Request $request) {

        $this->validate($request, [
            'code' => 'required',
            'amount' => 'numeric|required',
            'acc_number' => 'required',
            'acc_name'  => 'required',
            'payment'  => 'required',
            'package'   => 'required'
        ]);

        $payment = PaymentMethod::find($request->input('payment'));

        $package = TopupPackage::find($request->input('package'));

        $create = TransferConfirmation::create([
            'code'           => $request->input('code'),
            'account_number'   => $request->input('acc_number'),
            'account_name'    => $request->input('acc_name'),
            'amount' => $request->input('amount'),
            'transfer_to' => $request->input('payment'),
            'package' => $request->input('package'),
        ]);

        Mail::to(config('static.adminEmail'))->send(new ConfirmTopup($package, $payment, $create, $this->_employer));

        $message = GlobalHelper::setDisplayMessage('success', "Konfirmasi pembayaran anda telah kami terima. Silahkan menunggu beberapa saat untuk proses penambahan kuota. Terima Kasih");
        return redirect(route('myaccount-profile'))->with('displayMessage', $message);
    }

    public function approvePayment () {
        if($this->_employer['id'] == 2) {
            return view('payment.topup-approve');
        }

        return 'Not authorized';
    }


    /**
     * Process Confirmation
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processApproveTopup (Request $request) {
        if($this->_employer['id'] == 2) {
            $this->validate($request, [
                'code' => 'required',
            ]);

            $getTrans = TopupTransaction::where('code', $request->input('code'))->first();

            if(!isset($getTrans['code'])) {
                $message = GlobalHelper::setDisplayMessage('error', "Kode Transaksi Salah");
                return redirect(route('topup-approve'))->with('displayMessage', $message);
            }

            if($getTrans['status'] == 1) {
                $message = GlobalHelper::setDisplayMessage('error', "Kode transaksi sudah pernah diapprove");
                return redirect(route('topup-approve'))->with('displayMessage', $message);
            }

            $employer = Employer::find($getTrans['employer_id']);
            $employerName = $employer['name'];


            $package = TopupPackage::find($getTrans['package_id']);
            $kuota = $package['quota'];

            $employer->quota = $employer['quota'] + $package['quota'];

            $getTrans->status = 1;

            $employer->save();
            $getTrans->save();

            $message = GlobalHelper::setDisplayMessage('success', "$kuota kuota untuk $employerName telah berhasil ditambahkan.");
            return redirect(route('topup-approve'))->with('displayMessage', $message);
        }

        return 'Not authorized';
    }

    /**
     * Get worker contact name
     *
     * @param  int  $id
     * @return Response
     */
    public function contactWorker ($workerId) {
        $employerId = $this->_employer['id'];
        $getWorkerTransaction = WorkerTransaction::where('employer_id', $employerId)->where('worker_id', $workerId)->first();
        $ownedByEmployer = (isset($getWorkerTransaction['id'])) ? true : false;

        if($ownedByEmployer) {
            $message = GlobalHelper::setDisplayMessage('error', "Anda sudah memiliki data pekerja ini");
            return redirect(route('worker-detail', ['workerId' => $workerId]))->with('displayMessage', $message);
        }

        WorkerTransaction::create([
            'employer_id' => $employerId,
            'worker_id'     => $workerId,
        ]);

        $employer = Employer::find($employerId);

        $employer->quota = $employer['quota'] - 1;

        $employer->save();

        $message = GlobalHelper::setDisplayMessage('success', "Selamat. Anda telah berhasil membuka data pekerja ini. Kuota telah berkurang 1.");
        return redirect(route('worker-detail', ['workerId' => $workerId]))->with('displayMessage', $message);
    }

    /**
     * Show the sucess page after topup
     *
     * @param  int  $id
     * @return Response
     */

    public function topupFinished ($topupId) {
        $transaction = TopupTransaction::find($topupId);

        if(!isset($transaction['id'])) {
            $data['error'] = 'Data transaksi tidak ditemukan';
            return view('payment.topup-finished', $data);
        }

        $data['topup'] = $transaction;
        $data['employer'] = Employer::find($transaction['employer_id']);
        $data['package'] = TopupPackage::find($transaction['package_id']);
        $data['payment'] = PaymentMethod::find($transaction['payment_method_id']);

//        var_dump($data['employer']); die;

        return view('payment.topup-finished', $data);
    }

}
