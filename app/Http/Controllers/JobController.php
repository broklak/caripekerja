<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobApply;
use App\WorkerTransaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;;
use App\Helpers\GlobalHelper;
use Illuminate\Support\Facades\Auth;
use App\WorkerCategory;

class JobController extends Controller
{
    var $_employer;

    public function __construct()
    {
        $this->middleware('employer', ['except' => ['index', 'detail']]);
        $this->_employer = Auth::guard('employer')->user();
    }

    /**
     * Search
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $param = $request->input();
        $perPage = 20;

        $sort = 'jobs.id';
        if(isset($param['sort']) && $param['sort'] == 'salary') {
            $sort = 'salary_min';
        }

        $getJob = Job::getAll($param, $perPage, $sort);

        $getAuth = GlobalHelper::getAuthtype();
        $role = $getAuth['role'];

        $data['isValidWorker'] = ($role == 'worker') ? true : false;
        $data['category'] = WorkerCategory::all();
        $data['province'] = Province::all();
        $data['degree'] = config('static.educationDegree');
        $data['max_exp'] = 30;
        $data['list'] = $getJob['job'];
        $data['link'] = $getJob['link'];
        $data['param'] = $param;
        return view('employer.job-index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $detail = Job::getDetail($id);
        $getAuth = GlobalHelper::getAuthtype();
        $role = $getAuth['role'];
        $authData = $getAuth['authData'];

        $isApplied = false;
        if($role == 'worker'){
            $getJobApply = JobApply::where('job_id', $id)->where('worker_id', $authData['id'])->first();
            $isApplied = ($getJobApply) ? true : false;
        }

        if($detail->gender == 0){
            $detail->gender = 'Pria atau Wanita';
        } elseif($detail->gender == 1){
            $detail->gender = 'Pria';
        } else{
            $detail->gender = 'Wanita';
        }

        if($detail->age_min == 0 && $detail->age_max == 0){
            $detail->age = 'Tidak ada batasan usia';
        } elseif($detail->age_min == 0){
            $detail->age = 'Usia dibawah '.$detail->age_max.' tahun';
        } elseif($detail->age_max == 0){
            $detail->age = 'Usia diatas '.$detail->age_mix.' tahun';
        } else{
            $detail->age = 'Usia '.$detail->age_min.' - '.$detail->age_max.' tahun';
        }

        $data['isApplied'] = $isApplied;
        $data['detail'] = (array) $detail;
        return view('employer.job-detail', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = WorkerCategory::all();
        $data['employer'] = $this->_employer;
        $data['degree'] = config('static.educationDegree');
        $data['max_exp']    = 10;
        $data['province'] = Province::all();
        return view('employer.job-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'salary_min' => 'numeric|required',
            'salary_max' => 'numeric|required',
            'degree' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'type' => 'required',
            'exp'   => 'required',
            'age_min'   => 'numeric|required',
            'age_max'   => 'numeric|required',
            'start_date'   => 'required',
            'end_date'   => 'required',
            'category'   => 'required'
        ]);

        Job::create([
                'title'             => $request->input('title'),
                'salary_min'        => $request->input('salary_min'),
                'salary_max'        => $request->input('salary_max'),
                'employer_id'       => $this->_employer['id'],
                'minimum_degree'    => $request->input('degree'),
                'city'              => $request->input('city'),
                'gender'            => $request->input('gender'),
                'type'              => $request->input('type'),
                'exp'               => $request->input('exp'),
                'description'       => $request->input('description'),
                'age_min'           => $request->input('age_min'),
                'age_max'           => $request->input('age_max'),
                'start_date'        => date('Y-m-d', strtotime($request->input('start_date'))),
                'end_date'          => date('Y-m-d', strtotime($request->input('end_date'))),
                'category'          => $request->input('category'),
                'status'            => 1 // SET AUTOMATICALLY ACTIVE FOR NOW
            ]
        );

        $message = GlobalHelper::setDisplayMessage('success', 'Pekerjaan telah berhasil diposting');
        $request->session()->flash('displayMessage', $message);
        return redirect(route('employer-job'));
    }

    /**
     * Show owned worker
     * @return \Illuminate\Http\Response
     */
    public function getShortlistedWorker () {
        $employerId = $this->_employer['id'];
        $perPage = 10;
        $getWorker = WorkerTransaction::getOwned($employerId, $perPage);
        $data['worker'] = $getWorker['worker'];
        $data['link'] = $getWorker['link'];
        return view('employer.owned-worker', $data);
    }

    /**
     * Show owned worker
     * @return \Illuminate\Http\Response
     */
    public function getEmployerJob () {
        $employerId = $this->_employer['id'];
        $perPage = 10;
        $param['employer_id'] = $employerId;
        $getJob = Job::getAll($param, $perPage);

        $data['job'] = $getJob['job'];
        $data['link'] = $getJob['link'];
        return view('employer.employer-job', $data);
    }

    /**
     * change status of worker transction
     *
     * @param  int id, int  $status
     * @return \Illuminate\Http\Response
     */
    public function processChangeStatusWorker ($id,$status) {
        $worker = WorkerTransaction::find($id);
        $worker->status = $status;

        $worker->save();

        $message = GlobalHelper::setDisplayMessage('success', 'Sukses menggganti status pekerja');
        return redirect(route('owned-worker'))->with('displayMessage', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = WorkerCategory::all();
        $data['employer'] = $this->_employer;
        $data['degree'] = config('static.educationDegree');
        $data['max_exp']    = 10;
        $data['province'] = Province::all();
        $data['job'] = Job::find($id);
        return view('employer.job-edit', $data);
    }

    /**
     * close application
     *
     * @param  int  $id, int $status
     * @return \Illuminate\Http\Response
     */
    public function processChangeStatusApplication($id, $status)
    {
        $job = Job::find($id);

        $job->status = $status;

        $job->save();

        $message = GlobalHelper::setDisplayMessage('success', 'Sukses menggganti status lowongan');
        return redirect(route('employer-job'))->with('displayMessage', $message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'salary_min' => 'numeric|required',
            'salary_max' => 'numeric|required',
            'degree' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'type' => 'required',
            'exp'   => 'numeric|required',
            'age_min'   => 'numeric|required',
            'age_max'   => 'numeric|required',
            'start_date'   => 'required',
            'end_date'   => 'required',
            'category'   => 'required'
        ]);

        $job = Job::find($id);

        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->salary_min = $request->input('salary_min');
        $job->salary_max = $request->input('salary_max');
        $job->minimum_degree = $request->input('degree');
        $job->city = $request->input('city');
        $job->gender = $request->input('gender');
        $job->type = $request->input('type');
        $job->exp = $request->input('exp');
        $job->age_min = $request->input('age_min');
        $job->age_max = $request->input('age_max');
        $job->start_date = date('Y-m-d', strtotime($request->input('start_date')));
        $job->end_date = date('Y-m-d', strtotime($request->input('end_date')));
        $job->category = $request->input('category');

        $job->save();

        $message = GlobalHelper::setDisplayMessage('success', 'Lowongan kerja berhasil diupdate');
        $request->session()->flash('displayMessage', $message);
        return redirect(route('employer-job'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);

        $title = $job->title;

        Job::destroy($id);

        $message = GlobalHelper::setDisplayMessage('success', 'Anda telah menghapus lowongan '.$title);
        return redirect(route('employer-job'))->with('displayMessage', $message);
    }
}
