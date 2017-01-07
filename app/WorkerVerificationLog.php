<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkerVerificationLog extends Model
{
    protected $table = 'worker_verification_log';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'worker_id', 'type', 'status'
    ];
}
