<?php

namespace App\Helpers;

use App\WorkerCategory;
use Illuminate\Http\Request;
use App\Libraries\LayoutManager;
use Illuminate\Support\Facades\View;

class GlobalHelper
{
    public static function setDisplayMessage($messageType = 'error', $message = 'Error Message')
    {
        if($messageType == 'error') {
            $messageType = 'danger';
        }

        $message = '<div class="alert alert-' . $messageType . '">' . $message . '</div>';
        return $message;
    }

    public static function moneyFormat ($money) {
        $currency = 'Rp ';
        $money = $currency . number_format($money,0,',',',');

        return $money;
    }

    public static function getAgeByBirthdate ($birthdate) {
        $now = time();
        $birthdate = strtotime($birthdate);

        $age = floor(($now - $birthdate) / 31536000); // value of year in seconds

        return $age;
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
            return 'Belum Terdaftar';
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
            return 'hari ini';
        }

        if($days == 1) {
            return 'kemarin';
        }

        return $days . ' hari yang lalu';
    }
}

