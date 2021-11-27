<?php

namespace App\Http\Controllers;

use App\Models\novel;
use App\Models\qualification;
use App\Models\status;
use Illuminate\Http\Request;
use App\Models\teacher;
use Session;

class TeachersController extends Controller
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
        $teachers = teacher::all();
        
        return view('teachers.index')->withTeachers($teachers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $novels = novel::all();
        $qualifications = qualification::all();
        return view('teachers.create')->withqualifications($qualifications)
        ->withNovels($novels);
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
            'name_ar'           => ['required', 'max:255'   ],
            'name_en'           => ['required', 'max:255'   ],
            'email'             => ['required', 'max:255'   ],
            'sex'               => ['required', 'max:255'   ],
            'age'               => ['required', 'string','max:255'],
            'password'          => ['required', 'max:255'   ],
            'country'           => ['required', 'max:255'   ],
            'state'             => ['required', 'string'    ],
            'phone_number'      => ['required'],
            'novel_id'          => ['required'],
            'qualification_id'  => ['required'],
            'Specialization'    => ['required'],
         ));

        $teacher = new teacher();
        $teacher->name_ar=$request->name_ar;        
        $teacher->name_en=$request->name_en;        
        $teacher->email=$request->email;         
        $teacher->sex=$request->sex;           
        $teacher->age=$request->age;               
        $teacher->password=$request->password;
        $teacher->country=$request->country;        
        $teacher->state=$request->state;                
        $teacher->novel_id=$request->novel_id;
        $teacher->phone_number=$request->phone_number;         
        $teacher->qualification_id=$request->qualification_id; 
        $teacher->Specialization=$request->Specialization;
        $teacher->status_id = 2;   
        $teacher->save();

        //flash messge
        Session::flash('SUCCESS','DONE ADD NEW Real Estates Type!');

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
        $teacher = teacher::find($id);
        $novels = novel::all();
        $statuss = status::all();
        $qualifications = qualification::all();
        return view('teachers.edit')->withqualifications($qualifications)
        ->withNovels($novels)->withTeacher($teacher)->withStatuss($statuss);
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
            'name_ar'           => ['required', 'max:255'   ],
            'name_en'           => ['required', 'max:255'   ],
            'email'             => ['required', 'max:255'   ],
            'sex'               => ['required', 'max:255'   ],
            'age'               => ['required', 'string','max:255'],
            'password'          => ['required', 'max:255'   ],
            'country'           => ['required', 'max:255'   ],
            'state'             => ['required', 'string'    ],
            'phone_number'      => ['required'],
            'novel_id'          => ['required'],
            'qualification_id'  => ['required'],
            'Specialization'    => ['required'],
         ));
         

        $teacher = teacher::find($id);
        $teacher->name_ar=$request->name_ar;        
        $teacher->name_en=$request->name_en;        
        $teacher->email=$request->email;        
        $teacher->sex=$request->sex;           
        $teacher->age=$request->age;               
        $teacher->password=$request->password;
        $teacher->country=$request->country;        
        $teacher->state=$request->state;                
        $teacher->novel_id=$request->novel_id;
        $teacher->phone_number=$request->phone_number;         
        $teacher->qualification_id=$request->qualification_id; 
        $teacher->Specialization=$request->Specialization;
        $teacher->status_id = $request->status_id;   
        $teacher->save();

        //flash messge
        Session::flash('SUCCESS','DONE Teacher updated!');

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
        $teacher = teacher::find($id);
        $teacher->delete();

        Session::flash('SUCCESS','This teacher Successfully Delete  !');


        return $this->index();
    }

    /**
     * block the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blockTeacher($id)
    {
        $teacher = teacher::where('id',$id)->first();
        if(is_null( $teacher)){
            Session::flash('ERROR','The teacher not found');
            return $this->index();
        }
        
        if ($teacher->status_id == 3) {
            $teacher->status_id = 2;
            
        }
        else if ($teacher->status_id == 2){
            $teacher->status_id = 3;
        }
        $teacher->save();
        
        Session::flash('SUCCESS','This teacher Successfully blocked  !');

        return $this->index();
    }

    /**
     * block the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function acceptNewTeacher($id)
    {
        $teacher = teacher::where('id',$id)->first();
        if(is_null( $teacher)){
            Session::flash('ERROR','The teacher not found');
            return $this->index();
        }
        $teacher->status_id = 2;
        $teacher->save();
        Session::flash('SUCCESS','This teacher Successfully acsepted!');

        return $this->index();
    }
}
