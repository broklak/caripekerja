<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'workers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'gender', 'degree', 'city','salary_min','salary_max', 'birthdate', 'marital', 'verified', 'referral_code', 'years_experience','data_verified', 'contact_verified', 'exp_verified', 'education'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * search worker
     */
    public static function search ($criteria = array(), $perPage = 10, $sort = 'id') {
        $table = 'workers';
        $where = array();

        if(isset($criteria['category']) && $criteria['category'] != 0){
            $category = [DB::raw('CONCAT(",", category, ",")'), "like", "%,".$criteria['category'].",%"];
            array_push($where,$category);
        }

        if(isset($criteria['identity-verified']) && $criteria['identity-verified'] != 0){
            $verified = $criteria['identity-verified'];

            if($verified == 1){
                $identity = ['data_verified', '=', 1];
            } else {
                $identity = ['data_verified', '=', 0];
            }
            array_push($where,$identity);
        }

        if(isset($criteria['contact-verified']) && $criteria['contact-verified'] != 0){
            $contact = $criteria['contact-verified'];

            if($contact == 1){
                $con = ['contact_verified', '=', 1];
            } else {
                $con = ['contact_verified', '=', 0];
            }
            array_push($where,$con);
        }

        if(isset($criteria['gender']) && $criteria['gender'] != 0) {
            $gender = ['gender', '=', $criteria['gender']];
            array_push($where,$gender);
        }

        if(isset($criteria['city']) && $criteria['city'] != 0) {
            $city = ['city', '=', $criteria['city']];
            array_push($where,$city);
        }

        if(isset($criteria['status']) && $criteria['status'] != 0) {
            $status = ['marital', '=', $criteria['status']];
            array_push($where,$status);
        }

        if(isset($criteria['degree']) && $criteria['degree'] != '0') {
            $degree = ['degree', '=', $criteria['degree']];
            array_push($where,$degree);
        }

        if(isset($criteria['exp']) && $criteria['exp'] != 0) {
            if($criteria['exp'] == 1) {
                $min = 0;
                $max = 5;
            } elseif($criteria['exp'] == 2) {
                $min = 6;
                $max = 10;
            } elseif($criteria['exp'] == 3) {
                $min = 10;
                $max = 100;
            } else {
                $min = 0;
                $max = 100;
            }

            $expMin = ['years_experience', '>=', $min];
            $expMax = ['years_experience', '<=', $max];
            array_push($where,$expMin);
            array_push($where,$expMax);
        }

        if(isset($criteria['age'])) {
            $count = count($criteria['age']);
            sort($criteria['age']);
            $start = $criteria['age'][0];
            $end = $criteria['age'][$count - 1];
                if($start == 1) {
                    $ageMin = 17;
                } elseif($start == 2) {
                    $ageMin = 25;
                } elseif($start == 3) {
                    $ageMin = 35;
                } elseif($start == 4) {
                    $ageMin = 45;
                } else {
                    $ageMin = 0;
                }

                if($end == 1) {
                    $ageMax = 26;
                } elseif($end == 2) {
                    $ageMax = 36;
                } elseif($end == 3) {
                    $ageMax = 46;
                } elseif($end == 4) {
                    $ageMax = 60;
                } else {
                    $ageMax = 100;
                }

                $yearStart = date('Y-m-d', strtotime("- $ageMin years"));
                $yearEnd = date('Y-m-d', strtotime("- $ageMax years"));

                $valMin = ['birthdate', '<', $yearStart];
                $valMax = ['birthdate', '>', $yearEnd];

                array_push($where,$valMin);
                array_push($where,$valMax);
            }

        $where[] = ['photo_profile', '<>', 'null'];

        $list = DB::table($table)->where($where)->orderBy($sort, 'desc')->paginate($perPage);

        $worker = array();
        foreach($list as $user) {
            $worker[] = (array) $user;
        }

        $data['link'] = $list->links();
        $data['worker'] = $worker;

        return $data;
    }

    public static function getOtherWorker($workerId,$limit = 4){
        $table = 'workers';
        $where[] = ['photo_profile', '<>', 'null'];
        $where[] = ['id', '<>', $workerId];

        $list = DB::table($table)->where($where)->inRandomOrder()->limit($limit)->get();
        return $list;
    }
}
