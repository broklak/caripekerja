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
        'name', 'email', 'password', 'phone', 'gender', 'degree', 'city', 'birthdate', 'marital', 'verified', 'referral_code', 'years_experience'
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
    public static function search ($criteria = array()) {
        $table = 'workers';
        $where = array();

        if($criteria['category'] != 0){
            $category = ['category', 'like', $criteria['category']];
            array_push($where,$category);
        }

        if($criteria['gender'] != 0) {
            $gender = ['gender', '=', $criteria['gender']];
            array_push($where,$gender);
        }

        if($criteria['city'] != 0) {
            $city = ['city', '=', $criteria['city']];
            array_push($where,$city);
        }

        if($criteria['status'] != 0) {
            $status = ['marital', '=', $criteria['status']];
            array_push($where,$status);
        }

        if($criteria['degree'] != 0) {
            $degree = ['degree', '=', $criteria['degree']];
            array_push($where,$degree);
        }

        if($criteria['exp'] != 0) {
            $exp = ['years_experience', '=', $criteria['exp']];
            array_push($where,$exp);
        }

        if($criteria['min_age'] != '') {
            $yearBack = date('Y-m-d', strtotime("- ".$criteria['min_age']." years"));

            $age = ['birthdate', '<', $yearBack];
            array_push($where,$age);
        }

        if($criteria['max_age'] != '') {
            $yearBack = date('Y-m-d', strtotime("- ".$criteria['max_age']." years"));

            $age = ['birthdate', '>', $yearBack];
            array_push($where,$age);
        }


        $list = DB::table($table)->where($where)->get();

        $worker = array();
        foreach($list as $user) {
            $worker[] = (array) $user;
        }
        return $worker;
    }
}
