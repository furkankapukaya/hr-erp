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
        if(auth()->user()->admin){
            $projects = \App\Project::all();
        }else{
            $current_employee = \App\Employee::where('email', "=", auth()->user()->email)->first();
            //$employee = \App\Employee::where('email', "=", auth()->user()->email)->first();
            $projects = $current_employee->projects;
        }
        
        //select project_id,count( employee_id) as employee_count from employee_projects group by project_id 

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

        if($request->input('project-id-edit') > 0 ) {
            $project = Project::find($request->input('project-id-edit'));
            $project->employees()->detach();
            session()->flash(
            'message', 'Project has been updated.'
            );
        }else {
            $project = new Project;
            session()->flash(
            'message', 'Project has been added.'
            );
        }

    	
    	if($request){
    		$project->name = $request->input('first-name');
    		$date_start = $request->input('start-date');
    		$project->starts = date("Y-m-d", strtotime($date_start));
    		$date_end = $request->input('end-date');
    		$project->ends = date("Y-m-d", strtotime($date_end));
    		$project->employee_id = $request->input('project-manager');
    	}
    	$project->save();
    	$project->employees()->attach($request->input('employees'));
        

    	return redirect()->action('ProjectController@index');
    	
    }

    public function edit($id)
    {
        $employees = Employee::all();
        $project = Project::with(['Manager', 'employees'])->where(['id'=>$id])->first();
        $project->starts = date("m/d/Y", strtotime($project->starts));
        $project->ends = date("m/d/Y", strtotime($project->ends));

        return ['project' => $project, 'employees' => $employees];
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
