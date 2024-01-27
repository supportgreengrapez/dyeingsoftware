@extends('client.layout.app')
@section('content') 
<!-- page content -->

<div class="container">
  <h2 style="color:#f9a848; text-align:center; margin-top:10px;"><strong>Folding Dyeing</strong></h2>
  <div class="clearfix"></div>
  <form method="post" action="{{url('/')}}/floding/dyeing/data/{{$id}}" enctype="multipart/form-data">
    @if($errors->any())
    <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
    @endif
    {{csrf_field()}}
    @if(count($result)>0)
          @foreach($result as $results)
          <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
          <label>Lot No</label>
          <input type="text" class="form-control" name="lot_no" value="{{$results->lot_no}}" readonly>
          
        </div>
        </div>
          </div>
    <div class="row">
      <div class="col-md-6 col-sm-12 col-xs-12">
          
        
        <div class="form-group">
          <label>Send From</label>
          <input type="text" class="form-control" name="send_to" value="{{$results->send_to}}" readonly>
        </div>
        <div class="form-group">
          <label>Recieved From</label>
          <input type="text" class="form-control" name="recieved_from" value="{{$results->recieved_from}}" readonly>
        </div>
        <div class="form-group">
          <label>Quantity</label>
          <input type="text" class="form-control" name="quantity" value="{{$results->quantity}}">
        </div>
        <div class="form-group">
          <label>Unit</label>
          
          <select class="js-example-basic-single form-control" name="unit">
            <option   @if($results->unit=="feet") selected @endif  value="feet">feet</option>
            <option   @if($results->unit=="Meter") selected @endif value="Meter">Meter</option>
            <option   @if($results->unit=="Yard") selected @endif value="Yard">Yard</option>
            <option   @if($results->unit=="inchs") selected @endif value="inchs">Inches</option>
            <option   @if($results->unit=="Centimeter") selected @endif value="Centimeter">Centimeter</option>
            <option   @if($results->unit=="Kilogram") selected @endif value="Kilogram">Kilogram</option>
            <option   @if($results->unit=="Gram") selected @endif value="Gram
            ">Gram </option>
            <option   @if($results->unit=="Litre") selected @endif value="Litre">Litre</option>
            <option   @if($results->unit=="Mililitre") selected @endif value="Mililitre">Mililitre</option>
            <option   @if($results->unit=="Watt") selected @endif value="Watt">Watt</option>
            <option   @if($results->unit=="Volt-ampere") selected @endif value="Volt-ampere">Volt-ampere</option>
            <option   @if($results->unit=="Horse-power") selected @endif value="Horse-power">Horse-power</option>
            <option   @if($results->unit=="Cubic centimeter") selected @endif value="Cubic centimeter">Cubic centimeter</option>
            <option   @if($results->unit=="Radian") selected @endif value="Radian">Radian</option>
            <option   @if($results->unit=="Degree") selected @endif value="Degree">Degree</option>
            <option   @if($results->unit=="Bit") selected @endif value="Bit">Bit</option>
            <option   @if($results->unit=="Byte") selected @endif value="Byte">Byte</option>
            <option   @if($results->unit=="Kilobyte") selected @endif value="Kilobyte">Kilobyte</option>
            <option   @if($results->unit=="Megabyte") selected @endif value="Megabyte">Megabyte</option>
            <option   @if($results->unit=="GigaByte") selected @endif value="GigaByte">GigaByte </option>
            <option   @if($results->unit=="Terabyte") selected @endif value="Terabyte">Terabyte</option>
            <option   @if($results->unit=="Pixel") selected @endif value="Pixel">Pixel</option>
            <option   @if($results->unit=="Density per pixel") selected @endif value="Density per pixel
            ">Density per pixel </option>
            <option   @if($results->unit=="Pieces") selected @endif value="Pieces">Pieces </option>
            <option   @if($results->unit=="Packs") selected @endif value="packs">Packs</option>
            <option   @if($results->unit=="Pairs") selected @endif value="Pairs">Pairs</option>
            <option   @if($results->unit=="Dozen") selected @endif value="Dozen">Dozen</option>
            <option   @if($results->unit=="Vol") selected @endif value="Vol
            ">Vol </option>
            <option   @if($results->unit=="Percent") selected @endif value="Percent">Percent</option>
            <option   @if($results->unit=="Pond") selected @endif value="Pond">Pond</option>
          </select>
        </div>
        
        <div class="form-group">
          <button type="submit" class="txt2">Submit</button>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
        
        <div class="form-group">
          <label>Color</label>
          <!--<select class="js-example-basic-single form-control" name="color">-->
          <!--  <option value="Grey">Grey</option>-->
          <!--  <option value="White">White</option>-->
          <!--  <option value="Red">Red</option>-->
          <!--  <option value="Black">Black</option>-->
          <!--  <option value="Grey">Grey</option>-->
          <!--  <option value="Yellow">Yellow</option>-->
          <!--  <option value="Blue">Blue</option>-->
          <!--  <option value="Green">Green</option>-->
          <!--  <option value="Brown">Brown</option>-->
          <!--  <option value="Pink">Pink</option>-->
          <!--  <option value="Orange">Orange</option>-->
          <!--  <option value="Purple">Purple</option>-->
          <!--</select>-->
          <div class="input-group my-colorpicker2 colorpicker-element">
              <input type="text" name="color" class="form-control" value="{{$results->color}}" autocomplete="off">
              <div class="input-group-addon"> <i style="background-color: rgb(0, 0, 0);"></i> </div>
            </div>
        </div>
        <div class="form-group">
          <label>Challan No/GP No</label>
          <input type="text" class="form-control" name="challan_no" value="{{$results->challan_no}}">
        </div>
        <div class="form-group">
          <label>Folding</label>
          <input type="text" class="form-control" name="folding" value="{{$results->folding}}">
        </div>
        <div class="form-group">
          <label>Cut Piece</label>
          <input type="text" class="form-control" name="cut_piece" value="{{$results->cut_piece}}">
        </div>
        <div class="form-group">
          <label>Shortage</label>
          <input type="text" class="form-control" name="shortage" value="0">
        </div>
      </div>
    </div>
    @endforeach
          @endif
  </form>
</div>
<!-- /page content --> 

@endsection