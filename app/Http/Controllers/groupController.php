<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\group;
use App\Models\group_detials;
use App\Models\session as ModelsSession;
use Session;

use App\Models\teacher;

class groupController extends Controller
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
        // $groups = group::all();
        
        // return view('groups.index')->withgroups($groups);
        return $this->filterBySession(ModelsSession::first()->id);
    }

    public function filterBySession($id)
    {
        $sessions = ModelsSession::all();
        $session = ModelsSession::find($id);
        $groups = group::where("session_id",$id)->get();
        return view('groups.index')->withgroups($groups)->withSessions($sessions)
        ->withSession($session);

    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = teacher::all();
        $sessions = \App\Models\session::all();
        return view('groups.create')->withsessions($sessions)->withteachers($teachers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate For Type
        $this->validate($request , array(
            'name'            => ['required', 'max:255'   ],
            'teacher_id'      => ['required', 'max:255'   ],
        ));
        
        $group = new group();
        $group->name=$request->name;        
        $group->teacher_id=$request->teacher_id;  
        $group->session_id=$request->session_id;    
        $group->save();
        
        return $this->index();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = group::find($id);
        $teachers = teacher::all();
        return view('groups.edit')->withteachers($teachers)->withgroup($group);
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
        //Validate For Type
        $this->validate($request, array(
            'name'            => ['required', 'max:255'   ],
            'teacher_id'      => ['required', 'max:255'   ],
        ));

        $group = group::find($id);
        $group->name=$request->name;
        $group->teacher_id=$request->teacher_id;
        $group->save();
        
        return $this->index();
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
        $group = group::find($id);
        $group->delete();

        Session::flash('SUCCESS','This group Successfully Delete  !');


        return $this->index();
    }
}
