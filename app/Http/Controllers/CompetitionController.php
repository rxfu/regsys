<?php

namespace App\Http\Controllers;

use App\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller {

	public function index() {
		$competitions = Competition::orderBy('created_at', 'desc')->get();

		return view('competition.list', compact('competitions'));
	}

	public function create() {
		return view('competition.create');
	}

	public function store(Request $request) {
		$inputs = $request->all();

		$competition = new Competition;
		$competition->fill($inputs);

		if ($competition->save()) {
			return redirect('competition')->withStatus('活动创建成功');
		} else {
			return back()->withStatus('活动创建失败');
		}
	}

	public function show($id) {
		$competition = Competiton::find($id);

		return view('competition.show', compact('competition'));
	}
}
