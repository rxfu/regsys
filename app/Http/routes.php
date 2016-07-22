<?php

/**
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', function () {
	return view('welcome');
});

Route::auth();

Route::group(['middleware' => ['auth']], function () {
	Route::get('password/change', ['as' => 'password.password', 'Auth\PasswordController@showChangePasswordForm']);
	Route::put('password/change', ['as' => 'password.change', 'Auth\PasswordController@changePassword']);
});
