<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferralTransaction extends Model
{
    protected $table = 'referral_transaction';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'user_type', 'referral_owner', 'referral_user'
    ];
}
