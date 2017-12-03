<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Employee;

class EmployeeController extends Controller
{

    function index()
    {
        $employees = \App\Employee::all();
        return view('employee.index', ['employees' => $employees]);
    }

}
