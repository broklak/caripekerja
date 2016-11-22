<?php

namespace App\Http\Controllers;

use App\Job;
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
        $this->middleware('employer', ['except' => 'index']);
        $this->_employer = Auth::guard('employer')->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = Job::getAll();
        return view('employer.job-index', $data);
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
        return redirect(route('job-list'));
    }

    /**
     * Show owned worker
     * @return \Illuminate\Http\Response
     */
    public function getShortlistedWorker () {
        $employerId = $this->_employer['id'];
        $data['worker'] = WorkerTransaction::getOwned($employerId);
        return view('employer.owned-worker', $data);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
