@extends('layout')

@section('content')



    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Employee List <small>employee list</small></h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>Date of Recruitment</th>
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
                        <td>{{$employee->recruitment}}</td>
                        <td>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                        </td>

                      </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>
        </div>
    </div>
@stop
