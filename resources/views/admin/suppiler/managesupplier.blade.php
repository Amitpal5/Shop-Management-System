@extends('admin.admin_layouts')
@section('admin.content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Supplier</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Supplier</li>
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
              <h3 class="card-title">Manage Supplier</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Company</th>
                  <th>Email</th>
                  <th>Phone</th>
                   <th>Address</th>
                   <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($suppiler as $data)
                <tr>
                  <td>{{$data->name}}</td>
                  <td>{{$data->company}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->phone}}</td>
                  <td>{{$data->address}}</td>
                  
                  <td>
                  	
                    <a data-toggle="modal" data-target="#edit{{$data->id}}"><i class="fa fa-edit" style="font-size:25px;"></i></a>
	    <div id="edit{{$data->id}}" class="modal fade">
	          <div class="modal-dialog modal-lg" role="document">
	            <div class="modal-content tx-size-sm">
	              <div class="modal-header pd-x-20">
	                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Suppiler Information</h6>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span>
	                </button>
	              </div>
	        <form action="{{route('admin.updatesupplier')}}" method="post">
	        @csrf

	              <div class="modal-body pd-10">
	              
	        <input type="hidden" name="id" value="{{$data->id}}" >

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
	    <label for="exampleInputEmail1">Company:</label>
	    <input type="text" name="company" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->company}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	<div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Email:</label>
	    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->email}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	<div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Phone:</label>
	    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->phone}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	<div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Address:</label>
	    <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->address}}">
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
	                    
	 <a href="{{url('admin/suppiler/delete-supplier',$data->id)}}"><i class="fa fa-trash" style="font-size:25px; color:red;"></i></a>















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