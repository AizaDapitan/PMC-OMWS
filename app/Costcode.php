<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable  as AuditableContract;
use OwenIt\Auditing\Auditable;

class Costcode extends Model implements AuditableContract
{
    use Auditable;

	protected $guarded = [];


	public function location() {
		return $this->belongsToMany('App\Location','costcode_location');
	}

}
