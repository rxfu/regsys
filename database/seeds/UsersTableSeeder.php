<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		User::create([
			'username' => 'admin',
			'name'     => '管理员',
			'email'    => 'admin@gxnu.edu.cn',
			'password' => bcrypt('admin888'),
		]);
	}
}
