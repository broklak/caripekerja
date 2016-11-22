<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function getOwned ($employerId) {
        $owned = DB::table('worker_transaction')
            ->select('worker_transaction.id', 'workers.name', 'workers.phone', 'workers.email', 'worker_id', 'worker_transaction.status')
            ->where('employer_id', $employerId)
            ->orderBy('worker_transaction.id', 'desc')
            ->join('workers', 'workers.id', '=', 'worker_transaction.worker_id')
            ->get();

        return $owned;
    }
}
