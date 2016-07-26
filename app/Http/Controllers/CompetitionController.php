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
		$competition = Competition::find($id);

		return view('competition.show', compact('competition'));
	}

	public function edit($id) {
		$competition = Competition::find($id);

		return view('competition.edit', compact('competition'));
	}

	public function update(Request $request, $id) {
		$inputs = $request->all();

		$competition = Competition::find($id);
		$competition->fill($inputs);

		if ($competition->save()) {
			return redirect('competition')->withStatus('活动更新成功');
		} else {
			return back()->withStatus('活动更新失败');
		}
	}

	public function destroy($id) {
		$competition = Competition::find($id);

		if ($competition->delete()) {
			return redirect('competition')->withStatus('活动删除成功');
		} else {
			return back()->withStatus('活动删除失败');
		}
	}
}
