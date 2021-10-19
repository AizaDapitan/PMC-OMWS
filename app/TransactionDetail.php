<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable  as AuditableContract;
use OwenIt\Auditing\Auditable;

class TransactionDetail extends Model implements AuditableContract
{
    use Auditable;

	protected $guarded = [];
	protected $dates = ['datetimeadded'];



	public function transaction () 
	{
		return $this->belongsTo('App\Transaction', 'transaction_id');
	}
	

	public function itemz () 
	{
		return $this->belongsTo('App\Item','item_id');
	}
	

}
