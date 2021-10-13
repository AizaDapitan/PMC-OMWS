<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{

	protected $guarded = [];


	public function location() {
		return $this->belongsToMany('App\Location','contractor_location')->withPivot('isActive', 'addedBy','removedBy','isHidden','addedDate','removeDate');
	}


	public function transaction () 
	{
		return $this->hasMany('App\Transaction','contractor_id', 'id');
	}
	

}
