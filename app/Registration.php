<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model {

	protected $fillable = ['name', 'sex', 'department', 'phone', 'email'];

	public function competition() {
		return $this->belongsTo('App\Competition');
	}
}
