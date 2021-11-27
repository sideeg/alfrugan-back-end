<?php

namespace App\Http\Controllers;

use App\Models\novel;
use App\Models\qualification;
use App\Models\status;
use Illuminate\Http\Request;
use App\Models\student;
use Session;

class studentsController extends Controller
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
        $students = student::all();
        
        return view('students.index')->withstudents($students);

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
        return view('students.create')->withqualifications($qualifications)
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

        $student = new student();
        $student->name_ar=$request->name_ar;        
        $student->name_en=$request->name_en;        
        $student->email=$request->email;        
        $student->sex=$request->sex;           
        $student->age=$request->age;               
        $student->password=$request->password;
        $student->country=$request->country;        
        $student->state=$request->state;                
        $student->novel_id=$request->novel_id;
        $student->phone_number=$request->phone_number;         
        $student->qualification_id=$request->qualification_id; 
        $student->Specialization=$request->Specialization;
        $student->status_id = 2;   
        $student->save();

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
        $student = student::find($id);
        $novels = novel::all();
        $statuss = status::all();
        $qualifications = qualification::all();
        return view('students.edit')->withqualifications($qualifications)
        ->withNovels($novels)->withstudent($student)->withStatuss($statuss);
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
         

        $student = student::find($id);
        $student->name_ar=$request->name_ar;        
        $student->name_en=$request->name_en;        
        $student->email=$request->email;        
        $student->sex=$request->sex;           
        $student->age=$request->age;               
        $student->password=$request->password;
        $student->country=$request->country;        
        $student->state=$request->state;                
        $student->novel_id=$request->novel_id;
        $student->phone_number=$request->phone_number;         
        $student->qualification_id=$request->qualification_id; 
        $student->Specialization=$request->Specialization;
        $student->status_id = $request->status_id;   
        $student->save();

        //flash messge
        Session::flash('SUCCESS','DONE update student!');

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
        $student = student::find($id);
        $student->delete();

        Session::flash('SUCCESS','This student Successfully Delete  !');


        return $this->index();
    }

    /**
     * block the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blockstudent($id)
    {
        $student = student::where('id',$id)->first();
        if(is_null( $student)){
            Session::flash('ERROR','The student not found');
            return $this->index();
        }
        
        if ($student->status_id == 3) {
            $student->status_id = 2;
            
        }
        else if ($student->status_id == 2){
            $student->status_id = 3;
        }
        $student->save();
        
        Session::flash('SUCCESS','This student Successfully blocked  !');

        return $this->index();
    }

    /**
     * block the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function acceptNewstudent($id)
    {
        $student = student::where('id',$id)->first();
        if(is_null( $student)){
            Session::flash('ERROR','The student not found');
            return $this->index();
        }
        $student->status_id = 2;
        $student->save();
        Session::flash('SUCCESS','This student Successfully acsepted!');

        return $this->index();
    }
}
