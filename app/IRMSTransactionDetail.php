<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IRMSTransactionDetail extends Model
{

	protected $connection = 'sqlsrv1';
	protected $table = 'is_detail';
	protected $primaryKey = 'id';

	protected $guarded = [];

	public $timestamps = false;

	public function header() {
		return $this->belongsTo('App\IRMSTransaction');
	}

}
