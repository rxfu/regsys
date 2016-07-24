<?php

namespace App\Http\Controllers;

class CompetitionController extends Controller {

	public function getList() {
		return view('competition.list');
	}
}
