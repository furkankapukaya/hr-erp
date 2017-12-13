@extends('layout')



@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Demand Vacation</h2>
        <div class="clearfix"></div>
      </div>
    <div class="x_content">
        <br>
        <form action="{{action('VacationController@store')}}" method="POST" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
          {{ csrf_field() }}
              
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Starting Date <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="text" class="form-control has-feedback-left" name="starts" id="single_cal1" placeholder="Starting Date" aria-describedby="inputSuccess2Status">
                 <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                 <span id="inputSuccess2Status" class="sr-only">(success)</span>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ending Date<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="text" class="form-control has-feedback-left" name="ends" id="single_cal2" placeholder="Ending Date" aria-describedby="inputSuccess2Status">
                 <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                 <span id="inputSuccess2Status" class="sr-only">(success)</span>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="info">Information <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="info" name="info" required="required" class="form-control col-md-7 col-xs-12">
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