<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Demand;

class DemandController extends Controller
{
	function index()
    {
        $demands = \App\Demand::all();
        return view('demand.index', ['demands' => $demands]);
    }
	
    public function create()
    {
    	return view('demand.create');
    }		
}
