<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
	protected $guarded = [];
	protected $table = "sequence";

	protected $fillable = [
        'sequence_id','is_open','is_fabricated', 'created_by', 'updated_by'
    ];
}
