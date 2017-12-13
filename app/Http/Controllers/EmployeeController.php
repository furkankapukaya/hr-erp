<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Employee;
use \App\User;

class EmployeeController extends Controller
{
	public function create()
    {
    	return view('employee.create');
    }

    public function index()
    {
        $employees = \App\Employee::all();
        return view('employee.index', ['employees' => $employees]);
    }

    public function store(Request $request)
    {
    	//dd($request);
        $request->validate([
            'first-name' => 'required|max:255',
            'last-name' => 'required|max:255',
            'address' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);


    	$employee = new Employee;
        $user = new User;
    	if($request){
    		$employee->name = $request->input('first-name');
    		$employee->lastname = $request->input('last-name');
    		$employee->gender = $request->input('gender');
    		$employee->address = $request->input('address');
    		$date_old = $request->input('birth');
    		$employee->birthday = date("Y-m-d", strtotime($date_old));
    		$recruitment_old = $request->input('recruitment');
    		$employee->recruitment =date("Y-m-d", strtotime($recruitment_old));
            $employee->email = $request->input('email');
            $employee->password = $request->input('password');

            $user->name = $employee->name;
            $user->password = $employee->password;
            $user->email = $employee->email;
    	}
        $user->save();
    	$employee->save();

		return redirect()->action('EmployeeController@index');
		//$employees = Employe::all();
		//return view('employee.index', ['employees' => $employees]);
   	}

}
