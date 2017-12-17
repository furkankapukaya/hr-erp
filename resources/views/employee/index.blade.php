@extends('layout')

@section('content')



<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="employee-container">
    <div class="x_panel">
      <div class="x_title">
        <h2>Employee List <small>employee list</small></h2>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table class="table" id="employee-table">
          <thead>
            <tr>
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Gender</th>
              <th>Date of Birth</th>
              <th>Address</th>
              <th>Date of Recruitment</th>
              <th>Email</th>
              <th>Operations</th>

            </tr>
          </thead>

          <tbody>
            @foreach($employees as $key=>$employee)
            <tr>
              <th scope="row">{{++$key}}</th>
              <td>{{$employee->name}}</td>
              <td>{{$employee->lastname}}</td>
              <td>{{$employee->gender}}</td>
              <td>{{$employee->birthday}}</td>
              <td>{{$employee->address}}</td>
              <td>{{$employee->recruitment}}</td>
              <td>{{$employee->email}}</td>
              <td>
                <button next-url="{{ $employee->id }}" data-url="{{ action('EmployeeController@edit', ['employee' => $employee]) }}" href="#" class="btn btn-info btn-xs btn-edit-tmp-employee" data-toggle="modal" data-target=".bs-example-m5odal-lg"><i class="fa fa-pencil"></i> Edit </button>
                <button data-url="{{ action('EmployeeController@destroy', ['employee' => $employee]) }}" href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-employee-modal-sm"><i class="fa fa-trash-o" ></i> Delete </button>
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>

      </div>

      <div id="employee-delete" class="modal fade bs-employee-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Delete Employee</h4>
            </div>
            <div class="modal-body">
              <h4>Are you sure?</h4>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary btn-delete-project-modal">Delete</button>
            </div>

          </div>
        </div>
      </div>

      <div id="employee-edit" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Edit Employee</h4>
            </div>
            <div class="modal-body">
              <form method="PUT" id="employee-update-form" data-parsley-validate="" class="form-horizontal form-label-left">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last-name" class="form-control col-md-7 col-xs-12" required=""/>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select class="form-control" name="gender">
                                        <option name="female" value="Female">Female</option>
                                        <option name="male" value="Male">Male</option>
                                      </select>
                        </div>
                      </div>
                          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" class="form-control has-feedback-left" name="birth" id="single_cal1" placeholder="Date Of Birth" aria-describedby="inputSuccess2Status">
                             <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                             <span id="inputSuccess2Status" class="sr-only">(success)</span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="address" name="address" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Recruitment <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" class="form-control has-feedback-left" name="recruitment" id="single_cal2" placeholder="Date Of Recruitment" aria-describedby="inputSuccess2Status">
                             <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                             <span id="inputSuccess2Status" class="sr-only">(success)</span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <input type="hidden" name="_method" value="put">
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button> 
                        </div>
                      </div>


                    </form>
      </div>


    </div>
  </div>
</div>


</div>
</div>
</div>
@stop
