<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Registration;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RegistrationController extends Controller {

	public function index($id) {
		$registrations = Registration::whereCompetitionId($id)
			->orderBy('created_at')
			->get();
		$competition = $id;

		return view('registration.index', compact('registrations', 'competition'));
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

	public function export($id) {
		$results   = Registration::whereCompetitionId($id)->orderBy('created_at')->get();
		$sheetName = $results[0]->competition->title . '活动报名表';

		$datas[0] = ['姓名', '性别', '所在学院', '联系电话', '联系邮箱'];
		foreach ($results as $result) {
			$row   = [];
			$row[] = $result->name;
			$row[] = $result->sex;
			$row[] = $result->department;
			$row[] = $result->phone;
			$row[] = $result->email;

			$datas[] = $row;
		}

		Excel::create('export', function ($excel) use ($sheetName, $datas) {
			$excel->setTitle('Guangxi Normal University Registration');
			$excel->setCreator('Dean')->setCompany('Guangxi Normal University');

			$excel->sheet($sheetName, function ($sheet) use ($datas) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray($datas, null, 'A1', false, false);
			});
		})->export('xls');
	}
}
