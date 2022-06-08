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
    return redirect()->route('student_register');
});

Auth::routes();
Route::group(['middleware' => ['admin']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('module', 'ModuleController');
    Route::delete('del_module/{id}','ModuleController@del_module')->name('del_module');

    Route::resource('session', 'SessionController');
    Route::get('view_related_sessions/{id}','ModuleController@view_related_sessions')->name('view_related_sessions');
});

Route::get('student_register','StudentController@student_register')->name('student_register');
Route::get('forgot_password','ForgotPasswordController@index')->name('forgot_password');
Route::get('forgot_password_otp/{id}','ForgotPasswordController@forgot_password_otp')->name('forgot_password_otp');
Route::post('password_email','ForgotPasswordController@password_email')->name('password_email');
Route::post('student_registration','StudentController@student_registration')->name('student_registration');
Route::post('match_otp','ForgotPasswordController@match_otp')->name('match_otp');
Route::post('change_password','ForgotPasswordController@change_password')->name('change_password');

Route::group(['middleware' => ['student']], function () {
    Route::get('student_dashboard','StudentController@index')->name('student_dashboard');
    Route::get('change_password_blade','StudentController@change_password_blade')->name('change_password_blade');
    Route::post('change_student_password','StudentController@change_student_password')->name('change_student_password');
    Route::post('get_data','StudentController@get_data')->name('get_data');
});
