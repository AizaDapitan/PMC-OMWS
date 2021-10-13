<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

	protected $guarded = [];

	protected $dates = ['addedDate', 'docDate', 'datetimeedited'];



	public function details () 
	{
		return $this->hasMany('App\TransactionDetail','transaction_id', 'id');
	}
	

	public function contractor () 
	{
		return $this->belongsTo('App\Contractor');
	}
	

	public function locationz () 
	{
		return $this->belongsTo('App\Location','location_id');
	}
	

}
