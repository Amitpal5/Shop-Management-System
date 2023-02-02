@extends('admin.admin_layouts')
@section('admin.content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manage Product</h3>
              <a data-toggle="modal" data-target="#save" class="float-right btn btn-primary" style="font-size:16px; color:white;"><i class="fas fa-plus"></i> Add new</a>
                 <div id="save" class="modal fade">
	          <div class="modal-dialog modal-lg" role="document">
	            <div class="modal-content tx-size-sm">
	              <div class="modal-header pd-x-20">
	                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New Added Product</h6>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span>
	                </button>
	              </div>
	        <form action="{{route('admin.add.products')}}" method="post">
	        @csrf

	              <div class="modal-body pd-10">
	              
	        

	          <div class="row">
	                   
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Product Name:</label>
	    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
	 @error('name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	<div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Suppiler:</label>
	     @php

                 $sup=DB::Table('suppilers')->get();
                  @endphp
                  <select class="form-control select2" name="supplier" style="width: 100%;">
                   @foreach($sup as $data)
                    <option value="{{$data->name}}">{{$data->name}}</option>

                    @endforeach
                    
                  </select>
	   


	 </div>
	</div>
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Product Cost:</label>
	    <input type="text" name="cost" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
	 @error('cost')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	<div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Product Price:</label>
	    <input type="text" name="sell" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
	 @error('sell')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	<div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Product qty:</label>
	    <input type="text" name="qty" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
	 @error('qty')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	
	
	</div>


	     </div><!-- modal-body -->
	              <div class="modal-footer">
	               <input type="submit" class="btn btn-primary" value="Save" />
	        </form>
	                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
	              </div>
	            </div>
	          </div><!-- modal-dialog -->
	        </div><!-- modal -->



            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Product Cost</th>
                  <th>Product Price</th>
                  <th>Available Stock</th>
                   <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($product as $data)
                <tr>
                  <td>{{$data->name}}</td>
                  <td>{{$data->price}}</td>
                  <td>{{$data->sell}}</td>
                  <td>{{$data->qty}}</td>
                 
                  <td>
                  	
                    <a data-toggle="modal" data-target="#edit{{$data->id}}"><i class="fa fa-edit" style="font-size:25px;"></i></a>
	    <div id="edit{{$data->id}}" class="modal fade">
	          <div class="modal-dialog modal-lg" role="document">
	            <div class="modal-content tx-size-sm">
	              <div class="modal-header pd-x-20">
	                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Product Information</h6>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span>
	                </button>
	              </div>
	        <form action="{{route('admin.add.updateproduct')}}" method="post">
	        @csrf

	              <div class="modal-body pd-10">
	              
	        <input type="hidden" name="id" value="{{$data->id}}" >
	        <input type="hidden" name="qty" value="{{$data->qty}}">

	          <div class="row">
	                   
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Name:</label>
	    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->name}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	<div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Suppiler:</label>
	    <input type="text" name="sup" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->suppiler}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Product Cost:</label>
	    <input type="text" name="cost" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->price}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	<div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Product Price:</label>
	    <input type="text" name="sell" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->sell}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	
	
	
	 

	
	 
	
	</div>


	     </div><!-- modal-body -->
	              <div class="modal-footer">
	               <input type="submit" class="btn btn-primary" value="UPDATE" />
	        </form>
	                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
	              </div>
	            </div>
	          </div><!-- modal-dialog -->
	        </div><!-- modal -->

	         <a  data-toggle="modal" data-target="#show{{$data->id}}"><i class="fa fa-eye" style="font-size:25px; color:black;"></i></a>
	         <div id="show{{$data->id}}" class="modal fade">
	          <div class="modal-dialog modal-lg" role="document">
	            <div class="modal-content tx-size-sm">
	              <div class="modal-header pd-x-20">
	                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Show Product Information</h6>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span>
	                </button>
	              </div>
         <table id="example1" class="table table-bordered">
               
                <tbody>
                	
                <tr>
                  <td>Product Name</td>
                  <td>{{$data->name}}</td>
                  
                 
                  </tr>
                  <tr>
                  <td>Suppiler Name</td>
                  <td>{{$data->suppiler}}</td>
                  
                 
                  </tr>
                  <tr>
                  <td>Product Cost</td>
                  <td>{{$data->price}}</td>
                  
                 
                  </tr>
                  <tr>
                  <td>Product Price</td>
                  <td>{{$data->sell}}</td>
                  
                 
                  </tr>
                  <tr>
                  <td>Stock</td>
                  <td>{{$data->qty}}</td>
                  
                 
                  </tr>
              </tbody>
          </table>

	       
	              </div>
	            </div>
	          </div><!-- modal-dialog -->
	        </div><!-- modal -->

	                    
	 <a href="{{url('admin/product/delete-product',$data->id)}}"><i class="fa fa-trash" style="font-size:25px; color:red;"></i></a>















                  </td>
                  
                </tr>
                @endforeach
               
               
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
















@endsection