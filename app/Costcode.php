<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costcode extends Model
{

	protected $guarded = [];


	public function location() {
		return $this->belongsToMany('App\Location','costcode_location');
	}

}
