<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\form;
use App\Models\form_detail;
use App\Models\group_detials;
use App\Models\session;
use App\Models\group;

class groupDetialsController extends Controller
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

    public function index($id)
    {
        $sessions = Session::all();
        $group = group::find($id);
        $session = Session::find($group->session->id);
        $groups = group::where("session_id",$session->id)->get();
        $group_detials = group_detials::where('group_id',$id)->get();
        return view('groups.detials.index')->withgroups($groups)->withSessions($sessions)
        ->withSession($session)->withGroup($group)->withGroupDetials($group_detials);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $group = group::find($id);
        $notDistributionStudent = form::where([['session_id',$group->session->id],['group_id',null]])->get();
        return view('groups.detials.create')->withnotDistributionStudent
        ($notDistributionStudent)->withGroup($group);
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
            'group_id'        => ['required', 'max:255'   ],
            'student_id'      => ['required', 'max:255'   ],
        ));
        
        $group = new group_detials();
        $group->student_id=$request->student_id;  
        $group->group_id=$request->group_id;    
        $group->save();

        $group = group::find($request->group_id);
        $form = form::where([['student_id',$request->student_id],['session_id',$group->session_id]])->first();
        $form->group_id=$request->group_id;
        $form->save();

        $form_detail = new form_detail();
        $form_detail->teacher_id = $group->teacher_id;
        $form_detail->form_id = $form->id;
        $form_detail->entry_date = "2022-03-22 12:03:41";
        $form_detail->start_Surah = "blank";
        $form_detail->start_ayah = "blank";
        $form_detail->end_Surah = "blank";
        $form_detail->end_ayah = "blank";
        $form_detail->rate = "0.0";
        $form_detail->notes = "blank";

        $form_detail->save();

        
        return $this->index($request->group_id);
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
        $group = group_detials::find($id);
        $group->delete();

        $form = form::where([['group_id',$id],['student_id',$group->student_id]]);
        $form->delete();


        // Session::flash('SUCCESS','This group Successfully Delete  !');


        return $this->index($id);
    }

    /********************************
     * ******************************
     */
    public function formDetials($group_detials_id)
    {
        $group = group_detials::find($group_detials_id);
        // $Students = 
        $form = form::where([['student_id',$group->student_id],
        ['group_id',$group->group_id]])->first();
        $form_detials = form_detail::where('form_id',$form->id)->get();


        return view('forms.index')->withformDetials($form_detials)
        ->withForm($form);
    }
}
