<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller {

	/**
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	 */

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware($this->guestMiddleware(), ['except' => ['showChangePasswordForm', 'changePassword']]);
	}

	public function showChangePasswordForm() {
		$title = '修改密码';

		return view('auth.password', compact('title'));
	}

	public function changePassword(ChangePasswordRequest $request) {
		if ($request->isMethod('put')) {
			if ($this->userService->changePassword(Auth::user(), $request->input('old_password'), $request->input('password'))) {
				return redirect()->route('auth.password')->withSuccess('修改密码成功');
			} else {
				return back()
					->withInput()
					->withErrors(['old_password' => '修改密码失败']);
			}
		}
	}
}
