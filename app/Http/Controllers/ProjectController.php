<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project;


class ProjectController extends Controller
{
    function index()
    {
        $projects = \App\Project::all();
        $employees = \App\Employee::all();
        return view('project.index', ['projects' => $projects, 'employees' => $employees]);
    }

    public function create()
    {
    	$employees = \App\Employee::all();
    	return view('project.create', ['employees' => $employees]);
    }
}
