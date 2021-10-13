<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IRMSTransaction extends Model
{
	protected $connection = 'sqlsrv1';
	protected $table = 'is_header';
	protected $primaryKey = 'id';

	protected $guarded = [];

	public function details() {
		return $this->hasMany('App\IRMSTransactionDetail','headerId', 'id');
	}

}
