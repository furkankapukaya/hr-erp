<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function demands()		
    {
    	return $this->hasMany('\App\Demand');
    }

    public function vacations()		
    {
    	return $this->hasMany('\App\Vacation');
    }

    public function timelines()		
    {
    	return $this->hasOne('\App\Timeline');
    }

    public function lectures()	
    {
    	return $this->belongsToMany('\App\Lecture');
    }



}
