<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemandController extends Controller
{
    public function create()
    {
    	return view('demands.create');
    }

    public function store(Request $request)
    {
    	$demand = new Demand;
    	$demand->info 	= $request->input('info');
    }
}
