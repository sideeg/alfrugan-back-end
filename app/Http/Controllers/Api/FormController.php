<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\form;
use App\Models\form_detail;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function getStudentForm($session_id,$student_id)
    {
        // dd($session_id,$student_id);
        $form = form::where([['student_id',$student_id],['session_id',$session_id]])->first();
        // dd($form);
        if ($form)
            $form_detials = form_detail::where("form_id",$form->id)->get();
        else
            $form_detials = array();

        return response()->json(['error'=>false,"message"=>"","data"=>$form_detials] ,200);

    }

    /******************************************************************
         * delete form detials
         *
         */
        public function formDelete($id)
        {
            $form = form_detail::find($id);
            if (is_null($form)){
                return response()->json(['error'=>True,"message"=>"form not found","data"=>null],200);
            }
            // form_detail::where("form_id",$form->id)->delete();
            $form->delete();
            return response()->json(['error'=>false,"message"=>"","data"=>$form] ,202);

        }

        /****************************************************************************************
         * **************************************************************************************
         * **************************************************************************************
         */
        public function formUpdate($id,Request $request)
        {
            $form = form_detail::find($id);
            if (is_null($form)){
                return response()->json(['error'=>True,"message"=>"form not found","data"=>null],200);
            }
            $form_detail = form_detail::where("form_id",$form->id)->get();
            $form_detail->teacher_id = $request->teacher_id;
            $form_detail->entry_date = $request->entry_date;
            $form_detail->start_Surah = $request->start_Surah;
            $form_detail->start_ayah = $request->start_ayah;
            $form_detail->end_Surah = $request->end_Surah;
            $form_detail->end_ayah = $request->end_ayah;
            $form_detail->rate = $request->rate;
            $form_detail->notes = $request->notes;

            $form_detail->save();
            return response()->json(['error'=>false,"message"=>"","data"=>$form_detail] ,200);

        }
        /*************************************************************************************
        **************************************************************************************
        **************************************************************************************
         */
         public function formAdd(Request $request)
         {
            $form_detail = new form_detail();
            $form_detail->teacher_id = $request->teacher_id;
            $form_detail->entry_date = $request->entry_date;
            $form_detail->start_Surah = $request->start_Surah;
            $form_detail->start_ayah = $request->start_ayah;
            $form_detail->end_Surah = $request->end_Surah;
            $form_detail->end_ayah = $request->end_ayah;
            $form_detail->rate = $request->rate;
            $form_detail->notes = $request->notes;
            $form_detail->form_id = $request->form_id;

            $form_detail->save();

            return response()->json(['error'=>false,"message"=>"","data"=>$form_detail] ,200);

         }
}
