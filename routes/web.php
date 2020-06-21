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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'VehicleController@home')->name('home');

Route::get('/profile', 'VehicleController@profile');

Route::post('/profile', 'VehicleController@updateprofile');

Route::resource('Vehicle', 'VehicleController');

Route::resource('Attendance', 'AttendanceController');

Route::delete('/deletecar/{id}', 'VehicleController@deletecar');

Route::get('/violation', 'AttendanceController@violation');

Route::get('/editvehicle/{id}', 'VehicleController@vehicleeditpage');

Route::group(['middleware' => 'is_admin'], function(){
    Route::get('/admin/home', 'HomeController@adminHome')->name('admin.home');
    Route::get('/admin/violation', 'AttendanceController@violationtype')->name('admin.violation');
    Route::get('/admin/violationapv', 'AttendanceController@violationapprove')->name('admin.violationapv');
    Route::post('/adminapprove/{id}', 'AttendanceController@adminapproval')->name('adminapprove');
    Route::post('/staffremark/{id}', 'AttendanceController@staffremark')->name('staffremark');
});

