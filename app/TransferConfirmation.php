<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferConfirmation extends Model
{
    protected $table = 'transfer_confirmation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'account_number', 'account_name', 'amount', 'transfer_to', 'package'
    ];
}
