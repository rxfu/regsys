<?php

namespace App\Http\Controllers;

use App\Competition;

class CompetitionController extends Controller {

	public function index() {
		$competitions = Competition::orderBy('created_at', 'desc')->get();

		return view('competition.list', compact('competitions'));
	}

	public function create() {
		return view('competition.create');
	}
}
