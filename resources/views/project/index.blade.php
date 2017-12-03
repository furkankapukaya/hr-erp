@extends('layout')

@section('content')


  
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Project List</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Project Name</th>
                      <th>Project Manager</th>
                      <th>Starting Date</th>
                      <th>End Date</th>
                      <th>Number of Workers</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($projects as $key=>$project)
                      <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{ $project->name }}</td>
                        <td>{{ \App\Employee::find($project->employee_id)->name }}
                         {{ \App\Employee::find($project->employee_id)->lastname }}</td>
                        <td>{{ $project->starts }}</td>
                        <td>{{ $project->ends }}</td>
                        <td>{{ $employee_counts[$key-1] }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>
        </div>
    </div>
@stop
