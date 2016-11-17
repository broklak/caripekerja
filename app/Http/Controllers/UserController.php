<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referral;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $_role;
    protected $_authData;

    public function __construct()
    {
        $auth = $this->checkMiddleware();
        $this->middleware($auth['middleware']);
        $this->_role = $auth['role'];
        $this->_authData = $auth['authData'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myAccount() {
        $role = ($this->_role == 'worker') ? 1 : 2;
        $referral = Referral::where('user_type', $role)
                                ->where('user_id', $this->_authData['id'])->first();

        $data['referral'] = (isset($referral->code)) ? $referral->code : null;
        $data['authData'] = $this->_authData;
        return view('user.myaccount-index', $data);
    }

    private function checkLogin() {
        $worker = Auth::user();
        $employer = Auth::guard('employer')->user();

        if($worker || $employer) {
            return array(
                'isLogged'  => true,
                'authData'  => ($worker) ? $worker : $employer,
                'role'      => ($worker) ? 'worker' : 'employer'
            );
        }

        return array(
            'isLogged'  => false,
            'authData'  => null,
            'role'      => 'worker'
        );
    }

    private function checkMiddleware () {
        $auth = $this->checkLogin();
        if($auth['isLogged']) {
            $auth['middleware'] = $auth['role'];
            return $auth;
        }

        $auth['middleware'] = 'user';
        return $auth;
    }
}
