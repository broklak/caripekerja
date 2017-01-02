<?php

namespace App\Http\Controllers\Auth;

use App\ReferralTransaction;
use Validator;
use App\Province;
use App\Referral;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Libraries\SendVerificationCode;

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
    protected $redirectTo = '/verifikasi-kontak';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
        $validator = Validator::make($data, [
            'name' => 'required|max:100|min:3',
            'password' => 'required|min:6|confirmed',
            'phone'     => 'required|numeric|unique:workers',
            'referral_code' => 'sometimes|exists:'.env('DB_CONNECTION').'.referral,code'
        ]);

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $createUser = User::create([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
            'phone'     => $data['phone'],
            'referral_code' => $data['referral_code']
        ]);

        if($createUser) {
            $user = array(
                'worker_id' => $createUser->id,
                'phone'     => $createUser->phone
            );
            $sendVerificationCode = new SendVerificationCode($user);
            // CREATE REFERRAL IF USER IS INSERTED
            Referral::create([
                'user_id'   => $createUser->id,
                'user_type' => 1, // 1 FOR WORKER
                'code'      => Referral::referralCodeFormat($userType = 1, $createUser->name)
            ]);

            // CHECK IF REFERRAL CODE IS INSERTED
            if($data['referral_code'] != '') {
                $referralOwner = Referral::where('code', $createUser->referral_code)->first();

                ReferralTransaction::create([
                    'code'   =>  $createUser->referral_code,
                    'user_type' => 1,
                    'referral_owner' => $referralOwner['user_id'],
                    'referral_user' => $createUser->id
                ]);
            }
        }

        return $createUser;
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
}
