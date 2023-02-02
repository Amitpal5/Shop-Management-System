@extends('admin.admin_layouts')
@section('admin.content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase</h1>
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
            <h3 class="card-title">New Purchase Order</h3>

            
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          	<form action="{{route('admin.addpurchase')}}" method="post">
          		@csrf
            <div class="row">
            	
            	<div class="col-md-3">
                <div class="form-group">
                	 <label>Order Date</label>
                        <input type="text" class="form-control" value="{{date('d-m-Y')}}" name="odate" disabled>
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Supplier</label>
                  @php

                 $sup=DB::Table('suppilers')->get();
                  @endphp
                  <select class="form-control select2" name="supplier" style="width: 100%;">
                   @foreach($sup as $data)
                    <option value="{{$data->name}}">{{$data->name}}</option>

                    @endforeach
                    
                  </select>
                </div>
                <!-- /.form-group -->
              
                <!-- /.form-group -->
              </div>

              <div class="col-md-3">
                <div class="form-group">
                	 <label>Order Discount</label>
                        <input type="text" class="form-control" name="dis">
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-group">
                	 <label>Shipping Cost</label>
                        <input type="text" class="form-control" name="cost">
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
                      <th><a href="javascript:0" class="btn btn-danger"><i class="fa fa-plus" id="add"></i></a></th>
                    </tr>
                  </thead>
                  <tbody id="pur">
                    <tr class="cartpage">
                      <td><input type="text" name="name[]" class="form-control" required></td>
                      <td><input type="text" name="qty[]" class="form-control" required></td>
                      <td><input type="text" name="price[]" class="form-control" required></td>
                      <td><input type="text" name="discount[]" class="form-control"></td>
                      <td><input type="text" name="sell[]" class="form-control" required></td>
                      
                      <td><a href="javascript:0" class="btn btn-danger"><i class="fa fa-minus" id="remove"></i></a></td>
                    </tr>
                    <br>

                   
                
                    
                   
                   
                  </tbody>
                </table>
      <input type="submit" class="btn btn-primary" value="Save Now">
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

                           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                     <script type="text/javascript">
	
                       $(document).ready(function(){

                      $('#add').on('click',function(){
                            
                      $('tbody').append('<tr class="cartpage"><td><input type="text" name="name[]" class="form-control" required></td><td><input type="text" name="qty[]" class="form-control" required></td><td><input type="text" name="price[]" class="form-control" required></td><td><input type="text" name="discount[]" class="form-control" ></td><td><input type="text" name="sell[]" class="form-control" required></td><td><a href="javascript:0" class="btn btn-danger"><i class="fa fa-minus" id="remove"></i></a></td></tr>');



                      });


                      $(document).on('click','#remove',function(){

                      $(this).closest(".cartpage").remove();
                    


                             })

                       });






                     </script>











@endsection