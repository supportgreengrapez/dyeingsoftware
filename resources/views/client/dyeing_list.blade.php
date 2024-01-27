@extends('client.layout.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <form method="post" action="{{url('/')}}/search/dyeing" enctype="multipart/form-data">
        @if($errors->any())
        <div class="alert alert-danger"> <strong></strong> {{$errors->first()}} </div>
        @endif
        {{csrf_field()}}
        <div class="row">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
              <label>Start Date</label>
              <div class="input-group date datepicker" data-date-format="dd-mm-yyyy">
              <input class="form-control" type="text" name="s_date" autocomplete="off"/>
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
              <label>End Date</label>
              <div class="input-group date datepicker" data-date-format="dd-mm-yyyy">
              <input class="form-control" type="text" name="e_date" autocomplete="off"/>
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
              <label>Sender Name</label>
              <select class="js-example-basic-single form-control" name="s_name">
                <option value="" disable="true" selected="true" >---Select Sender---</option>
                
                    
          @if(count($send_to)>0)
          @foreach($send_to as $results)
                        
                        
                
                <option value="{{$results->sender}}">{{$results->sender}}</option>
                
                
                        
                    @endforeach
                    @endif
              
              </select>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
              <label>Material Center</label>
              <select class="js-example-basic-single form-control" name="material_center">
                <option value="" disable="true" selected="true" >---Select Material Center---</option>
                
                    
          @if(count($material_center)>0)
          @foreach($material_center as $results)
                        
                        
                
                <option value="{{$results->material_center}}">{{$results->material_center}}</option>
                
                
                        
                    @endforeach
                    @endif
              
              </select>
            </div>
          </div>
          
          
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
              <label>Quality</label>
              <select class="js-example-basic-single form-control" name="quality">
                <option value="" disable="true" selected="true" >---Select Quality---</option>
                
                    
          @if(count($quality)>0)
          @foreach($quality as $results)
                        
                        
                
                <option value="{{$results->quality}}">{{$results->quality}}</option>
                
                
                        
                    @endforeach
                    @endif
              
              </select>
            </div>
          </div>
          
          
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
              <label>Status</label>
              <select class="js-example-basic-single form-control" name="status">
                <option value="" disable="true" selected="true" >---Select Status---</option>
                <option value="1">Opened</option>
                <option value="2">Complete</option>
              </select>
            </div>
          </div>
          
          
          <div class="col-md-6 col-sm-12 col-xs-12">
            <!--<div class="form-group">-->
            <!--  <label>Color</label>-->
            <!--  <select class="js-example-basic-single form-control" name="color">-->
            <!--    <option value="" disable="true" selected="true" >---Select Color---</option>-->
            <!--    <option value="Grey">Grey</option>-->
            <!--    <option value="White">White</option>-->
            <!--    <option value="Red">Red</option>-->
            <!--    <option value="Black">Black</option>-->
            <!--    <option value="Grey">Grey</option>-->
            <!--    <option value="Yellow">Yellow</option>-->
            <!--    <option value="Blue">Blue</option>-->
            <!--    <option value="Green">Green</option>-->
            <!--    <option value="Brown">Brown</option>-->
            <!--    <option value="Pink">Pink</option>-->
            <!--    <option value="Orange">Orange</option>-->
            <!--    <option value="Purple">Purple</option>-->
            <!--  </select>-->
            <!--</div>-->
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
                  <input type="text" name="color" class="form-control" autocomplete="off">
                  <div class="input-group-addon"> <i style="background-color: rgb(0, 0, 0);"></i> </div>
                </div>
            </div>
          </div>
          
          
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
              <label>Lot No</label><input type="text" class="form-control" name="lot_no">
            </div>
          </div>
          
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <button type="submit" class="btn btn-default btnn">Search</button>
            </div>
          </div>
        </div>
      </form>
      
      <div class="content_salogan">
        <h2>Issue Dyeing List</h2>
      </div>
      <a class="btn btn-default btnn" href="{{url('/')}}/add/dyeing/form" style="margin-bottom:10px;">Issue Dyeing</a>
     
      <div class="table-responsive oder_form" id="order_form">
        <table id="example1" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%"  style="color:black;">
          <thead>
            <tr>
              <th>LOT NO</th>
              <th>Tahn</th>
              <th>Date</th>
              <th>Send To</th>
              <th>Qauality</th>
              <th>Quantity</th>
              <th>Remaining</th>
              <th>System Lot No</th>
              <th>Color</th>
              <th>Action</th>
              <th>Weight</th>
              <th>Dyeing Lot</th>
              <th>Challan No /GP No</th>
              <th>Folding</th>
              <th>Cut Piece</th>
              <th>Unit</th>
              <th>Party Lot No</th>
              <th>Material</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          
          @if(count($result)>0)
          @foreach($result as $results)
          
          <tr>
            <td>{{$results->pk_id}}</td>
            <td>{{$results->tahn}} </td>
            <td>{{$results->date}}</td>
            <td>{{$results->send_to}}</td>
            <td>{{$results->quality}}</td>
            <td>{{$results->quantity}}</td>
            <td>{{$results->remaining_quantity}}</td>
            <td>{{$results->bl}}</td>
            <td><span style="background-color:{{$results->color}}; width:20px;height:20px;padding:10px;"></span></td>
            
            <td>
                
                @if($results->status==1)
                
                <a href="{{url('/')}}/update/dyeing/{{$results->pk_id}}" class="">Received</a> | 
                
                @php
                $lot_no = db::select("select * from dyeing_received where lot_no = '$results->pk_id'");
                @endphp
                
                @if(count($lot_no)>0)
                
                @else
                <a href="{{url('/')}}/edit/dyeing/form/{{$results->pk_id}}" class="green">Edit</a> |
                
                <a href="{{url('/')}}/delete/dyeing/form/{{$results->pk_id}}" class="red">Delete</a> |
                
                @endif
                <a href="{{url('/')}}/view/dyeing/detail/{{$results->pk_id}}" class="">View</a>
                @else
                
                
                <span class="label label-success">Dyeing Nill</span>  |
                 
                <a href="{{url('/')}}/view/dyeing/detail/{{$results->pk_id}}" class="">View</a>
                @endif
                </td>
                
            <td>{{$results->weight}}</td>
            
            <td>{{$results->dyeing_lot}}</td>
            
            <td>{{$results->challan_no}}</td>
            <td>{{$results->folding}}</td>
            <td>{{$results->cut_piece}}</td>
            <td>{{$results->unit}}</td>
            <td>{{$results->party_lot_no}}</td>
            <td>{{$results->material}}</td>
            
            <td>@if($results->status==1) 
                <!--<span id="{{$results->pk_id}}" onclick="getId(this.id)" class="label label-warning" data-toggle="modal" data-target="#myModal">Open</span>-->
                <a onclick="return confirm('Are you sure, you want to change status?')"  href="{{url('/')}}/dyeing/status/change/{{$results->pk_id}}" class="label label-warning">Move to Complete</a>
                
            <!--<button class="btn label label-warning" type="submit" formaction="{{url('/')}}/move/complete/{{$results->pk_id}}">Move to Complete</button>-->
                @endif
                @if($results->status==2) 
                <span class="label label-success">Complete</span> 
                @endif
                @if($results->status==3) 
                <span class="label label-primary">Return</span> 
                @endif
            </td>
          </tr>
          @endforeach
          @endif
            </tbody>
          
        </table>
      </div>
      
      
      
      
      
      <div class="content_salogan">
        <h2>Received for Dyeing List</h2>
      </div>
      <a class="btn btn-default btnn" href="{{url('/')}}/received/dyeing/form" style="margin-bottom:10px;">Received for Dyeing</a>
      <div class="table-responsive oder_form" id="order_form">
        <table id="example3" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%"  style="color:black;">
          <thead>
            <tr>
              <th>LOT NO</th>
              <th>Tahn</th>
              <th>Date</th>
              <th>Weight</th>
              <th>Qauality</th>
              <th>Quantity</th>
              <th>Unit</th>
              <th>Received From</th>
              <th>Color</th>
              <th>System Lot No</th>
              <th>Action</th>
              <th>Challan No /GP No</th>
              <th>Folding</th>
              <th>Cut Piece</th>
              <th>Dyeing Lot</th>
              <th>Party Lot No</th>
              <th>Material</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          
          @if(count($result2)>0)
          @foreach($result2 as $results)
          <tr>
            <td>{{$results->pk_id}}</td>
            <td>{{$results->tahn}}</td>
            <td>{{$results->date}}</td>
            <td>{{$results->weight}}</td>
            <td>{{$results->quality}}</td>
            <td>{{$results->quantity}}</td>
            <td>{{$results->unit}}</td>
            <td>{{$results->recieved_from}}</td>
            <td>{{$results->color}}</td>
            <td>{{$results->bl}}</td>
            <td>
                @if($results->status == "0")
                <a href="{{url('/')}}/move/to/dyeing/{{$results->pk_id}}" class="">Move to Dyeing</a>
                @else
                <p>already moved</p>
                @endif
            </td>
            
            <td>{{$results->challan_no}}</td>
            <td>{{$results->folding}}</td>
            <td>{{$results->cut_piece}}</td>
            <td>{{$results->dyeing_lot}}</td>
            <td>{{$results->party_lot_no}}</td>
            <td>{{$results->material}}</td>
            
            <td>@if($results->status==1) <span class="label label-warning">Open</span> @endif
                @if($results->status==2) <span class="label label-success">Complete</span> @endif
                @if($results->status==3) <span class="label label-primary">Return</span> @endif
                </td>
          </tr>
          @endforeach
          @endif
            </tbody>
          
        </table>
      </div>
    </div>
  </div>
</div>
@endsection