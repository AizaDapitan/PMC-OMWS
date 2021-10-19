<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable  as AuditableContract;
use OwenIt\Auditing\Auditable;

class IRMSTransaction extends Model implements AuditableContract
{
    use Auditable;
	protected $connection = 'sqlsrv1';
	protected $table = 'is_header';
	protected $primaryKey = 'id';

	protected $guarded = [];

	public function details() {
		return $this->hasMany('App\IRMSTransactionDetail','headerId', 'id');
	}

}
