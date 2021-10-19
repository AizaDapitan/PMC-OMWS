<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable  as AuditableContract;
use OwenIt\Auditing\Auditable;

class Contractor extends Model implements AuditableContract
{
    use Auditable;

	protected $guarded = [];


	public function location() {
		return $this->belongsToMany('App\Location','contractor_location')->withPivot('isActive', 'addedBy','removedBy','isHidden','addedDate','removeDate');
	}


	public function transaction () 
	{
		return $this->hasMany('App\Transaction','contractor_id', 'id');
	}
	

}
