<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('registrations', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('sex');
			$table->string('department');
			$table->string('phone');
			$table->string('email');
			$table->integer('competition_id')->unsigned();
			$table->timestamps();

			$table->foreign('competition_id')->references('id')->on('competitions')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('registrations');
	}
}
