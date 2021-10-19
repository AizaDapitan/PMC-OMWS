<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable  as AuditableContract;
use OwenIt\Auditing\Auditable;

class Item extends Model implements AuditableContract
{
    use Auditable;

	protected $dates = ['addedDate'];

	protected $guarded = [];



	public function transaction_detail () 
	{
		return $this->hasMany('App\TransactionDetail','item_id', 'id');
	}
	

}
