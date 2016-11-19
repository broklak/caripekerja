<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'employer_id', 'salary_min', 'salary_max', 'minimum_degree', 'gender', 'closing_date', 'type', 'status', 'description', 'city', 'age_min', 'age_max', 'start_date', 'end_date', 'category'
    ];

    public static function getAll () {
        $table = 'jobs';
        $list = DB::table($table)
                ->select('jobs.id', 'employers.name as employerName', 'employers.photo_profile as employerPhoto', 'title', 'jobs.description', 'province.name as provinceName', 'start_date', 'end_date', 'age_min', 'age_max', 'salary_min', 'salary_max', 'jobs.created_at')
                ->where('jobs.status', 1)
                ->join('employers', 'employers.id', '=', 'jobs.employer_id')
                ->join('province', 'province.id', '=', 'jobs.city')
                ->orderBy('jobs.id', 'desc')
                ->get();

        $job = array();
        foreach($list as $user) {
            $job[] = (array) $user;
        }
        return $job;
    }

}
