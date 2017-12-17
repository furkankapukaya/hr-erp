<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Lecture;
class LectureController extends Controller
{
    function index()
    {
        if(auth()->user()->admin) {
            $lectures = \App\Lecture::all();
            return view('lecture.index', ['lectures' => $lectures]);
        } else {
            $my_lectures = \App\Employee::where("email", "=", auth()->user()->email)->first()->lectures;
            $tmp = \App\Lecture::all();
            $lectures = $tmp->diff($my_lectures);
            return view('lecture.index', ['lectures' => $lectures, 'my_lectures' => $my_lectures]);

        }
        
    }
    public function create()
    {
    	return view('lecture.create');
    }

    public function store(Request $request)
    {
    	$lecture = new Lecture;

        if($request) {
            $lecture->name = $request->input('lecture-name');
            $lecture->scope = $request->input('lecture-scope');
            $lecture->lecturer = $request->input('lecturer');
            $lecture->capacity = $request->input('capacity');
            $date_start = $request->input('starts');
            $lecture->starts = date("Y-m-d", strtotime($date_start));            
        }
    	
        $lecture->save();
        return redirect()->action('LectureController@index');
    }
    public function update($id)
    {
        //dd($id);
        $lecture = Lecture::find($id);
        $employee = \App\Employee::where("email", "=", auth()->user()->email)->first();
        $lecture->members++;
        $lecture->save();
        $lecture->employees()->attach($employee);
        return ['message' => "Succes"];
    }
}   
