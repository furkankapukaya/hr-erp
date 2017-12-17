@extends('layout')

@section('content')


  
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Demand List</h2>
                
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      @if(auth()->user()->admin)
                        <th>Demand Owner</th>
                      @endif
                      <th>Demand Title</th>
                      <th>Demand Information</th>
                      <th>Related Project</th>
                      <th>Status</th>
                      @if(auth()->user()->admin)
                          <th>Operations</th>      
                      @endif
                    </tr>
                  </thead>

                  <tbody>
                    <?php $key = 0; ?>
                    @foreach($demands as $demand)
                      <tr>
                        <th scope="row">{{ ++$key }}</th>
                        @if(auth()->user()->admin)
                          <td>{{ $demand->employee->name }} {{ $demand->employee->lastname }}</td>
                        @endif
                        <td>{{ $demand->title }}</td>
                        <td>{{ $demand->info }}</td>
                        <td>{{ $demand->project->name }}</td>
                        <td>
                            @if($demand->status == 0)
                                On Progress
                            @elseif($demand->status == 1)
                                Confirmed
                            @else
                                Rejected
                            @endif
                        </td>
                        @if(auth()->user()->admin && $demand->status == 0)
                            <td>
                                 <button data-url="{{ action('DemandController@edit', ['demand' => $demand]) }}" href="#" class="btn btn-info btn-xs btn-edit-tmp-demand" data-toggle="modal" data-target=".bs-example-m5odal-lg"><i class="fa fa-pencil"></i> Edit </button>
                            </td> 
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div id="demand-edit" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Edit Demand</h4>
                        </div>
                        <div class="modal-body">
                          <form action="{{action('DemandController@store')}}" method="POST" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                              {{ csrf_field() }}
                              
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="demand-title">Demand Title <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="demand-title" name="demand-title-edit" required="required" class="form-control col-md-7 col-xs-12" disabled>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Project Name</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                     <input type="text" id="project-name" name="project-name-edit" required="required" class="form-control col-md-7 col-xs-12" disabled>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="information">Information <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="information" name="information-edit" value="" required="required" class="form-control col-md-7 col-xs-12" disabled>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select class="form-control" name="status">
                                          <option name="0" value="0">On Progress</option>
                                          <option name="1" value="1">Confirm</option>
                                          <option name="2" value="2">Reject</option>
                                      </select>
                                  </div>
                                </div>

                                <input type="hidden" name="demand-id-edit" id="demand-id-edit">
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Edit</button> 
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
    </div>
@stop
