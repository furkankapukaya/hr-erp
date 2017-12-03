@extends('layout')

@section('content')


  
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Employee List <small>employee list</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                </ul>
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
                      <th>Address</th>

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
                        <td>{{$employee->address}}</td>

                      </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>
        </div>
    </div>
@stop
