@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Lectures List</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Lecture Name</th>
                  <th>Lecturer</th>
                  <th>Lecture Scope</th>
                  <th>Lecture Date</th>
                  <th>Capacity</th>
                  @if(!auth()->user()->admin)
                    <th>Operations</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @foreach($lectures as $key=>$lecture)
                <tr>
                  <th scope="row">{{++$key}}</th>
                  <td>{{ $lecture->name }}</td>
                  <td>{{ $lecture->lecturer }}</td>
                  <td>{{ $lecture->scope }}</td>
                  <td>{{ $lecture->starts }}</td>
                  <td>{{ $lecture->members }} / {{ $lecture->capacity }}</td>
                  @if(!auth()->user()->admin )
                    @if($lecture->capacity > $lecture->members)
                      <th><button data-url="{{ action('LectureController@update', ['lecture' => $lecture]) }}" href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-lecture-modal-sm"><i class="fa fa-pen" ></i> Sign in </button></th>
                    @else
                      <th>No room avaible</th>
                    @endif
                  @endif
                </tr>
                @endforeach

              </tbody>

            </table>

          </div>
          @if(!auth()->user()->admin && !empty($my_lectures))
              <div class="x_title">
                <h2>My Lectures</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Lecture Name</th>
                      <th>Lecturer</th>
                      <th>Lecture Scope</th>
                      <th>Lecture Date</th>
                      <th>Capacity</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($my_lectures as $key=>$my_lecture)
                    <tr>
                      <th scope="row">{{++$key}}</th>
                      <td>{{ $my_lecture->name }}</td>
                      <td>{{ $my_lecture->starts }}</td>
                      <td>{{ $my_lecture->scope }}</td>
                      <td>{{ $my_lecture->starts }}</td>
                      <td>{{ $my_lecture->members }} / {{ $my_lecture->capacity }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
          @endif
        </div>

    </div>
</div>


<div id="lecture-sign" class="modal fade bs-lecture-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Sign in</h4>
      </div>
      <div class="modal-body">
        <h4>Are you sure?</h4>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-lecture-sign-modal">Yes</button>
      </div>

    </div>
  </div>
</div>

@stop
