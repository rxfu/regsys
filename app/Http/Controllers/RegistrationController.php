<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller {

	public function index($id) {
		$registrations = Registration::whereCompetitionId($id)
			->orderBy('created_at')
			->get();

		return view('registration.index', compact('registrations'));
	}

	public function showRegisterForm() {
		$competitions = Competition::whereIsActive(1)
			->orderBy('created_at', 'desc')
			->get();

		return view('registration.register', compact('competitions'));
	}

	public function store(Request $request) {
		$inputs = $request->all();

		foreach ($inputs['competitions'] as $competition) {
			$registration = new Registration;
			$registration->fill($inputs);
			$registration->competition_id = $competition;
			$registration->save();
		}

		return redirect('registration/register')->withStatus('报名成功');
	}
}
