<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model //implements AuditableContract
{


	protected $guarded = [];

    protected $fillable = [
        'name', 
        'description', 
        'active',
    ];
    protected $auditInclude = [
        'name', 
        'description', 
        'active',
    ];
}
