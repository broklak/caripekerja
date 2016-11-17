<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $table = 'referral';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'user_id', 'user_type'
    ];

    public static function referralCodeFormat ($userType, $name) {
        $prefix = ($userType == 1) ? 'p' : 'u';
        $name = strtolower(substr($name, 0, 1) . substr($name, -1, 1));
        $time = substr(time(), -4);

        return $prefix . $name . $time;
    }
}
