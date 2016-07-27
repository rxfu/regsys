<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model {

	protected $fillable = ['title', 'description', 'is_active'];

	public function registrations() {
		return $this->hasMany('App\Registration');
	}
}
