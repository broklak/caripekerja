<?php

namespace App\Helpers;

use App\WorkerCategory;
use Illuminate\Http\Request;
use App\Libraries\LayoutManager;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class GlobalHelper
{
    public static function setDisplayMessage($messageType = 'error', $message = 'Error Message')
    {
        $message = '<div class="notification ' . $messageType . '">' . $message . '</div>';
        return $message;
    }

    public static function moneyFormat ($money) {
        $currency = 'Rp ';
        $money = $currency . number_format($money,0,',',',');

        return $money;
    }

    public static function getAgeByBirthdate ($birthdate) {
        if($birthdate == null || empty($birthdate)) {
            return '25 Tahun';
        }

        $now = time();
        $birthdate = strtotime($birthdate);

        $age = floor(($now - $birthdate) / 31536000); // value of year in seconds

        $age = ($age > 40 || $age < 10) ? 25 : $age;
        return $age.' Tahun';
    }

    public static function maritalStatus ($marital) {
        $status = ($marital == 1) ? 'Sudah Menikah' : 'Belum Menikah';

        return $status;
    }

    public static function setNoBanner () {
        View::composer('*', function(){
            View::share('banner_title', null);
        });
    }

    public static function setUserImage ($image) {
        if($image == null || '') {
            return asset('images/user/no-image.png');
        }

        return self::getUserProfilPath($image);
    }

    public static function setEmployerImage ($image) {
        if($image == null || '') {
            return asset('images/user/no-image.png');
        }

        return self::getEmployerProfilPath($image);
    }

    public static function getCityName($city_id) {
        if($city_id == null) {
            return 'Indonesia';
        }

        return \App\Province::find($city_id)->name;
    }

    public static function getUserProfilPath($image) {
        return asset('images/profil/worker/'.$image);
    }

    public static function getEmployerProfilPath($image) {
        return asset('images/profil/employer/'.$image);
    }

    public static function getHowLongTime ($date) {
        $from = strtotime($date);
        $now = time();

        $diff = abs($now - $from);

        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        if($days == 0) {
            return 'Hari ini';
        }

        if($days == 1) {
            return 'Kemarin';
        }

        return $days . ' Hari yang lalu';
    }

    public static function skillLevel ($skill) {
        if($skill == 25) {
            return 'Pemula';
        } else if($skill == 50) {
            return 'Terbiasa';
        } else if($skill == 75) {
            return 'Terampil';
        } else {
            return 'Sangat Ahli';
        }
    }

    public static function getAuthtype () {
        $worker = Auth::user();
        $employer = Auth::guard('employer')->user();

        if($worker || $employer) {
            return array(
                'isLogged'  => true,
                'authData'  => ($worker) ? $worker : $employer,
                'role'      => ($worker) ? 'worker' : 'employer',
            );
        }

        return array(
            'isLogged'  => false,
            'authData'  => null,
            'role'      => null
        );
    }

    public static function getWorkerCategory ($category) {
        if($category == null || empty($category))
        {
            return null;
        }

        $category = explode(',', $category);
        $arrCategory = array();
        foreach ($category as $row) {
            $arrCategory[] = (isset(WorkerCategory::find($row)->name)) ? WorkerCategory::find($row)->name : null ;
        }

        return implode(', ', $arrCategory);
    }
}

