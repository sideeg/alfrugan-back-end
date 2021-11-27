<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\teacher;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    /***********************************
   *
   *
   *
   */
  public function login(Request $request){

    $teacher = teacher::where('phone_number', '=', $request->input('phone_number'))->first();

    if($teacher != null){
        // dd($teacher );
            if($request->password == $teacher->password){
                if($teacher->status_id == 2 ){
                        $token = Str::random(60);

                        // $teacher->forceFill([
                        //     'remember_token' => $token,
                        // ])->save();

                        return response()->json(['error'=>False,"message"=>"","data"=>$teacher] ,200);
                    }
                    else if ($teacher->status_id == 1){
                        return response()->json(['error'=>True,"message"=> 'your reqister request is wating for admin response','code'=>7 ],200);
                    }else if ($teacher->status_id == 3){
                        return response()->json(['error'=>True,"message"=> 'the teacher was blocked by admin','code'=>0 ],200);
                    }else if ($teacher->status_id == 4){
                        return response()->json(['error'=>True,"message"=> 'the teacher was blocked for absence','code'=>1 ],200);
                    }
            }else{
                return response()->json(['error'=>True,"message"=> 'the  password is incorect','code'=>2 ],200);

            }


    } else{
        return response()->json(['error'=>True,"message"=> 'the phone number  is incorect','code'=>3 ],200);
        }
  }

  /**********************************************
 *
 *
 *
 */
public function teacherSave(Request $request)
{
   $teacherphone = teacher::where('phone_number', '=', $request->input('phone_number'))->first();
    if($teacherphone == null){

    $teacher = teacher::create([
        'name_en' => $request['name_en'],
        'name_ar' => $request['name_ar'],
        'age' => $request['age'],
        'sex' => $request['sex'],
        'email' => $request['email'],
        'country' => $request['country'],
        'state' => $request['state'],
        'novel_id' => $request['novel_id'],
        'qualification_id' => $request['qualification_id'],
        'Specialization' => $request['Specialization'],

        'password' => $request['password'],
        'phone_number' => $request['phone_number'],
        'remember_token' => Str::random(60),
    ]);
    return response()->json(['error'=>False,"message"=>"","data"=>$teacher],201);
    }else
    return response()->json(['error'=>True,"message"=> 'the phone is duplicated...','code'=>3 ],200);
  }

   /**********************************
       *
       *
       */
      public function teacherByID($id)
      {
        $teacher = teacher::find($id);
        if($teacher == null)
          return response()->json(['error'=>True,"message"=> 'the teacher not found...','code'=>4 ],200);
        else
          return response()->json(['error'=>True,"message"=>"","data"=>$teacher],200);

      }

      public function teacherUpdate($id,Request $request)
      {

        $teacher = teacher::find($id);
        if($teacher == null)
          return response()->json(['error'=>True,"message"=> 'the teacher not found...','code'=>3 ],200);
        else{
          // $Request = new Request;
          $teacher->fill($request->all())->save();
          return response()->json(['error'=>True,"message"=>"","data"=> $teacher],200);
        }
      }


}
