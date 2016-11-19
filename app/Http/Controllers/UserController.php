<?php

namespace App\Http\Controllers;

use App\Employer;
use App\Job;
use App\JobApply;
use App\Mail\JobApplied;
use App\User;
use App\WorkerCategory;
use Illuminate\Http\Request;
use App\Referral;
use App\Province;
use App\Helpers\GlobalHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

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

    public function employerDetail () {
        $auth = GlobalHelper::getAuthtype();
        $authData = $auth['authData'];
        $employerId = $authData['id'];
        $data['detail'] = Employer::find($employerId);
        return view('employer.employer-detail', $data);
    }

    public function workerDetail () {
        $workerId = $this->_authData['id'];
        $auth = GlobalHelper::getAuthtype();
        $authData = $auth['authData'];
        $data['isOwner'] = ($auth['role'] == 'worker' && $workerId == $authData['id']) ? true : false;
        $data['detail'] = User::find($workerId);
        $data['experience'] = (empty($authData['experiences'])) ? array() : json_decode($authData['experiences'], true);
        $data['skill'] = (empty($authData['skills'])) ? array() : json_decode($authData['skills'], true);
        return view('home.worker-detail', $data);
    }

    public function myProfile () {
        return ($this->_role == 'worker') ? $this->workerDetail() : $this->employerDetail();
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
        $data['max_exp'] = 10;

        $role = ($this->_role == 'worker') ? 1 : 2;
        $referral = Referral::where('user_type', $role)
                                ->where('user_id', $this->_authData['id'])->first();

        $getCategory = explode(',',$this->_authData['category']);
        $skills = empty($this->_authData['skills']) ? '{}' : $this->_authData['skills'];
        $experience = empty($this->_authData['experiences']) ? '{}' : $this->_authData['experiences'];

        $data['referral'] = (isset($referral->code)) ? $referral->code : null;
        $data['authData'] = $this->_authData;
        $data['selected_category'] = $getCategory;
        $data['experience'] = ($this->_role == 'worker') ? json_decode($experience, true) : array();
        $data['skill'] = ($this->_role == 'worker') ? json_decode($skills, true) : array();
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
                'photo' => 'image|mimes:jpeg,png,jpg,JPG,gif,svg|max:5020'
            ]);

            $worker = User::find($workerId);
            $worker->name = $request->input('name');
            $worker->degree = $request->input('degree');
            $worker->gender = $request->input('gender');
            $worker->city = $request->input('city');
            $worker->marital = $request->input('marital');
            $worker->years_experience = $request->input('exp');
            $worker->email = $request->input('email');
            $worker->birthdate = date('Y-m-d H:i:s', strtotime($request->input('birthdate')));
            $worker->category = implode(',', $request->input('category'));

            if($request->photo) {
                $imageName = $this->_role . '-' . $this->_authData['id'] .'.'.strtolower($request->photo->getClientOriginalExtension());
                Storage::delete(public_path('images/profil/'.$this->_role.'/'.$imageName));
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
                'photo' => 'image|mimes:jpeg,png,jpg,JPG,gif,svg|max:5020'
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
                $imageName = $this->_role . '-' . $this->_authData['id'] .'.'.strtolower($request->photo->getClientOriginalExtension());
                Storage::delete(public_path('images/profil/'.$this->_role.'/'.$imageName));
                $request->photo->move(public_path('images/profil/'.$this->_role.'/'), $imageName);
                $employer->photo_profile = $imageName;
            }

            $employer->save();
        }

        $message = GlobalHelper::setDisplayMessage('success', 'Sukses mengganti profil anda');
        return redirect(route('myaccount-index'))->with('displayMessage', $message);
    }

    /**
     * Add worker experience
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addExperience (Request $request) {
        $workerId = $this->_authData['id'];

        $this->validate($request, [
            'exp_place' => 'required|max:100',
            'exp_role' => 'required|max:100',
            'exp_years' => 'required|max:150',
            'exp_desc' => 'required',
        ]);

        $worker = User::find($workerId);

        $experience = json_decode($worker['experiences'], true);

        $new = array(
            'place'     => $request->input('exp_place'),
            'role'     => $request->input('exp_role'),
            'years'     => $request->input('exp_years'),
            'desc'     => $request->input('exp_desc')
        );
        $experience[] = $new;

        $worker->experiences = json_encode($experience);

        $worker->save();

        $message = GlobalHelper::setDisplayMessage('success', 'Sukses menambah pengalaman anda');
        return redirect(route('myaccount-index'))->with('displayMessage', $message);
    }

    /**
     * Add worker experience
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addSkill (Request $request) {
        $workerId = $this->_authData['id'];

        $this->validate($request, [
            'skill_name' => 'required|max:100',
            'skill_level' => 'required',
        ]);

        $worker = User::find($workerId);

        $skill = json_decode($worker['skills'], true);

        $new = array(
            'name'     => $request->input('skill_name'),
            'level'     => $request->input('skill_level'),
        );
        $skill[] = $new;

        $worker->skills = json_encode($skill);

        $worker->save();

        $message = GlobalHelper::setDisplayMessage('success', 'Sukses menambah keahlian anda');
        return redirect(route('myaccount-index'))->with('displayMessage', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $jobId
     * @return \Illuminate\Http\Response
     */
    public function applyJob($jobId)
    {
        $job = Job::find($jobId);
        $workerId = $this->_authData['id'];
        $employerId = $job['employer_id'];
        $employer = Employer::find($employerId);
        $email = $employer['email'];

        JobApply::create([
           'worker_id'  => $workerId,
           'job_id'     => $jobId,
            'status'    => 0
        ]);


        Mail::to($email)->send(new JobApplied($job, $employer, $this->_authData));

        $message = GlobalHelper::setDisplayMessage('success', 'Sukses mengirim lamaran untuk pekerjaan '.$job['title']. 'di '.$employer['name']);
        return redirect(route('myaccount-profile'))->with('displayMessage', $message);

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
