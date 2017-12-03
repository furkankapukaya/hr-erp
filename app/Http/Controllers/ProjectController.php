<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project;


class ProjectController extends Controller
{
    function index()
    {
        $projects = \App\Project::all();
        return view('project.index', ['projects' => $projects]);
    }

    public function create()
    {
    	return view('project.create');
    }
}
