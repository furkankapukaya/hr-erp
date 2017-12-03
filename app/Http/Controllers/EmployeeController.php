<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Employee;

class EmployeeController extends Controller
{
	public function create()
    {
    	return view('employee.create');
    }	

    function index()
    {
        $employees = \App\Employee::all();
        return view('employee.index', ['employees' => $employees]);
    }

    public function store(Request $request)
    {
    	//dd($request);
    	$employee = new Employee;
    	if($request){
    		$employee->name = $request->input('first-name');
    		$employee->lastname = $request->input('last-name');
    		$employee->gender = $request->input('gender');
    		$employee->address = $request->input('address');
    		$date_old = $request->input('birth');
    		$employee->birthday = date("Y-m-d", strtotime($date_old));
    		$recruitment_old = $request->input('recruitment');
    		$employee->recruitment =date("Y-m-d", strtotime($recruitment_old));
    	}
    	$employee->save();

   	}

}
