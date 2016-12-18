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

    public static function getAll ($criteria = array(), $perPage, $sort = 'jobs.id') {
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

        if(isset($criteria['type']) && $criteria['type'] != 0) {
            $type = ['jobs.type', '=', $criteria['type']];
            array_push($where,$type);
        }

        if(isset($criteria['salary'])) {
            $count = count($criteria['salary']);
            sort($criteria['salary']);
            $start = $criteria['salary'][0];
            $end = $criteria['salary'][$count - 1];
            if($start == 1) {
                $salaryMin = 500000;
            } elseif($start == 2) {
                $salaryMin = 1000001;
            } elseif($start == 3) {
                $salaryMin = 3000001;
            } elseif($start == 4) {
                $salaryMin = 5000001;
            } else {
                $salaryMin = 0;
            }

            if($end == 1) {
                $salaryMax = 1000000;
            } elseif($end == 2) {
                $salaryMax = 3000000;
            } elseif($end == 3) {
                $salaryMax = 5000000;
            } elseif($end == 4) {
                $salaryMax = 10000000;
            } else {
                $salaryMax = 100000000;
            }

            $salaryMin = ['salary_min', '>=', $salaryMin];
            $salaryMax = ['salary_min', '<=', $salaryMax];

            array_push($where,$salaryMin);
            array_push($where,$salaryMax);
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
                ->orderBy($sort, 'desc')
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
