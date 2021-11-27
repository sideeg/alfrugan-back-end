<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Resources\MainApiResponse;


class StudentController extends Controller
{
     /***********************************
   *
   *
   *
   */
  public function login(Request $request){
    // echo Hash::make($request->input('password'));
    $student = student::where('phone_number', '=', $request->input('phone_number'))->first();

    if($student != null){
        // dd($student );
      if($request->password == $student->password){
          if($student->status_id == 2 || $student->status_id == 1){
                $token = Str::random(60);

                $student->forceFill([
                    'remember_token' => $token,
                ])->save();

                return response()->json(['error'=>False,"message"=>"","data"=>$student] ,200);
            }else if ($student->status_id == 3){
                return response()->json(['error'=>True,"message"=> 'the student was blocked by admin','code'=>0 ],200);
            }else if ($student->status_id == 4){
                return response()->json(['error'=>True,"message"=> 'the student was blocked for absence','code'=>1 ],200);
            }
      }else{
        return response()->json(['error'=>True,"message"=> 'the  password is incorect','code'=>2 ],200);

      }
        // $student = Auth::student();
        //  $success['token'] =  $student->createToken('AppName')-> accessToken;

       } else{
        return response()->json(['error'=>True,"message"=> 'the phone number  is incorect','code'=>3 ],200);
        }
  }

  /**********************************************
 *
 *
 *
 */
public function studentSave(Request $request)
{
   $studentphone = student::where('phone_number', '=', $request->input('phone_number'))->first();
    if($studentphone == null){

    $student = student::create([
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
    return response()->json(['error'=>False,"message"=>"","data"=>$student],201);
    }else
    return response()->json(['error'=>True,"message"=> 'the phone is duplicated...','code'=>3 ],200);
  }

   /**********************************
       *
       *
       */
      public function studentByID($id)
      {
        $student = student::find($id);
        if($student == null)
          return response()->json(['error'=>True,"message"=> 'the student not found...','code'=>4 ],200);
        else
          return response()->json(['error'=>False,"message"=>"","data"=>$student],200);

      }

      public function studentUpdate($id,Request $request)
      {

        // var_dump($student->all());
        $student = student::find($id);
        if($student == null)
          return response()->json(['error'=>True,"message"=> 'the student not found...','code'=>3 ],200);
        else{
          // $Request = new Request;
          $student->fill($request->all())->save();
          return response()->json(['error'=>False,"message"=>"","data"=> $student],200);
        }
      }
}
