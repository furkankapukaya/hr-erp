@extends('layout')



@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Add Lecture</h2>
        <div class="clearfix"></div>
      </div>
    	<div class="x_content">
          <br>
          <form action="{{action('LectureController@store')}}" method="POST" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
          	{{ csrf_field() }}
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lecture-name">Lecture Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="lecture-name" name="lecture-name" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lecturer">Lecturer<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="lecturer" name="lecturer" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lecture-scope">Lecture Scope <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="lecture-scope" name="lecture-scope" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="capacity">Capacity <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="capacity" name="capacity" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Lecture Date<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               	 <input type="text" class="form-control has-feedback-left" name="starts" id="single_cal1" placeholder="Lecture Date" aria-describedby="inputSuccess2Status">
                   <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                   <span id="inputSuccess2Status" class="sr-only">(success)</span>
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
    </div>
  </div>
</div>
@endsection