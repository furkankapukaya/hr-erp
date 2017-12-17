<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{

	protected $hidden = ['project_id'];
    public function employee()
    {
    	return $this->belongsTo('App\Employee');
    }

    public function project(){
    	return $this->hasOne('App\Project','id','project_id');
    }

}
