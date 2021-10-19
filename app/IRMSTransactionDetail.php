<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable  as AuditableContract;
use OwenIt\Auditing\Auditable;

class IRMSTransactionDetail extends Model implements AuditableContract
{
    use Auditable;

	protected $connection = 'sqlsrv1';
	protected $table = 'is_detail';
	protected $primaryKey = 'id';

	protected $guarded = [];

	public $timestamps = false;

	public function header() {
		return $this->belongsTo('App\IRMSTransaction');
	}

}
