<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    public function employees()
    {
    	return $this->belongsTo('\App\Employee');
    }
}
