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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        $perPage = 10;
        $param['employer_id'] = $employerId;
        $getJob = Job::getAll($param, $perPage);

        $data['job'] = $getJob['job'];
        $data['link'] = $getJob['link'];

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
        $data['edu'] = (empty($authData['education'])) ? array() : json_decode($authData['education'], true);
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
     * Display change password page
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request) {
        $submit = $request->input('submit');
        $role = $this->_role;
        $authId = $this->_authData['id'];
        $authData = $this->_authData;

        if($submit != null) {
            $this->validate($request, [
                'oldpass' => 'required:s',
                'newpass' => 'required|min:6',
                'conpass' => 'required|same:newpass',
            ]);

            $oldpass = $request->input('oldpass');
            $newpass = $request->input('newpass');
            $conpass = $request->input('conpass');

            if($role == 'worker') {
                $checkPass = Hash::check($oldpass, $authData['password']);

                if(!$checkPass) {
                    $message = GlobalHelper::setDisplayMessage('error', 'Password lama tidak sesuai');
                    return redirect(route('change-password'))->with('displayMessage', $message);
                }

                $user = User::find($authId);

                $user->password = bcrypt($newpass);

                $user->save();
            } else if($role == 'employer') {
                $checkPass = Hash::check($oldpass, $authData['password']);

                if(!$checkPass) {
                    $message = GlobalHelper::setDisplayMessage('error', 'Password lama tidak sesuai');
                    return redirect(route('change-password'))->with('displayMessage', $message);
                }

                $employer = Employer::find($authId);

                $employer->password = bcrypt($newpass);

                $employer->save();
            }

            $message = GlobalHelper::setDisplayMessage('success', 'Sukses mengganti password anda');
            return redirect(route('change-password'))->with('displayMessage', $message);
        }

        $data['role'] = $role;
        return view('user.change-password', $data);
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


            if($request->input('exp_place') != '') {
                $this->validate($request, [
                    'exp_place' => 'required|max:100',
                    'exp_role' => 'required|max:100',
                    'exp_start_year' => 'required|max:15',
                    'exp_desc' => 'required',
                ]);

                $experience = json_decode($worker['experiences'], true);

                $new = array(
                    'place'     => $request->input('exp_place'),
                    'role'     => $request->input('exp_role'),
                    'start'     => $request->input('exp_start_year'),
                    'end'     => ($request->input('exp_end_year_now')) ? $request->input('exp_end_year_now') : $request->input('exp_end_year'),
                    'desc'     => $request->input('exp_desc')
                );
                $experience[] = $new;

                $worker->experiences = json_encode($experience);
            }

            if($request->input('edu_name') != '') {
                $this->validate($request, [
                    'edu_name' => 'required|max:100',
                    'edu_level' => 'required',
                    'edu_start_year' => 'required',
                    'edu_end_year' => 'required',
                ]);

                $worker = User::find($workerId);

                $edu = json_decode($worker['education'], true);

                $new = array(
                    'name'     => $request->input('edu_name'),
                    'level'     => $request->input('edu_level'),
                    'start'     => $request->input('edu_start_year'),
                    'end'     => $request->input('edu_end_year'),
                    'desc'     => $request->input('edu_desc'),
                );
                $edu[] = $new;

                $worker->education = json_encode($edu);

            }

            if($request->photo) {
                $imageName = $this->_role . '-' . $this->_authData['id'] .'.'.strtolower($request->photo->getClientOriginalExtension());
                Storage::delete(public_path('images/profil/'.$this->_role.'/'.$worker['photo_profile']));
                $request->photo->move(public_path('images/profil/'.$this->_role.'/'), $imageName);
                $worker->photo_profile = $imageName;
            }

            $worker->save();
            $message = GlobalHelper::setDisplayMessage('success', 'Sukses mengganti profil anda');
            return redirect(route('myaccount-profile'))->with('displayMessage', $message);
        } else {
            $employerId = $this->_authData['id'];

            $this->validate($request, [
                'name' => 'required|max:100',
                'phone' => 'required|max:50',
                'website' => 'max:75',
                'city' => 'required',
                'address' => 'required',
                'category' => 'required|max:100',
                'name_owner' => 'required|max:100',
                'description' => 'required',
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
            $employer->website = $request->input('website');

            if($request->photo) {
                $imageName = $this->_role . '-' . $this->_authData['id'] .'.'.strtolower($request->photo->getClientOriginalExtension());
                Storage::delete(public_path('images/profil/'.$this->_role.'/'.$employer['photo_profile']));
                $request->photo->move(public_path('images/profil/'.$this->_role.'/'), $imageName);
                $employer->photo_profile = $imageName;
            }

            $employer->save();
            $message = GlobalHelper::setDisplayMessage('success', 'Sukses mengganti profil anda');
            return redirect(route('myaccount-index'))->with('displayMessage', $message);
        }
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
            'exp_start_year' => 'required|max:15',
            'exp_end_year' => 'required|max:15',
            'exp_desc' => 'required',
        ]);

        $worker = User::find($workerId);

        $experience = json_decode($worker['experiences'], true);

        $new = array(
            'place'     => $request->input('exp_place'),
            'role'     => $request->input('exp_role'),
            'start'     => $request->input('exp_start_year'),
            'end'     => $request->input('exp_end_year'),
            'desc'     => $request->input('exp_desc')
        );
        $experience[] = $new;

        $worker->experiences = json_encode($experience);

        $worker->save();

        $message = GlobalHelper::setDisplayMessage('success', 'Sukses menambah pengalaman anda');
        return redirect(route('myaccount-index'))->with('displayMessage', $message);
    }

    /**
     * Add worker skill
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
        return redirect(route('myaccount-profile'))->with('displayMessage', $message);
    }

    /**
     * Add worker education
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addEdu (Request $request) {
        die('oi');
        $workerId = $this->_authData['id'];

        $this->validate($request, [
            'edu_name' => 'required|max:100',
            'edu_level' => 'required',
            'edu_start_year' => 'required',
            'edu_end_year' => 'required',
        ]);

        $worker = User::find($workerId);

        $edu = json_decode($worker['education'], true);

        $new = array(
            'name'     => $request->input('edu_name'),
            'level'     => $request->input('edu_level'),
            'start'     => $request->input('edu_start_year'),
            'end'     => $request->input('edu_end_year'),
            'desc'     => $request->input('edu_desc'),
        );
        $edu[] = $new;

        $worker->education = json_encode($edu);

        $worker->save();

        $message = GlobalHelper::setDisplayMessage('success', 'Sukses menambah pendidikan anda');
        return redirect(route('myaccount-profile'))->with('displayMessage', $message);
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

        $message = GlobalHelper::setDisplayMessage('success', 'Sukses mengirim lamaran untuk pekerjaan '.$job['title']. ' di '.$employer['name']);
        return redirect(route('worker-job'))->with('displayMessage', $message);

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

        $auth['middleware'] = 'worker';
        return $auth;
    }

    public function getAppliedJob () {
        $perPage = 10;
        $workerId = $this->_authData['id'];
        $getAppliedJob = JobApply::getAppliedByWorker($workerId, $perPage);
        $data['job'] = $getAppliedJob['job'];
        $data['link'] = $getAppliedJob['link'];

        return view('user.worker-applied-job', $data);
    }
}
