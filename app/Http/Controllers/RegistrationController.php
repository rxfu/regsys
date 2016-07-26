<?php

namespace App\Http\Controllers;

use App\Registration;

class RegistrationController extends Controller {

	public function index($id) {
		$registrations = Registration::whereCompetitionId($id)
			->orderBy('created_at')
			->get();

		return view('registration.index', compact($registrations));
	}

	public function showRegisterForm() {
		return view('registration.register');
	}
}
