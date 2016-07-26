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
	return redirect()->route('registration.show');
});

Route::auth();

Route::get('registration/registration', ['as' => 'registration.show', 'uses' => 'RegisterController@showRegisterForm']);

Route::group(['middleware' => ['auth']], function () {
	Route::get('password/change', ['as' => 'password.password', 'uses' => 'Auth\PasswordController@showChangePasswordForm']);
	Route::put('password/change', ['as' => 'password.change', 'uses' => 'Auth\PasswordController@changePassword']);
	Route::resource('competition', 'CompetitionController');
	Route::get('registration/{competition}', ['as' => 'registration.index', 'uses' => 'RegistrationController@index']);
});
