<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Timeline;
class TimelineController extends Controller
{
    function index()
    {
        $timelines = \App\Timeline::all();
        return view('timeline.index', ['timelines' => $timelines]);
    }

    public function create()
    {
    	return view('timeline.create');
    }
}
