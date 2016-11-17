<?php
/**
 * Created by PhpStorm.
 * User: satrya
 * Date: 11/6/16
 * Time: 9:52 AM
 */

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Libraries\LayoutManager;
use App\Province;
use App\WorkerCategory;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Request;


class HomeController extends Controller {


    public function index () {
        GlobalHelper::setNoBanner();
        return view('home.index');
    }

    public function workerList () {
        $data['category'] = WorkerCategory::all();
        $data['province'] = Province::all();
        $data['list'] = User::all();
        $data['degree'] = config('static.educationDegree');
        $data['max_exp'] = 30;
        return view('home.worker-list', $data);
    }

    /**
     * Search
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function workerSearch (Request $request) {

        return $this->workerList();
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