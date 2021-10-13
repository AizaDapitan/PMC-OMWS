<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

	protected $guarded = [];


	public function costcode() {
		return $this->belongsToMany('App\Costcode','costcode_location');
	}

	public function contractor() {
		return $this->belongsToMany('App\Contractor', 'contractor_location')->withPivot('isActive', 'addedBy','removedBy','isHidden','addedDate','removeDate');
	}


	public function transaction () 
	{
		return $this->hasMany('App\Transaction', 'location_id', 'id');
	}
	

}
