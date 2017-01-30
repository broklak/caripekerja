<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\WorkersPasswordReset;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Libraries\SMS\VerifyResetPassword;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/verifikasi-kontak';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->middleware('employer.guest', ['except' => 'logout']);
    }

    /**
     * Get the failed login response instance.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember', 'role'))
            ->withErrors([
                $this->username() => Lang::get('auth.failed'),
            ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'phone';
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Display verification code page for worker
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function requestTokenChangePassword(Request $request){
        $submit = $request->input('submit');

        if($submit != null) {
            $this->validate($request, [
                'phone' => 'required',
            ]);

            $phone = $request->input('phone');
            $getUser = User::where('phone', $phone)->first();

            if(!$getUser) {
                $message = GlobalHelper::setDisplayMessage('error', 'Nomor telepon tidak terdaftar');
                return redirect(route('request-change-password'))->with('displayMessage', $message);
            }

            $getTodayCode = WorkersPasswordReset::where('phone',$phone)
                ->where('created_at', '>', date('Y-m-d 00:00:00'))->count();

            if($getTodayCode >= 2) {
                $message = GlobalHelper::setDisplayMessage('error', 'Anda telah melewati batas kirim reset password dalam sehari (Maksimal 2 kali dalam sehari).');
                return redirect(route('request-change-password'))->with('displayMessage', $message);
            }

            $token = str_random(20);
            $code = WorkersPasswordReset::verificationCodeFormat();
            WorkersPasswordReset::create([
               'phone'  => $phone,
               'token'  => $code,
               'tokenUrl' => $token,
               'status' => 0
            ]);

            $user = array(
                'phone'     => $phone,
                'code'      => $code
            );
            $sendSms = new VerifyResetPassword($user);
            return redirect(route('change-password-forget', ['token' => $token]));
        }
        return view('user.request-forget-password');
    }

    /**
     * Display verification code page for worker
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $token
     * @return \Illuminate\Http\Response
     */
    public function applyTokenChangePassword(Request $request, $token){
        $validateToken = $this->validateToken($token);
        if(!$validateToken){
            $message = GlobalHelper::setDisplayMessage('error', 'Token tidak valid. Permintaan tidak dapat dipenuhi');
            return redirect(route('request-change-password'))->with('displayMessage', $message);
        }
        $phone = $validateToken['phone'];
        $submit = $request->input('submit');

        if($submit != null) {
            $this->validate($request, [
                'code' => 'required',
            ]);

            $code = $request->input('code');
            $getCode = WorkersPasswordReset::where('phone', $phone)
                ->where('token', $code)
                ->where('status', 0)
                ->first();

            if(!$getCode) {
                $message = GlobalHelper::setDisplayMessage('error', 'Kode verifikasi tidak sesuai');
                return redirect(route('change-password-forget', ['token' => $token]))->with('displayMessage', $message);
            }

            // UPDATE STATUS VERIFICATION CODE
            WorkersPasswordReset::where('phone', $phone)
                ->where('token', $code)
                ->where('status', 0)
                ->update(['status' => 1]);

            $message = GlobalHelper::setDisplayMessage('success', 'Silahkan masukkan password baru anda');
            return redirect(route('worker-reset-password', ['token' => $token]))->with('displayMessage', $message);
        }
        return view('user.worker-verify-password');
    }

    /**
     * Display verification code page for worker
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $token
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(Request $request, $token){
        $validateToken = $this->validateToken($token);
        if(!$validateToken){
            $message = GlobalHelper::setDisplayMessage('error', 'Token tidak valid. Permintaan tidak dapat dipenuhi');
            return redirect(route('request-change-password'))->with('displayMessage', $message);
        }
        $phone = $validateToken['phone'];
        $submit = $request->input('submit');

        if($submit != null) {
            $this->validate($request, [
                'newpass' => 'required|min:6',
                'conpass' => 'required|same:newpass',
            ]);
            $newpass = $request->input('newpass');

            $getUser = User::where('phone', $phone)->first();

            $user = User::find($getUser['id']);

            $user->password = bcrypt($newpass);

            $user->save();

            $message = GlobalHelper::setDisplayMessage('success', 'Silahkan masuk dengan password baru anda');
            return redirect(route('login'))->with('displayMessage', $message);
        }
        return view('user.reset-password');
    }

    private function validateToken($token){
        if(!$token){
            return false;
        }

        $getDataByToken = WorkersPasswordReset::where('tokenUrl', $token)->first();
        if(!$getDataByToken){
            return false;
        }

        return $getDataByToken;
    }
}
