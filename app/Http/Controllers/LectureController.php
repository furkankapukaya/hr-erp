<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Lecture;
class LectureController extends Controller
{
    function index()
    {
        $lectures = \App\Lecture::all();
        return view('lecture.index', ['lectures' => $lectures]);
    }
    public function create()
    {
    	return view('lecture.create');
    }

    public function store(Request $request)
    {
    	$lecture = new Lecture;
    	
    }
}
