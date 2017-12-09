@extends('layout')

@section('content')


  
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" id="project-container">
            <div class="x_panel">
              <div class="x_title">
                <h2>Project List</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <table class="table" id="project-table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Project Name</th>
                      <th>Project Manager</th>
                      <th>Starting Date</th>
                      <th>End Date</th>
                      <th>Number of Workers</th>
                      <th>Operations</th>
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
                        <td>
                            <a href="{{ action('ProjectController@edit', ['project' => $project]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <button data-url="{{ action('ProjectController@destroy', ['project' => $project]) }}" href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-trash-o" ></i> Delete </button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                  <div id="project-delete" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Delete Project</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Are you sure?</h4>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary btn-delete">Delete</button>
                        </div>

                      </div>
                    </div>
                  </div>





              </div>
            </div>
        </div>
    </div>
@stop




