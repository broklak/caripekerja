<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificationCodes extends Model
{
    protected $table = 'verification_codes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'worker_id', 'status'
    ];

    public static function verificationCodeFormat () {
        $randomNumber = rand(100,999);
        $time = substr(time(), -3);
        return $randomNumber.$time;
    }
}
