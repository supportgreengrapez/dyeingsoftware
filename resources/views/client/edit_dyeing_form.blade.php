@extends('client.layout.app')
@section('content') 
<!-- page content -->

<div class="container">
  <h2 style="color:#f9a848; text-align:center; margin-top:10px;"><strong>Edit Issue Form</strong></h2>
  <div class="clearfix"></div>
  
  @if(count($result)>0)
          @foreach($result as $results)
  <form method="post" action="{{url('/')}}/edit/dyeing/data/{{$results->pk_id}}" enctype="multipart/form-data">
    @if($errors->any())
    <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
    @endif
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
          <label>Tahn</label>
          <input type="text" class="form-control" name="tahn" value="{{$results->tahn}}">
        </div>
        <div class="form-group">
          <label>Date</label>
          <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
            <input class="form-control" type="text" name="date" autocomplete="off" value="{{$results->date}}" required/>
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
        </div>
        <div class="form-group">
          <label>Weight</label>
          <input type="text" class="form-control" name="weight" value="{{$results->weight}}">
        </div>
        
  @endforeach
          @endif
        <div class="form-group">
          <label>Quality</label>
          <!--<a href="#" data-toggle="modal" data-target="#quality"><i class="fa fa-plus"></i></a>-->
          <select class="js-example-basic-single form-control" name="quality">
            <option value="">---Select Quality---</option>
            
                        
                    @if($quality>0)
                    @foreach($quality as $results)
                            
                        
            <option value="{{$results->quality}}">{{$results->quality}}</option>
            
                        
                            @endforeach
                            @endif
          
          </select>
        </div>
        
  @if(count($result)>0)
          @foreach($result as $results)
        <div class="form-group">
          <label>Quantity</label>
          <input type="text" class="form-control" name="quantity" value="{{$results->quantity}}">
        </div>
        
  @endforeach
          @endif
        <div class="form-group">
          <label>Unit</label>
          <select class="js-example-basic-single form-control" name="unit">
            <option value="Meter">Meter</option>
            <option value="Yard">Yard</option>
            <option value="inchs">Inches</option>
            <option value="Centimeter">Centimeter</option>
            <option value="Kilogram">Kilogram</option>
            <option value="Gram">Gram </option>
            <option value="Litre">Litre</option>
            <option value="Mililitre">Mililitre</option>
            <option value="Watt">Watt</option>
            <option value="Volt-ampere">Volt-ampere</option>
            <option value="Horse-power">Horse-power</option>
            <option value="Cubic centimeter">Cubic centimeter</option>
            <option value="Radian">Radian</option>
            <option value="Degree">Degree</option>
            <option value="Bit">Bit</option>
            <option value="Byte">Byte</option>
            <option value="Kilobyte">Kilobyte</option>
            <option value="Megabyte">Megabyte</option>
            <option value="GigaByte">GigaByte </option>
            <option value="Terabyte">Terabyte</option>
            <option value="Pixel">Pixel</option>
            <option value="Density per pixel">Density per pixel </option>
            <option value="pieces">Pieces </option>
            <option value="packs">Packs</option>
            <option value="pairs">Pairs</option>
            <option value="dozen">Dozen</option>
            <option value="Vol">Vol </option>
            <option value="percent">Percent</option>
            <option value="percent">Pond</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="txt2">Submit</button>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
          <label>Send To</label>
          <!--<a href="#" data-toggle="modal" data-target="#send_to"><i class="fa fa-plus"></i></a>-->
          <select class="js-example-basic-single form-control" name="send_to">
            <option value="">---Select Send To---</option>
            
                        
                    @if($send_to>0)
                    @foreach($send_to as $results)
                            
                        
            <option value="{{$results->sender}}">{{$results->sender}}</option>
            
                        
                            @endforeach
                            @endif
                            
          </select>
          
        </div>
        <div class="form-group">
          <label>Material Center </label>
          <!--<a href="#" data-toggle="modal" data-target="#material"><i class="fa fa-plus"></i></a>-->
          <select class="js-example-basic-single form-control" name="material">
            <option value="">---Select Material Center---</option>
            
                        
                    @if($material_center>0)
                    @foreach($material_center as $results)
                            
                        
            <option value="{{$results->material_center}}">{{$results->material_center}}</option>
            
                        
                            @endforeach
                            @endif
          
          </select>
          
        </div>
        
  @if(count($result)>0)
          @foreach($result as $results)
        <div class="form-group">
          <label>Color</label>
          
            <div class="input-group my-colorpicker2 colorpicker-element">
              <input type="text" name="color" class="form-control" autocomplete="off" value="{{$results->color}}">
              <div class="input-group-addon"> <i style="background-color: rgb(0, 0, 0);"></i> </div>
            </div>
        </div>
        <div class="form-group">
          <label>System Lot Number</label>
          <input type="text" class="form-control" name="bl" value="{{$results->bl}}">
        </div>
        <div class="form-group">
          <label>Challan No/GP No</label>
          <input type="text" class="form-control" name="challan_no" value="{{$results->challan_no}}">
        </div>
        <div class="form-group">
          <label>Dyeing Lot</label>
          <input type="text" class="form-control" name="dyeing_lot" value="{{$results->dyeing_lot}}">
        </div>
        <div class="form-group">
          <label>Folding</label>
          <input type="text" class="form-control" name="folding" value="{{$results->folding}}">
        </div>
  @endforeach
          @endif
      </div>
    </div>
  </form>
</div>
<!-- /page content --> 

@endsection