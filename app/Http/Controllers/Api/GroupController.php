<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\form;
use App\Models\group;
use Illuminate\Http\Request;
use App\Models\group_detials;


class GroupController extends Controller
{
    public function allStudentByGroup($id)
    {
        $students = group_detials::with("student",'group','group.session')->where("group_id",$id)->get();

        return response()->json(['error'=>false,"message"=>"","data"=>$students] ,200);


    }

    /****************************************************************************************
     *
     * **************************************************************************************
     */
    public function notDistributionStudent( $id)
    {
        $notDistributionStudent = form::with('student')->where([['session_id',$id],['group_id',null]])->get();
        return response()->json(['error'=>false,"message"=>"","data"=>$notDistributionStudent] ,200);

    }
    /****************************************************************************************
     *
     *
     * ***************************************************************************************
     */

     public function addStudentToGroup($id,Request $request)
     {
         $group = group::find($id);
         if ($group) {
             $new_student = group_detials::create([
             "group_id"=>$group->id,"student_id"=>$request->student_id
            ]);
             $new_student->save();

             $form = form::where([['student_id',$request->student_id],["session_id",$group->session->id]])->first();
             if ($form) {
                 $form->group_id = $group->id;
                 $form->save();
             }
             return response()->json(['error'=>false,"message"=>"","data"=>$new_student], 200);
         }else{
            return response()->json(['error'=>True,"message"=>"the group not found","data"=>null] ,202);
         }
     }

     /******************************************************************************************
      *
      ******************************************************************************************
      */
      public function deleteStudentFromGroup($id,Request $request)
      {

          $student = group_detials::with("group")->where([['student_id',$request->student_id],["group_id",$id]])->first();
        //  $x = sizeof($student);
        //   dd($x);
        //   $from = from::where([['student_id',$request->student_id],["session_id",$student->group->session_id]])->delete();
        if ($student) {
            $student->delete();
            form::where([['student_id',$request->student_id],["session_id",$student->group->session_id],["group_id",$id]])->delete();
        }
        else
            return response()->json(['error'=>True,"message"=>"the student not found","data"=>null] ,202);




        return response()->json(['error'=>false,"message"=>"DONE","data"=>null] ,202);

      }
}
