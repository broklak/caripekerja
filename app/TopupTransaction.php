<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopupTransaction extends Model
{
    protected $table = 'topup_transaction';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'employer_id', 'package_id', 'payment_method_id', 'status'
    ];

    public static function generateTransactionCode () {
        $time_end = substr(time(), -2);
        $time_start = substr(time(), 1, 2);
        $random = rand(100, 900);

        return $time_start . $time_end . $random;
    }
}
