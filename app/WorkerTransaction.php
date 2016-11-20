<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkerTransaction extends Model
{
    protected $table = 'worker_transaction';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employer_id', 'worker_id', 'status'
    ];
}
