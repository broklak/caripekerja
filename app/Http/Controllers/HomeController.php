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
use Illuminate\Support\Facades\Auth;
use App\User;


class HomeController extends Controller {


    public function index () {
        return view('home.index');
    }

    public function workerList () {
        $data['list'] = User::all();
        return view('home.worker-list', $data);
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function workerDetail ($workerId) {
        $data['detail'] = User::find($workerId);
        return view('home.worker-detail', $data);
    }
}