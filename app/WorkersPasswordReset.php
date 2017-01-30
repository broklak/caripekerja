<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkersPasswordReset extends Model
{
    protected $table = 'worker_password_reset';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone', 'token', 'tokenUrl'
    ];

    public static function verificationCodeFormat () {
        $randomNumber = rand(100,999);
        $time = substr(time(), -3);
        return $randomNumber.$time;
    }
}
