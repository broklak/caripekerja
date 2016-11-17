<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;;
use App\Helpers\GlobalHelper;
use Illuminate\Support\Facades\Auth;

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
        $data['list'] = Job::all();
        return view('employer.job-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['employer'] = $this->_employer;
        $data['degree'] = config('static.educationDegree');
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
            'salary' => 'numeric',
            'degree' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'type' => 'required',
        ]);

        Job::create([
                'title'             => $request->input('title'),
                'salary'            => $request->input('salary'),
                'employer_id'       => $this->_employer['id'],
                'minimum_degree'    => $request->input('degree'),
                'city'              => $request->input('city'),
                'gender'            => $request->input('gender'),
                'type'              => $request->input('type'),
                'description'       => $request->input('description'),
                'status'            => 1 // SET AUTOMATICALLY ACTIVE FOR NOW
            ]
        );

        $message = GlobalHelper::setDisplayMessage('success', 'Pekerjaan telah berhasil diposting');
        $request->session()->flash('displayMessage', $message);
        return redirect(route('job-list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
