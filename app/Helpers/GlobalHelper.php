<?php

namespace App\Helpers;

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
        $currency = 'Rp.';
        $money = $currency . number_format($money,0,',','.');

        return $money;
    }

    public static function setNoBanner ($config = array()) {
        View::composer('*', function(){
            View::share('banner_title', null);
        });

    }
}

