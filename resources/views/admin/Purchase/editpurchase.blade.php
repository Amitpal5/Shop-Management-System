@extends('admin.admin_layouts')
@section('admin.content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Purchase</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Purchase Order</h3>

            
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          	<form action="{{route('admin.upadte.purchase')}}" method="post">
          		@csrf
            <div class="row">
            	
            	<div class="col-md-3">
                <div class="form-group">
                	 <label>Order Date</label>
                        <input type="text" class="form-control" value="{{$purchasedata->order_data}}" name="odate" >
                </div>
                <input type="hidden" name="order_data" value="{{$purchasedata->order_data}}">
                <input type="hidden" name="invoice" value="{{$purchasedata->invoice_id}}">

            </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Supplier</label>
               
                  <select class="form-control select2" name="supplier" style="width: 100%;">
                   
                    <option value="{{$suppilerdata->name}}">{{$suppilerdata->name}}</option>



                   
                    
                  </select>
                </div>
                <!-- /.form-group -->
              
                <!-- /.form-group -->
              </div>

              <div class="col-md-3">
                <div class="form-group">
                	 <label>Order Discount</label>
                        <input type="text" class="form-control" name="dis" value="{{$purchasedata->discount}}">
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-group">
                	 <label>Shipping Cost</label>
                        <input type="text" class="form-control" name="cost" value="{{$purchasedata->cost}}">
                </div>
            </div>
              <!-- /.col -->
              
                
                 
          
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
            	
           <div class="col-md-12">
           	
           <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Name</th>
                      <th>Quantity</th>
                      <th>Unit Cost</th>
                      <th>Discount</th>
                      <th>Selling Price</th>
                      
                    </tr>
                  </thead>
                  <tbody id="pur">
                   @foreach($purchase_itemsdata as $data)
                    <tr class="cartpage">
                      <td><input type="text" name="name[]" class="form-control" value="{{$data->name}}">
                      	<input type="hidden" name="id[]" value="{{$data->id}}"></td>
                      <td><input type="text" name="qty[]" class="form-control" value="{{$data->qty}}"></td>
                      <td><input type="text" name="price[]" class="form-control" value="{{$data->price}}"></td>
                      <td><input type="text" name="discount[]" class="form-control" value="{{$data->discount}}"></td>
                      <td><input type="text" name="sell[]" class="form-control" value="{{$data->sell}}"></td>
                      
                      
                    </tr>
                    @endforeach
                    <br>

                   
                
                    
                   
                   
                  </tbody>
                </table>
      <input type="submit" class="btn btn-primary" value="Update">
                </form>

           </div>






            </div>

            
        
          </div>
          <!-- /.card-body -->
          
        </div>
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
       
      

       
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>















@endsection