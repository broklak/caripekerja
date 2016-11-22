<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JobApply extends Model
{
    protected $table = 'job_apply';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'worker_id', 'job_id', 'status'
    ];

    public static function getAppliedByWorker ($workerId, $perPage) {
        $table = 'jobs';
        $list = DB::table($table)
            ->select('jobs.id', 'employers.name as employerName', 'employers.photo_profile as employerPhoto', 'title', 'jobs.description', 'province.name as provinceName',
                    'start_date', 'end_date', 'age_min', 'age_max', 'salary_min', 'salary_max', 'jobs.created_at', 'job_apply.status')
            ->where('jobs.status', 1)
            ->where('job_apply.worker_id', $workerId)
            ->join('employers', 'employers.id', '=', 'jobs.employer_id')
            ->join('province', 'province.id', '=', 'jobs.city')
            ->join('job_apply', 'job_apply.job_id', '=', 'jobs.id')
            ->orderBy('jobs.id', 'desc')
            ->paginate($perPage);

        $job = array();
        foreach($list as $user) {
            $job[] = (array) $user;
        }

        $data['job'] = $job;
        $data['link'] = $list->links();

        return $data;
    }
}
