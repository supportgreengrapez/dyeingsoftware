@extends('client.layout.app')
@section('content') 
<!-- page content -->

<div class="container">
  <h2 style="color:#f9a848; text-align:center; margin-top:10px;"><strong>Sender Name Form</strong></h2>
  <div class="clearfix"></div>
  <form method="post" action="{{url('/')}}/add/sender/data" enctype="multipart/form-data">
    @if($errors->any())
    <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
    @endif
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
          <label>Sender Name</label>
          <input type="text" class="form-control" name="sender">
        </div>
        <div class="form-group">
          <button type="submit" class="txt2">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- /page content --> 

@endsection