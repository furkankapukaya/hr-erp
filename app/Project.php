<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $hidden = ['employee_id'];
    public function employees()
    {
    	return $this->belongsToMany('\App\Employee');
    }
    public function Manager(){
    	return $this->hasOne('App\Employee','id','employee_id')->select(['id','name','lastname']);
    }
}
