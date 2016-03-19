<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'ProfilepageController@login')->name('login');
Route::post('/create', 'ProfilepageController@create')->name('create');
	
Route::get('/home/{id}', 'HomepageController@show')->name('home');
	Route::post('/follow/{myid}', 'HomepageController@follow')->name('follow');
	
	
	Route::post('/update/{id}', 'ProfilepageController@update')->name('update');
	


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


