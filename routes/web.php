<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
Route::get('/clear-view', function() {
    Artisan::call('view:clear');
    return "View is cleared";
});
Route::get('/course_time/{id}', 'HomeController@course_time');
Route::get('/changeCourseStatus/{token?}', 'CourseController@changeCourseStatus')->name('changeCourseStatus');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/push','PushController@store')->name("push");
Route::get('/push','PushController@push')->name('push');
Route::get('/logout', 'HomeController@logout')->name('home');
