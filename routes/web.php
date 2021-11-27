<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('teacher', App\Http\Controllers\TeachersController::class);
Route::get('/teacher/{id}/block','App\Http\Controllers\TeachersController@blockTeacher')->name("teacher.block");
Route::get('/teacher/{id}/accept','App\Http\Controllers\TeachersController@acceptNewTeacher')->name("teacher.accept");

Route::resource('student', App\Http\Controllers\studentsController::class);
Route::get('/student/{id}/block','App\Http\Controllers\studentsController@blockstudent')->name("student.block");
Route::get('/student/{id}/accept','App\Http\Controllers\studentsController@acceptNewstudent')->name("student.accept");

Route::resource('mosque', App\Http\Controllers\mosquesController::class);
Route::resource('session', App\Http\Controllers\sessionsController::class);
Route::resource('session_reqester_request', App\Http\Controllers\session_reqester_requestController::class);
Route::resource('group', App\Http\Controllers\groupController::class);

Route::post('/session/register/request/teacher/{id}','App\Http\Controllers\session_reqester_requestController@acceptTeacherRequest')->name('accept.request.teacher');
Route::post('/session/register/request/student/{id}','App\Http\Controllers\session_reqester_requestController@acceptStudentRequest')->name('accept.request.student');
Route::post('/session/register/request/deny/{id}','App\Http\Controllers\session_reqester_requestController@denyRegisterRequest')->name('deny.register.request');
Route::get('/session/register/request/{id}/detials/teacher','App\Http\Controllers\session_reqester_requestController@teacherRequestDetails')->name('detials.teacher.register.request');
Route::get('/session/register/request/{id}/detials/student','App\Http\Controllers\session_reqester_requestController@studentRequestDetails')->name('detials.student.register.request');

Route::get('/group/filterby/session/{id}','App\Http\Controllers\groupController@filterBySession');
Route::get('/group/{id}/detials','App\Http\Controllers\groupDetialsController@index');
Route::get('/group/{id}/detials/create','App\Http\Controllers\groupDetialsController@create')->name('group.detials.create');
Route::post('/group/{id}/detials/store','App\Http\Controllers\groupDetialsController@store')->name('group.detials.store');
Route::post('/group/{id}/detials/destroy','App\Http\Controllers\groupDetialsController@destroy')->name('group.detials.destroy');
Route::get('/group/detials/{id}','App\Http\Controllers\groupDetialsController@formDetials')->name('group.detials.form');

Route::get('/profile.edit', function () {
    return view('profile/edit');
})->name("profile.edit");


