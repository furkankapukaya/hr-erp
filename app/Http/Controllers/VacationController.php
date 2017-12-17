<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Vacation;
use \Auth;
class VacationController extends Controller
{
    function index()
    {
        $vacations = \App\Vacation::all();
        return view('vacation.index', ['vacations' => $vacations]);
    }

    public function create()
    {
    	return view('vacation.create');
    }

    public function store(Request $request)
    {
        if($request->input('vacation-id-edit') > 0){
            $vacation = Vacation::where('id', "=", (int)$request->input('vacation-id-edit'))->first();
            $vacation->status = $request->input('status');
            $vacation->save();
            return redirect()->action('VacationController@index');
        }

    	$vacation = new Vacation;
        if($request) {
            $vacation->info = $request->input('information');
            $vacation->employee_id = \App\Employee::where('email', "=", auth()->user()->email)->first()->id;
            $date_start = $request->input('starts');
            $vacation->starts = date("Y-m-d", strtotime($date_start));
            $date_end = $request->input('ends');
            $vacation->ends = date("Y-m-d", strtotime($date_end));
        }
        $vacation->save();

        return redirect()->action('VacationController@index');
    }

    

    public function edit($id)
    {
        $vacation = Vacation::with('employee')->where(['id' => $id])->first();
        $vacation->starts = date("m/d/Y", strtotime($vacation->starts));
        $vacation->ends = date("m/d/Y", strtotime($vacation->ends));
        return ['vacation' => $vacation];
    }
}
