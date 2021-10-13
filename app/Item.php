<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

	protected $dates = ['addedDate'];

	protected $guarded = [];



	public function transaction_detail () 
	{
		return $this->hasMany('App\TransactionDetail','item_id', 'id');
	}
	

}
