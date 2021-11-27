<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();



});
Route::group(['namespace' => 'App\Http\Controllers\Api'], function(){

    Route::get('student/{id}', "StudentController@studentByID");
    Route::post('student/login', "StudentController@login");
    Route::post('student', "StudentController@studentSave");
    Route::put("student/{id}","StudentController@studentUpdate");


    Route::get('teacher/{id}', "TeacherController@teacherByID");
    Route::put('teacher/{id}', "TeacherController@teacherUpdate");
    Route::post('teacher/login', "TeacherController@login");
    Route::post('teacher', "TeacherController@teacherSave");
    Route::get('teacher/session/{id}', "SessionController@teacherSessionById");
    Route::post('teacher/session/reqister', "SessionController@TeacherSessionRegisterRequest");


    Route::get('teacher/session/group/{id}', "GroupController@allStudentByGroup");//get all student by group
    Route::post('teacher/session/group/{id}', "GroupController@addStudentToGroup");//add student to group
    Route::delete('teacher/session/group/{id}', "GroupController@deleteStudentFromGroup");//delete student from group


    Route::get('teacher/session/{id}/notDistributionStudent', "GroupController@notDistributionStudent");// get all no distrubution student
    Route::get('teacher/session/{session_id}/student/{student_id}', "FormController@getStudentForm");//getStudent form

    Route::delete('teacher/session/student/form/details/{id}', "FormController@formDelete");//delete from by id
    Route::put('teacher/session/student/form/details/{id}', "FormController@formUpdate");//Update from by id
    Route::post('teacher/session/student/form/details', "FormController@formAdd");//add from 



    Route::get('config/register',"ConfigController@registerConfig");

    Route::get('session/open-session', "SessionController@getOpenSessionMosques");
    Route::get('session/close-session', "SessionController@getCloseSession");
    Route::get('session/{id}', "SessionController@sessionById");
    Route::post('student/session/reqister', "SessionController@studentSessionRegisterRequest");





});
