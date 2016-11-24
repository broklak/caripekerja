<?php

namespace App\Http\Controllers\EmployerAuth;

use App\Employer;
use Validator;
use App\Referral;
use App\ReferralTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/profil-saya';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('employer.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:employers',
            'password' => 'required|min:6|confirmed',
            'referral_code' => 'sometimes|exists:'.env('DB_CONNECTION').'.referral,code'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Employer
     */
    protected function create(array $data)
    {
        $createEmployer = Employer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'referral_code' => $data['referral_code'],
            'quota'     => 0
        ]);

        if($createEmployer) {
            // CREATE REFERRAL IF USER IS INSERTED
            Referral::create([
                'user_id'   => $createEmployer->id,
                'user_type' => 2, // 1 FOR WORKER
                'code'      => Referral::referralCodeFormat($userType = 2, $createEmployer->name)
            ]);

            // CHECK IF REFERRAL CODE IS INSERTED
            if($data['referral_code'] != '') {
                $referralOwner = Referral::where('code', $createEmployer->referral_code)->first();

                ReferralTransaction::create([
                    'code'   =>  $createEmployer->referral_code,
                    'user_type' => 2,
                    'referral_owner' => $referralOwner['user_id'],
                    'referral_user' => $createEmployer->id
                ]);
            }
        }

        return $createEmployer;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('employer');
    }
}
