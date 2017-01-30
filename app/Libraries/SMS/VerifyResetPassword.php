<?php
/**
 * Created by PhpStorm.
 * User: satrya
 * Date: 1/1/17
 * Time: 10:52 PM
 */
namespace App\Libraries\SMS;

use App\VerificationCodes;

class VerifyResetPassword {

    private $phone;

    private $code;

    public function __construct($data)
    {
        $this->phone    = $data['phone'];
        $this->code     = $data['code'];
        $this->sendSmsVerification();
    }

    public function sendSmsVerification(){
        $type   = config('app.sms_type');
        $host   = config('app.sms_host');
        $port   = config('app.sms_port');
        $user   = config('app.sms_user');
        $pass   = config('app.sms_password');
        $phone  = $this->phone;
        $message = $this->smsFormat($this->code);

        $url = "http://$host:$port/?User=$user&Password=$pass&PhoneNumber=$phone&Text=$message";
        $send = file_get_contents($url);
    }

    public function smsFormat($code){
        return "Kode+verifikasi+password+akun+CARIPEKERJA+anda+$code.+Silahkan+masukkan+kode+untuk+mengubah+password+anda.";
    }

}