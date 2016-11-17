<?php

namespace App\Http\Controllers;

use App\Employer;
use App\User;
use App\WorkerCategory;
use Illuminate\Http\Request;
use App\Referral;
use App\Province;
use App\Helpers\GlobalHelper;
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
        $data['category'] = WorkerCategory::all();
        $data['province'] = Province::all();
        $data['degree'] = config('static.educationDegree');
        $data['max_exp'] = 30;

        $role = ($this->_role == 'worker') ? 1 : 2;
        $referral = Referral::where('user_type', $role)
                                ->where('user_id', $this->_authData['id'])->first();
        $getCategory = explode(',',$this->_authData['category']);

        $data['referral'] = (isset($referral->code)) ? $referral->code : null;
        $data['authData'] = $this->_authData;
        $data['selected_category'] = $getCategory;
        $data['image'] = ($this->_authData['photo_profile'] == null) ? asset('images').'/user/no-image.png' : asset('images') . '/profil/'.$this->_role . '/' . $this->_authData['photo_profile'];

        return view('user.myaccount-index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($this->_role == 'worker') {
            $workerId = $this->_authData['id'];

            $this->validate($request, [
                'name' => 'required|max:100',
                'degree' => 'required',
                'city' => 'required',
                'gender' => 'required',
                'marital' => 'required',
                'birthdate' => 'required',
                'exp'       => 'required',
                'category'   => 'required',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $worker = User::find($workerId);
            $worker->name = $request->input('name');
            $worker->degree = $request->input('degree');
            $worker->gender = $request->input('gender');
            $worker->city = $request->input('city');
            $worker->marital = $request->input('marital');
            $worker->years_experience = $request->input('exp');
            $worker->birthdate = date('Y-m-d H:i:s', strtotime($request->input('birthdate')));
            $worker->category = implode(',', $request->input('category'));

            if($request->photo) {
                $imageName = $this->_role . '-' . $this->_authData['id'] .'.'.$request->photo->getClientOriginalExtension();
                $request->photo->move(public_path('images/profil/'.$this->_role.'/'), $imageName);
                $worker->photo_profile = $imageName;
            }

            $worker->save();

        } else {
            $employerId = $this->_authData['id'];

            $this->validate($request, [
                'name' => 'required|max:100',
                'phone' => 'required|max:50',
                'city' => 'required',
                'address' => 'required|max:255',
                'category' => 'required|max:100',
                'name_owner' => 'required|max:100',
                'description' => 'required|max:200',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $employer = Employer::find($employerId);
            $employer->name = $request->input('name');
            $employer->phone = $request->input('phone');
            $employer->city = $request->input('city');
            $employer->address = $request->input('address');
            $employer->ukm_category = $request->input('category');
            $employer->name_owner = $request->input('name_owner');
            $employer->description = $request->input('description');

            if($request->photo) {
                $imageName = $this->_role . '-' . $this->_authData['id'] .'.'.$request->photo->getClientOriginalExtension();
                $request->photo->move(public_path('images/profil/'.$this->_role.'/'), $imageName);
                $employer->photo_profile = $imageName;
            }

            $employer->save();
        }

        $message = GlobalHelper::setDisplayMessage('success', 'Sukses mengganti profil anda');
        return redirect(route('myaccount-index'))->with('displayMessage', $message);
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
