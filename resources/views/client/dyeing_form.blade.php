@extends('client.layout.app')
@section('content') 
<!-- page content -->

<div class="container">
  <h2 style="color:#f9a848; text-align:center; margin-top:10px;"><strong>Issue Form</strong></h2>
  <div class="clearfix"></div>
  <form method="post" action="{{url('/')}}/add/dyeing/data" enctype="multipart/form-data">
    @if($errors->any())
    <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
    @endif
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
          <label>Tahn</label>
          <input type="text" class="form-control" name="tahn">
        </div>
        <div class="form-group">
          <label>Date</label>
          <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
            <input class="form-control" type="text" name="date" autocomplete="off" required/>
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
        </div>
        <div class="form-group">
          <label>Weight</label>
          <input type="text" class="form-control" name="weight">
        </div>
        <div class="form-group">
          <label>Quality</label>
          <a href="#" data-toggle="modal" data-target="#quality"><i class="fa fa-plus"></i></a>
          <!--<select class="js-example-basic-single form-control" name="quality">-->
          <!--  <option value="">---Select Quality---</option>-->
            
                        
          <!--          @if($quality>0)-->
          <!--          @foreach($quality as $results)-->
                            
                        
          <!--  <option value="{{$results->quality}}">{{$results->quality}}</option>-->
            
                        
          <!--                  @endforeach-->
          <!--                  @endif-->
          
          <!--</select>-->
          <div class="datalists">
            <input list="quality" name="quality"  autocomplete="off"/>
            
            <datalist id="quality">
                    @if($quality>0)
                    @foreach($quality as $results)
                            
                        
            <option value="{{$results->quality}}">{{$results->quality}}</option>
            
                        
                            @endforeach
                            @endif
            </datalist>
            </div>
        </div>
        <div class="form-group">
          <label>Quantity</label>
          <input type="text" class="form-control" name="quantity">
        </div>
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
          <label>Remarks</label>
          <textarea class="form-control" name="remarks" rows="9"></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="txt2">Submit</button>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
          <label>Send To</label>
          <a href="#" data-toggle="modal" data-target="#send_to"><i class="fa fa-plus"></i></a>
          <!--<select class="js-example-basic-single form-control" name="send_to">-->
          <!--  <option value="">---Select Send To---</option>-->
            
                        
          <!--          @if($send_to>0)-->
          <!--          @foreach($send_to as $results)-->
                            
                        
          <!--  <option value="{{$results->sender}}">{{$results->sender}}</option>-->
            
                        
          <!--                  @endforeach-->
          <!--                  @endif-->
                            
          <!--</select>-->
          
          <div class="datalists">
            <input list="send_to" name="send_to"  autocomplete="off"/>
            
            <datalist id="send_to">
                    @if($send_to>0)
                    @foreach($send_to as $results)
                            
                        
            <option value="{{$results->sender}}">{{$results->sender}}</option>
            
                        
                            @endforeach
                            @endif
            </datalist>
            </div>
        </div>
        <div class="form-group">
          <label>Material Center </label>
          <a href="#" data-toggle="modal" data-target="#material"><i class="fa fa-plus"></i></a>
          <!--<select class="js-example-basic-single form-control" name="material">-->
          <!--  <option value="">---Select Material Center---</option>-->
            
                        
          <!--          @if($material_center>0)-->
          <!--          @foreach($material_center as $results)-->
                            
                        
          <!--  <option value="{{$results->material_center}}">{{$results->material_center}}</option>-->
            
                        
          <!--                  @endforeach-->
          <!--                  @endif-->
          
          <!--</select>-->
          
          <div class="datalists">
            <input list="material" name="material"  autocomplete="off"/>
            
            <datalist id="material">
                
                
            <option value="">Select Material</option>
                    @if($material_center>0)
                    @foreach($material_center as $results)
                            
                        
            <option value="{{$results->material_center}}">{{$results->material_center}}</option>
            
                        
                            @endforeach
                            @endif
            </datalist>
            </div>
          
        </div>
        <div class="form-group">
          <label>Color</label>
          <!--<select class="js-example-basic-single form-control" name="color">-->
          <!--  <option value="">Select Color</option>-->
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
              <input type="text" name="color" class="form-control" autocomplete="off">
              <div class="input-group-addon"> <i style="background-color: rgb(0, 0, 0);"></i> </div>
            </div>
        </div>
        <div class="form-group">
          <label>System Lot Number</label>
          <input type="text" class="form-control" name="bl">
        </div>
        <div class="form-group">
          <label>Challan No/GP No</label>
          <input type="text" class="form-control" name="challan_no">
        </div>
        <div class="form-group">
          <label>Dyeing Lot</label>
          <input type="text" class="form-control" name="dyeing_lot" value="0">
        </div>
        <div class="form-group">
          <label>Folding</label>
          <input type="text" class="form-control" name="folding" value="0">
        </div>
      </div>
    </div>
  </form>
</div>
<div id="send_to" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sender Name</h4>
      </div>
      <div class="modal-body">
          <form method="post" action="{{url('/')}}/add/sender/name/data" enctype="multipart/form-data">
    @if($errors->any())
    <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
    @endif
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
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
    </div>
  </div>
</div>
<div id="material" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Material Center</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{url('/')}}/add/material/data" enctype="multipart/form-data">
          @if($errors->any())
          <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
          @endif
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <label>Material Center</label>
                <input type="text" class="form-control" name="material">
              </div>
              <div class="form-group">
                <button type="submit" class="txt2">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="quality" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Quality</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{url('/')}}/add/quality/data" enctype="multipart/form-data">
          @if($errors->any())
          <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
          @endif
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <label>Quality</label>
                <input type="text" class="form-control" name="quality">
              </div>
              <div class="form-group">
                <button type="submit" class="txt2">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /page content --> 

@endsection