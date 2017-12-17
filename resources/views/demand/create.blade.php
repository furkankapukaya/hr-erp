  @extends('layout')



@section('content')
	<div class="x_content">
        <br>
        <form action="{{action('DemandController@store')}}" method="POST" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" validate="">
        	{{ csrf_field() }}
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="demand-title">Demand Title <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="demand-title" name="demand-title" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Project Name</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="project-name">
                            @foreach($projects as $project)
                                <option name="{{ $project->name }}" value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                          </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="information">Information <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="information" name="information" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="button">Cancel</button>
			  <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" class="btn btn-success">Submit</button>	
            </div>
          </div>

        </form>
    </div>
@endsection