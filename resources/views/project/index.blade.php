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
                            <button data-url="{{ action('ProjectController@edit', ['project' => $project]) }}" href="#" class="btn btn-info btn-xs btn-edit-tmp" data-toggle="modal" data-target=".bs-example-m5odal-lg"><i class="fa fa-pencil"></i> Edit </button>
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

                  <div id="project-edit" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Edit Project</h4>
                        </div>
                        <div class="modal-body">
                          <form action="{{action('ProjectController@store')}}" method="POST" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                              {{ csrf_field() }}
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Project Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" name="first-name-edit" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-manager">Project Manager<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                     <input name="project-manager-name-edit" class="form-control col-md-7 col-xs-12" disabled>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-manager">New Project Manager<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                              <select class="form-control" name="project-manager">
                                                @foreach($employees as $employee)
                                                  <option name="{{ $employee->id }}" value="{{ $employee->id }}">{{ $employee->name }} {{ $employee->lastname }}</option>
                                                @endforeach
                                              </select>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-manager">Project Workers<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                              @for ($i = 0; $i < 4; $i++)
                                                  <input value="asdsa ">
                                              @endfor
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-manager">Project Workers<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                              <select class="select2_multiple form-control" multiple="multiple" name="employees[]">
                                                @foreach($employees as $employee)
                                                  <option name="employee" value="{{ $employee->id }}">{{ $employee->name }} {{ $employee->lastname }}</option>
                                                @endforeach
                                              </select>
                                </div>
                              </div>
                          
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Starting Date<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                   <input type="text" class="form-control has-feedback-left" name="start-date-edit" id="single_cal1" placeholder="Starting Date" aria-describedby="inputSuccess2Status">
                                     <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                     <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">End Date<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                   <input type="text" class="form-control has-feedback-left" name="end-date-edit" id="single_cal2" placeholder="End Date" aria-describedby="inputSuccess2Status">
                                     <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                     <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                </div>
                              </div>


                              

                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary btn-edit">Save changes</button>
                        </div>

                      </div>
                    </div>
                  </div>


              </div>
            </div>
        </div>
    </div>
@stop



