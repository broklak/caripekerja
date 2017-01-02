<?php

namespace App\Http\Controllers;

use App\Employer;
use App\Job;
use App\JobApply;
use App\Mail\JobApplied;
use App\User;
use App\VerificationCodes;
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
use App\Libraries\SendVerificationCode;

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
        $getFirstCategory = explode(',',$authData['category']);
        $first = (is_array($getFirstCategory)) ? $getFirstCategory[0] : null;
        $getImage = GlobalHelper::getWorkerCoverImage($first);

        $data['coverImage']     = $getImage;
        $data['otherWorker']    = null;
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
                'oldpass' => 'required',
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

            $edu = (is_array($request->input('edu_name'))) ? array_filter($request->input('edu_name')) : array();
            $exp = (is_array($request->input('exp_place'))) ? array_filter($request->input('exp_place')) : array();
            $skill = (is_array($request->input('skill_name'))) ? array_filter($request->input('skill_name')) : array();

            $exp_role = $request->input('exp_role');
            $exp_start = $request->input('exp_start_year');
            $exp_end = $request->input('exp_end_year');
            $exp_notes = $request->input('exp_desc');

            $experience = array();
            foreach($exp as $key => $expData){
                $newExp = array(
                    'place'     => $expData,
                    'role'     => $exp_role[$key],
                    'start'     => $exp_start[$key],
                    'end'     => $exp_end[$key],
                    'desc'     => $exp_notes[$key]
                );
                $experience[] = $newExp;
            }
            $worker->experiences = json_encode($experience);

            $edu_level = $request->input('edu_level');
            $edu_start = $request->input('edu_start_year');
            $edu_end = $request->input('edu_end_year');
            $edu_notes = $request->input('edu_desc');

            $eduExist = array();
            foreach($edu as $key => $eduData){
                $new = array(
                    'name'     => $eduData,
                    'level'     => $edu_level[$key],
                    'start'     => $edu_start[$key],
                    'end'     => $edu_end[$key],
                    'desc'     => $edu_notes[$key],
                );
                $eduExist[] = $new;
            }
            $worker->education = json_encode($eduExist);

            $skill_level = $request->input('skill_level');
            $skillExist = array();
            foreach($skill as $key => $skillData){
                $newSkill = array(
                    'name'     => $skillData,
                    'level'     => $skill_level[$key],
                );
                $skillExist[] = $newSkill;
            }
            $worker->skills = json_encode($skillExist);

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

    /**
     * Display verification code page for worker
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verifyContact(Request $request){
        $authData = $this->_authData;

        if($authData['contact_verified'] == 1){
            return redirect(route('myaccount-profile'));
        }

        $submit = $request->input('submit');

        if($submit != null) {
            $this->validate($request, [
                'code' => 'required',
            ]);

            $code = $request->input('code');
            $getCode = VerificationCodes::where('worker_id', $authData['id'])
                                ->where('code', $code)
                                ->where('status', 0)
                                ->first();

            if(!$getCode) {
                $message = GlobalHelper::setDisplayMessage('error', 'Kode verifikasi tidak sesuai');
                return redirect(route('worker-verify-contact'))->with('displayMessage', $message);
            }

            // UPDATE STATUS VERIFICATION CODE
            VerificationCodes::where('worker_id', $authData['id'])
                            ->update(['status' => 1]);

            // UPDATE CONTACT VERIFIED OF WORKER
            $worker = User::find($authData['id']);
            $worker->contact_verified = 1;
            $worker->save();

            $message = GlobalHelper::setDisplayMessage('success', 'Selamat! Kontak anda sudah terverifikasi sebagai pekerja.');
            return redirect(route('myaccount-profile'))->with('displayMessage', $message);
        }
        return view('user.worker-verify-contact');
    }

    public function sendSMS(){
        $authData = $this->_authData;
        $workerId = $authData['id'];
        if($this->_role == 'employer'){
            return 'No Access';
        }

        $getTodayCode = VerificationCodes::where('worker_id',$workerId)
                                            ->where('created_at', '>', date('Y-m-d 00:00:00'))->count();

        if($getTodayCode >= 3){
            $message = GlobalHelper::setDisplayMessage('error', 'Anda telah melewati batas kirim kode verifikasi dalam sehari (Maksimal 3 kali dalam sehari).');
            return redirect(route('worker-verify-contact'))->with('displayMessage', $message);
        }
        $user = array(
                'worker_id' => $workerId,
                'phone'     => $authData['phone']
        );
        $sendSMS = new SendVerificationCode($user);

        $message = GlobalHelper::setDisplayMessage('success', 'Kode verifikasi sudah dikirim melalui sms ke nomor anda.');
        return redirect(route('worker-verify-contact'))->with('displayMessage', $message);;
    }
}
