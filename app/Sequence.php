<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable  as AuditableContract;
use OwenIt\Auditing\Auditable;

class Sequence extends Model implements AuditableContract
{
    use Auditable;
	protected $guarded = [];
	protected $table = "sequence";

	protected $fillable = [
		'sequence_id', 'is_open',
		'is_fabricated', 'created_by', 'updated_by'
	];

	protected $auditInclude = [
		'sequence_id',
		'is_open', 'is_fabricated',
		'created_by', 'updated_by'

	];
}
