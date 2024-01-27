@extends('client.layout.app')
@section('content') 
<!-- page content -->

<div class="container">
  <h2 style="color:#f9a848; text-align:center; margin-top:10px;"><strong>Received Dyeing</strong></h2>
  <div class="clearfix"></div>
  
  @if(count($result)>0)
  @foreach($result as $results)
  <form method="post" action="{{url('/')}}/update/dyeing/data/{{$results->quantity}}" enctype="multipart/form-data">
    @if($errors->any())
    <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
    @endif
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
          <label>Lot No</label>
          <input type="text" class="form-control" name="lot_no" value="{{$results->pk_id}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-12 col-xs-12">
      
        <div class="form-group">
          <label>Tahn</label>
          <input type="text" class="form-control" name="tahn" value="{{$results->tahn}}">
        </div>
        <div class="form-group">
          <label>Received Date</label>
          <input type="hidden" class="form-control" name="date" value="{{$results->date}}" readonly>
          <div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy">
            <input class="form-control" type="text" name="received_date" autocomplete="off" required/>
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
        
  @if(count($result)>0)
  @foreach($result as $results)
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
          <label>Party Lot No</label>
          <input type="text" class="form-control" name="party_lot_no" value="{{$results->party_lot_no}}">
        </div>
        <div class="form-group">
          <label>Remarks</label>
          <textarea class="form-control" name="remarks" rows="9">{{$results->remarks}}</textarea>
        </div>
        @endforeach
                            @endif
        <div class="form-group">
          <button type="submit" class="txt2">Submit</button>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
      
  @if(count($result)>0)
  @foreach($result as $results)
        <div class="form-group">
          <label>Send To</label>
          <input type="text" class="form-control" name="send_to" value="{{$results->send_to}}" readonly>
        </div>
        @endforeach
                            @endif
        <div class="form-group">
          <label>Recieved From</label>
          <a href="#" data-toggle="modal" data-target="#send_to"><i class="fa fa-plus"></i></a>
          <!--<select class="js-example-basic-single form-control" name="recieved_from">-->
          <!--  <option value="">---Select Recieved From---</option>-->
            
            
                        
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
        <div class="form-group">
          <label>Material Center</label>
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
        
        
  @if(count($result)>0)
  @foreach($result as $results)
  
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
          <label>System Lot No</label>
          <input type="text" class="form-control" name="bl" value="{{$results->bl}}">
        </div>
        <div class="form-group">
          <label>Challan No/GP No</label>
          <input type="text" class="form-control" name="challan_no" value="{{$results->challan_no}}">
        </div>
        <div class="form-group">
          <label>Dyeing Lot</label>
          <input type="text" class="form-control" name="dyeing_lot" value="{{$results->dyeing_lot}}" readonly>
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
  @endforeach
  @endif 
      </div>
    </div>
  </form></div>
  
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