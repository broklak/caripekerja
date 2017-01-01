<?php
/**
 * Created by PhpStorm.
 * User: satrya
 * Date: 1/1/17
 * Time: 10:52 PM
 */
namespace App\Libraries;

use App\VerificationCodes;

class SendVerificationCode {

    public function __construct($workerId)
    {
        $this->createVerificationCode($workerId);
    }

    public function createVerificationCode ($workerId){
        $code = VerificationCodes::verificationCodeFormat();
        $verify = new VerificationCodes;

        $verify->worker_id  = $workerId;
        $verify->code       = $code;

        $verify->save();
        return $code;
    }

}