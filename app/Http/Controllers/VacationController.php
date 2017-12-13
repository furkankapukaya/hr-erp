<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Vacation;
use \Auth;
class VacationController extends Controller
{
    function index()
    {
        $vacations = \App\Vacation::all();
        return view('vacation.index', ['vacations' => $vacations]);
    }

    public function create()
    {
    	return view('vacation.create');
    }

    public function store(Request $request)
    {
    	$vacation_demand = new Vacation;
    }
}
