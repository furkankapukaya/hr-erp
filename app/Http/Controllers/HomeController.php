<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = \App\Project::all()->count();
        $employees = \App\Employee::all()->count();
        $demands = \App\Demand::all()->count();
        $lectures = \App\Lecture::all()->count();
        return view('dashboard', [
            'projects' => $projects,
            'employees' => $employees,
            'demands' => $demands,
            'lectures' => $lectures
        ]);
    }
}
