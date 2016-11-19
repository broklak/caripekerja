<?php
/**
 * Created by PhpStorm.
 * User: satrya
 * Date: 11/6/16
 * Time: 9:52 AM
 */

namespace App\Http\Controllers;

use App\Employer;
use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Libraries\LayoutManager;
use App\Province;
use App\WorkerCategory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;


class HomeController extends Controller {


    public function index () {
        GlobalHelper::setNoBanner();
        return view('home.index');
    }

    /**
     * Search
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function workerList (Request $request) {
        $param = $request->input();

        $list = (empty($param)) ? User::all() : User::search($param);

        $data['category'] = WorkerCategory::all();
        $data['province'] = Province::all();
        $data['list'] = $list;
        $data['degree'] = config('static.educationDegree');
        $data['max_exp'] = 30;
        $data['param'] = $param;

        return view('home.worker-list', $data);
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function workerDetail ($workerId) {
        $auth = GlobalHelper::getAuthtype();
        $authData = $auth['authData'];
        $data['isOwner'] = ($auth['role'] == 'worker' && $workerId == $authData['id']) ? true : false;
        $data['detail'] = User::find($workerId);
        $data['experience'] = json_decode($authData['experiences'], true);
        $data['skill'] = json_decode($authData['skills'], true);
        return view('home.worker-detail', $data);
    }

}