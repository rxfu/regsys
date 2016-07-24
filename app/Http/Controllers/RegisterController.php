<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class RegisterController extends Controller {

	public function __construct() {
		$this->middleware('guest');
	}

	public function showRegisterForm() {
		return view('register');
	}
}
