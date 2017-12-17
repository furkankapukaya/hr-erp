<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Demand;
use \Auth;
use \App\Employee;

class DemandController extends Controller
{
	function index()
    {
        if(auth()->user()->admin){
            $demands = \App\Demand::all();    
        }else{
            $employee = \App\Employee::where('email', "=", auth()->user()->email)->first();
            $demands = \App\Demand::where('employee_id', "=", $employee->id)->get();
            //dd($demands);   
        }
        $demands = collect($demands)->sortBy('status');
        //dd($demands);
        return view('demand.index', ['demands' => $demands]);
    }
	
    public function create()
    {
        $employee = Employee::where('email', "=", auth()->user()->email)->first();
        $projects = $employee->projects;
    	return view('demand.create', ['projects' => $projects]);
    }

    public function store(Request $request)
    {
        
        if($request->input('demand-id-edit') > 0){
            $demand = Demand::where('id', "=", (int)$request->input('demand-id-edit'))->first();
            $demand->status = $request->input('status');
            $demand->save();
            return redirect()->action('DemandController@index');
        }

        $demand = new Demand;
        if($request) {
            $demand->info = $request->input('information');
            $demand->project_id = $request->input('project-name');
            $demand->title = $request->input('demand-title');
            $employee = \App\Employee::where('email', "=", auth()->user()->email)->first();
            $demand->employee_id = $employee->id;
           // dd($demand);
            $demand->save();
        }
        return redirect()->action('DemandController@index');
    }

    public function edit($id)
    {
        $demand = Demand::with('project')->where(['id' => $id])->first();
       // dd($demand);

        return ['demand' => $demand];
    }		
}
