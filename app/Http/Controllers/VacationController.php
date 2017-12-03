<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Vacation;
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
}
