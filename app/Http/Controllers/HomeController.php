<?php
/**
 * Created by PhpStorm.
 * User: satrya
 * Date: 11/6/16
 * Time: 9:52 AM
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Libraries\LayoutManager;


class HomeController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function index () {
        return view('home.index', array('name' => 'Rangga'));
    }
}