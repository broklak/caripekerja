<?php
/**
 * Created by PhpStorm.
 * User: satrya
 * Date: 11/6/16
 * Time: 9:52 AM
 */

namespace App\Http\Controllers;

use App\Employer;
use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Libraries\LayoutManager;
use App\Province;
use App\Subscriber;
use App\WorkerCategory;

use App\WorkerTransaction;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;


class HomeController extends Controller {


    public function index () {
        $data['category'] = WorkerCategory::all();
        $data['province'] = Province::all();
        GlobalHelper::setNoBanner();
        return view('home.index', $data);
    }

    /**
     * Search
     *
     * @param  \Illuminate\Http\Request  $request, string $categoryUrl
     * @return \Illuminate\Http\Response
     */
    public function workerList (Request $request, $categoryUrl = 'all') {
        $param = $request->input();
        $categoryName = 'all';

        if($categoryUrl != 'all') {
            $getCategory = WorkerCategory::where('url', $categoryUrl)->first();
            $param['category'] = (isset($getCategory['id'])) ? $getCategory['id'] : 0;
        }

        if(isset($param['category'])) {
            $getCategoryName = WorkerCategory::find($param['category']);
            $categoryName = (isset($getCategoryName['id'])) ? $getCategoryName['name'] : 'all';
        }

        $sort = (isset($param['sort'])) ? $param['sort'] : 'id';
        if($sort == 'exp') {
            $sort = 'years_experience';
        } elseif($sort == 'age'){
            $sort = 'birthdate';
        } elseif($sort == 'degree') {
            $sort = 'degree';
        } else{
            $sort = 'id';
        }

        $perPage = 20;
        $list = User::search($param, $perPage, $sort);

        $data['categoryTitle'] = $categoryName;
        $data['category'] = WorkerCategory::all();
        $data['province'] = Province::all();
        $data['list'] = $list['worker'];
        $data['link'] = $list['link'];
        $data['degree'] = config('static.educationDegree');
        $data['max_exp'] = 30;
        $data['param'] = $param;

        return view('home.worker-list', $data);
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function workerDetail ($workerId) {
        $authData = User::find($workerId);
        $authDataGlobal = GlobalHelper::getAuthtype();
        $employerId = ($authDataGlobal['role'] == 'employer') ? $authDataGlobal['authData']['id'] : 0;
        $getWorkerTransaction = WorkerTransaction::where('employer_id', $employerId)->where('worker_id', $workerId)->first();

        $ownedByEmployer = (isset($getWorkerTransaction['id'])) ? true : false;
        $quota = ($authDataGlobal['role'] == 'employer') ? $authDataGlobal['authData']['quota'] : 0;

        $getOtherWorker = User::getOtherWorker($workerId, $limit = 4);

        $getFirstCategory = explode(',',$authData['category']);
        $first = (is_array($getFirstCategory)) ? $getFirstCategory[0] : null;
        $getImage = GlobalHelper::getWorkerCoverImage($first);

        $data['coverImage']     = $getImage;
        $data['otherWorker']    = $getOtherWorker;
        $data['ownedByEmployer'] = $ownedByEmployer;
        $data['callLink'] = ($quota > 0) ? route('contact-worker', ['workerId' => $workerId]) : route('topup-create');
        $data['callConfirm'] = ($quota > 0) ? "return confirm('Kuota anda akan dikurangi 1 untuk mendapatkan data kontak ".$authData['name'].", lanjutkan?')" : "alert('Anda tidak memiliki sisa kuota untuk mendapatkan data kontak pekerja. Silahkan melakukan Top Up.')";
        $data['isOwner'] = ($authDataGlobal['role'] == 'worker' && $authDataGlobal['authData']['id'] == $workerId) ? true : false;
        $data['showCallButton'] = ($authDataGlobal['role'] != 'worker' && !$ownedByEmployer) ? true : false;
        $data['detail'] = $authData;
        $data['experience'] = ($authData['experiences'] != null || $authData['experiences'] != '') ? json_decode($authData['experiences'], true) : array();
        $data['skill'] = ($authData['skills'] != null || $authData['skills'] != '') ? json_decode($authData['skills'], true) : array();
        $data['edu'] = ($authData['education'] != null || $authData['education'] != '') ? json_decode($authData['education'], true) : array();
        return view('home.worker-detail', $data);
    }

    /**
     * Submit new subscriber
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addSubscriber(Request $request){
        $this->validate($request, [
            'email' => 'required',
        ]);

        $email = $request->input('email');
        $validateEmail = Subscriber::where('email', $email)->first();

        if($validateEmail){ // EMAIL IS EXIST
            $message = GlobalHelper::setDisplayMessage('error', "Email $email sudah terdaftar di sistem kami sebagai pelanggan newsletter");
            return redirect(route('home'))->with('displayMessage', '<div class="align-center">'.$message.'</div>');
        }

        Subscriber::create([
           'email'  => $email
        ]);

        $message = GlobalHelper::setDisplayMessage('success', "Selamat! Email $email sudah terdaftar. Anda akan mendapatkan berita terbaru tentang Caripekerja");
        return redirect(route('home'))->with('displayMessage', '<div class="align-center">'.$message.'</div>');
    }

}