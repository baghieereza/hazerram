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
    return view('landingPage.main');
});
Route::get('/course_time/{id}', 'HomeController@course_time');
Route::get('/changeCourseStatus/{token?}{teacher_id?}/{log_id?}', 'CourseController@changeCourseStatus')->name('changeCourseStatus');
Route::get('/imPresent/{id?}/{start?}/{end?}/{log_id?}', 'PushController@imPresent')->name("imPresent");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/push', 'PushController@store')->name("push");
Route::get('/push', 'PushController@push')->name('push');
Route::get('/logout', 'HomeController@logout')->name('logout');
