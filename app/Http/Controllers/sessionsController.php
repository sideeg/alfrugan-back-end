<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\session;
use App\Models\session_type;
use App\Models\teacher;
use App\Models\mosque;
use Session as S;

class sessionsController extends Controller
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
        $sessions = session::all();
        
        return view('sessions.index')->withsessions($sessions);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $session_types = session_type::all();
        $teachers = teacher::all();
        $mosques = mosque::all();

        return view('sessions.create')->withTeachers($teachers)
        ->withMosques($mosques)->withSession_types($session_types);
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
            'name_ar'            => ['required', 'max:255'   ],
            'name_en'            => ['required', 'max:255'   ],
            'start_date'         => ['required', 'max:255'   ],
            'end_date'           => ['required', 'max:255'   ],
            'brief_ar'           => ['required', 'string','max:255'],
            'brief_en'           => ['required', 'max:255'   ],
            'register_available' => ['required', 'max:255'   ],
            'mosque_id'          => ['required'],
            'session_type_id'    => ['required'],
            'teacher_id'         => ['required'],
            'image'              => ['required'],
         ));

        $session = new session();
        $session->name_ar=$request->name_ar;        
        $session->name_en=$request->name_en;        
        $session->start_date=$request->start_date;         
        $session->end_date=$request->end_date;           
        $session->brief_ar=$request->brief_ar;               
        $session->brief_en=$request->brief_en;
        $session->register_available=$request->register_available;        
        $session->reason_registry_suspension=$request->reason_registry_suspension;                
        $session->session_type_id=$request->session_type_id;
        $session->mosque_id=$request->mosque_id;         
        $session->teacher_id=$request->teacher_id; 

        if ($files = $request->file('image')) {
            $destinationPath = '/image/session/'; // upload path
            $sessionImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $sessionImage);
            $session['image'] = "$sessionImage";
        }
        
        $session->save();

        //flash messge
        S::flash('SUCCESS','DONE ADD NEW Real Estates Type!');

        // redirect
        return $this->index();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = session::find($id);
        $session_types = session_type::all();
        $mosques = mosque::all();
        $teachers = teacher::all();
        return view('sessions.edit')->withteachers($teachers)
        ->withSession_types($session_types)->withsession($session)->withMosques($mosques);
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
        $this->validate($request , array(
            'name_ar'            => ['required', 'max:255'   ],
            'name_en'            => ['required', 'max:255'   ],
            'start_date'         => ['required', 'max:255'   ],
            'end_date'           => ['required', 'max:255'   ],
            'brief_ar'           => ['required', 'string','max:255'],
            'brief_en'           => ['required', 'max:255'   ],
            'register_available' => ['required', 'max:255'   ],
            'mosque_id'          => ['required'],
            'session_type_id'    => ['required'],
            'teacher_id'         => ['required'],
            'image'              => ['required'],
         ));

        $session = new session();
        $session->name_ar=$request->name_ar;        
        $session->name_en=$request->name_en;        
        $session->start_date=$request->start_date;         
        $session->end_date=$request->end_date;           
        $session->brief_ar=$request->brief_ar;               
        $session->brief_en=$request->brief_en;
        $session->register_available=$request->register_available;        
        $session->reason_registry_suspension=$request->reason_registry_suspension;                
        $session->session_type_id=$request->session_type_id;
        $session->mosque_id=$request->mosque_id;         
        $session->teacher_id=$request->teacher_id; 

        if ($files = $request->file('image')) {
            $destinationPath = '/image/session/'; // upload path
            $sessionImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $sessionImage);
            $session['image'] = "$sessionImage";
        }
        
        $session->save();

        //flash messge
        S::flash('SUCCESS','DONE session updated!');

        // redirect
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
        $session = session::find($id);
        $session->delete();

        S::flash('SUCCESS','This session Successfully Delete  !');


        return $this->index();
    }

    /**
     * block the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blocksession($id)
    {
        $session = session::where('id',$id)->first();
        if(is_null( $session)){
            S::flash('ERROR','The session not found');
            return $this->index();
        }
        
        if ($session->status_id == 3) {
            $session->status_id = 2;
            
        }
        else if ($session->status_id == 2){
            $session->status_id = 3;
        }
        $session->save();
        
        S::flash('SUCCESS','This session Successfully blocked  !');

        return $this->index();
    }

    /**
     * block the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function acceptNewsession($id)
    {
        $session = session::where('id',$id)->first();
        if(is_null( $session)){
            S::flash('ERROR','The session not found');
            return $this->index();
        }
        $session->status_id = 2;
        $session->save();
        S::flash('SUCCESS','This session Successfully acsepted!');

        return $this->index();
    }
}
