<?php

namespace App\Http\Controllers;

use App\Models\group;
use Illuminate\Http\Request;
use App\Models\session_reqester_request;
use App\Models\form;
use App\Models\student;
use App\Models\teacher;
use App\Models\form_detail;
use Session;

class session_reqester_requestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests =session_reqester_request::all();
        // dd($requests);
        
        return view('session_register_request.index')->withrequests($requests);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $session_regester_request = session_reqester_request::find($id);
        $session_regester_request->delete();

        Session::flash('SUCCESS','This session_regester_request Successfully Delete  !');



        return $this->index();
    }
    /*
    *
    */
    public function studentRequestDetails($id)
    {
        $request = session_reqester_request::find($id);
        $detials = student::find($request->student_id);

        return view('session_register_request.detials')->withrequest($request)
        ->withdetials($detials);

    }

    /*
    *
    */
    public function teacherRequestDetails($id)
    {
        $request = session_reqester_request::find($id);
        $detials = teacher::find($request->teacher_id);

        return view('session_register_request.detials')->withrequest($request)
        ->withdetials($detials);    }

    /*
    *
    */
    public function acceptTeacherRequest($id)
    {
        $request = session_reqester_request::find($id);
        $group = new group();
        $group->name = "new group";
        $group->teacher_id = $request->teacher_id;
        $group->session_id = $request->session_id;
        $group->save();

        return $this->destroy($id);
    }

     /*
    *
    */
    public function acceptStudentRequest($id)
    {
        $request = session_reqester_request::find($id);
        $form = new form();
        $form->student_id = $request->student_id;
        $form->session_id = $request->session_id;
        $form->save();

        
        return $this->destroy($id);
    }

     /*
    *
    */
    public function denyRegisterRequest($id)
    {
        //TODO send notfication to user before delete
        $this->destroy($id);
    }
}
