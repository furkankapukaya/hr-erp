<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project;
use \App\Employee;
use \DB;


class ProjectController extends Controller
{
    public function index()
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
    	$project->employees()->attach($request->input('employees'));
        session()->flash(
            'message', 'Project has been added.'
            );

    	return redirect()->action('ProjectController@index');
    	
    }

    public function edit($id)
    {
        $employees = Employee::all();
        $project = Project::find($id);
        $project->starts = date("m/d/Y", strtotime($project->starts));
        return view('project.edit', ['project' => $project, 'employees' => $employees]);
    }

    public function update(Request $request)
    {
        $project = Project::find(1);
    }

    public function destroy($id)
    {
        Project::where(['id' => $id])->delete();
       // DB::table('projects')->delete($id);
        
        return ['message' => "Project has been deleted."];
    }
}
