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
        $employee_counts = [];
        foreach ($projects as $project) {
        	$tmp = $project->employees()->count();

        	array_push($employee_counts, $tmp);
        }
        //dd($employee_counts);
        return view('project.index', [
        	'projects' => $projects, 
			'employees' => $employees,
			'employee_counts' => $employee_counts
		]);
    }

    public function create()
    {
    	$employees = \App\Employee::all();
    	return view('project.create', ['employees' => $employees]);
    }

    public function store(Request $request)
    {
    	//dd($request);
    	$project = new Project;
    	if($request){
    		$project->name = $request->input('first-name');
    		$date_start = $request->input('startdate');
    		$project->starts = date("Y-m-d", strtotime($date_start));
    		$date_end = $request->input('enddate');
    		$project->ends = date("Y-m-d", strtotime($date_end));
    		$project->employee_id = $request->input('project-manager');
    	}
    	$project->save();
    	//dd($prj);
    	$project->employees()->attach($request->input('employees'));

    	return redirect()->action('ProjectController@index');
    	
    }
}
