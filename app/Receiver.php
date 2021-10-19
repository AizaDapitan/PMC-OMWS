<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable  as AuditableContract;
use OwenIt\Auditing\Auditable;

class Receiver extends Model implements AuditableContract
{
    use Auditable;


	protected $guarded = [];

}
