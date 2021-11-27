<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\form;
use App\Models\form_detail;
use App\Models\mosque;
use App\Models\session;
use App\Models\session_reqester_request;
use Illuminate\Http\Request;
use App\Models\group;
use App\Models\group_detials;

class SessionController extends Controller
{
    public function getOpenSessionMosques()
    {
        // $mosques = mosque::with(['session' => function($query) {
        //     // user_id is required here*
        //     $query->where("session_type_id","1");
        // }])->get();

        // $mosques = mosque::with('session')->whereHas('session',function($query) {
        //     $query->where('session_type_id', '1');
        // })->get();

        $sessions = session::where("session_type_id",1)->with("mosque")->get();
        return response()->json(['error'=>false,"message"=>"","data"=>$sessions] ,200);

    }

    /******************************************************
     *
     *
     */
    public function getCloseSession()
    {
        $close_seession = session::with("mosque")->where("session_type_id",2)->get();
        return response()->json(['error'=>false,"message"=>"","data"=>$close_seession] ,200);

    }

    /*************************************************************************
     *
     *
     */
    public function sessionById($id,Request $request)
    {
        $session = session::with("mosque")->where("id",$id)->first();
        if( $session){
            $form = form::with("student")->where("student_id",$request->student_id)->where("session_id",$id)->first();
            if($form){
                $detials = form_detail::with("form")->where("form_id",$form->id)->get();
                $all = array("form"=>$detials,"session"=>$session);
            }
            else
                $all = array("form"=>$form,"session"=>$session);
            return response()->json(['error'=>false,"message"=>"","data"=>$all] ,200);

        }else
            return response()->json(['error'=>True,"message"=>"the session not found","code"=>5] ,404);
    }

    /***************************************************************************
     *
     *
     */
    public function studentSessionRegisterRequest(Request $request)
    {
        $session_requset = session_reqester_request::where([["student_id",$request->student_id],
        ["session_id",$request->session_id]])->first();
        // dd($session_requset);
        if($session_requset){
            return response()->json(['error'=>True,"message"=>"this student is alrady send registered request in this session please wait for the admin response","code"=>6] ,400);
        }else{
            $form = form::where("student_id",$request->student_id)->first();
            if($form){
                // return response()->json(['error'=>false,"message"=>"","data"=>$form] ,200);
                return response()->json(['error'=>True,"message"=>"this student is alrady  registered  in this session please contact the admin","code"=>8] ,400);

            }else{
                $new_request = new session_reqester_request();
                $new_request->session_id = $request->session_id;
                $new_request->teacher_id = $request->teacher_id;
                $new_request->student_id = $request->student_id;

                $new_request->save();

                return response()->json(['error'=>false,"message"=>"the request is submited please wait for the admin reponse"
                ,"data"=>$form] ,200);


            }

        }
    }

     /*************************************************************************
     *
     *
     */
    public function teacherSessionById($id,Request $request)
    {
        $session = session::with("mosque")->where("id",$id)->first();
        if( $session){
            $group = group::where("teacher_id",$request->teacher_id)->where("session_id",$id)->get();
            if($group){
                $detials = group_detials::with("group")->where("group_id",$group->id)->get();
                $all = array("group"=>$detials,"session"=>$session);
            }
            else
                $all = array("group"=>$group,"session"=>$session);
            return response()->json(['error'=>false,"message"=>"","data"=>$all] ,200);

        }else
            return response()->json(['error'=>True,"message"=>"the session not found","code"=>5] ,404);
    }

    /***************************************************************************
     *
     *
     */
    public function TeacherSessionRegisterRequest(Request $request)
    {
        $session_requset = session_reqester_request::where("teacher_id",$request->teacher_id)
        ->where("session_id",$request->session_id)->first();
        // dd($session_requset);
        if($session_requset){
            return response()->json(['error'=>True,"message"=>"this teacher is alrady send registered request in this session please wait for the admin response","code"=>6] ,400);
        }else{
            $group = group::where("teacher_id",$request->teacher_id)->first();
            if($group){
                return response()->json(['error'=>false,"message"=>"","data"=>$group] ,200);
            }else{
                $new_request = new session_reqester_request();
                $new_request->session_id = $request->session_id;
                $new_request->teacher_id = $request->teacher_id;
                $new_request->student_id = $request->student_id;

                $new_request->save();

                return response()->json(['error'=>false,"message"=>"the request is submited please wait for the admin reponse"
                ,"data"=>$group] ,200);


            }

        }
    }

}
