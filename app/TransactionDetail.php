<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{

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
