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
        'title', 'employer_id', 'salary_min', 'salary_max', 'minimum_degree', 'gender', 'closing_date', 'type', 'status', 'description', 'city', 'age_min', 'age_max', 'start_date', 'end_date', 'category', 'exp'
    ];

    public static function getAll ($criteria = array(), $perPage) {
        $where = array();
        $status = ['jobs.status', '=', 1];
        array_push($where, $status);

        if(isset($criteria['category']) && $criteria['category'] != 0){
            $category = ['category', 'like', $criteria['category']];
            array_push($where,$category);
        }

        if(isset($criteria['city']) && $criteria['city'] != 0) {
            $city = ['jobs.city', '=', $criteria['city']];
            array_push($where,$city);
        }

        if(isset($criteria['min_salary']) && $criteria['min_salary'] != '') {
            $salary = ['salary_min', '>=', $criteria['min_salary']];
            array_push($where,$salary);
        }

        if(isset($criteria['max_salary']) && $criteria['max_salary'] != '') {
            $salary = ['salary_max', '<=', $criteria['max_salary']];
            array_push($where,$salary);
        }

        if(isset($criteria['employer_id']) && $criteria['employer_id'] != '') {
            $key_status = array_search('jobs.status', $where);
            unset($where[$key_status]);
            $employer = ['employer_id', '=', $criteria['employer_id']];
            array_push($where,$employer);
        }

        $table = 'jobs';
        $list = DB::table($table)
                ->select('jobs.id', 'employers.name as employerName', 'employers.photo_profile as employerPhoto', 'title', 'jobs.description',
                    'province.name as provinceName', 'start_date', 'end_date', 'age_min', 'age_max', 'salary_min', 'salary_max', 'jobs.type', 'jobs.created_at', 'jobs.status', 'exp')
                ->where($where)
                ->join('employers', 'employers.id', '=', 'jobs.employer_id')
                ->join('province', 'province.id', '=', 'jobs.city')
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

    public static function getDetail ($jobId) {
        $table = 'jobs';
        $list = DB::table($table)
            ->select('jobs.id', 'employers.name as employerName', 'employers.photo_profile as employerPhoto', 'employers.ukm_category', 'employers.name_owner', 'title', 'jobs.description',
                'province.name as provinceName', 'start_date', 'end_date', 'age_min', 'age_max', 'salary_min', 'salary_max', 'jobs.type', 'jobs.created_at', 'jobs.status', 'exp', 'employers.website')
            ->where('jobs.id', $jobId)
            ->join('employers', 'employers.id', '=', 'jobs.employer_id')
            ->join('province', 'province.id', '=', 'jobs.city')
            ->first();

        return $list;
    }

}
