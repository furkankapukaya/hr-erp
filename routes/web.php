<?php

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
    return view('index');
})->name('home');

Route::post('/login', 'LoginController@login')->name('login');
Route::get('/login', 'LoginController@show');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('employee', 'EmployeeController');
	Route::resource('vacation', 'VacationController');
	Route::resource('lecture', 'LectureController');
	Route::resource('timeline', 'TimelineController');
	Route::resource('demand', 'DemandController');
	Route::resource('project', 'ProjectController');
});




//Auth::routes();

//Route::get('/', 'EmployeeController@index')->name('home');
