@extends('admin.admin_layouts')
@section('admin.content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Staff</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Staff</li>
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
              <h3 class="card-title">Manage Staff</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                	<th>Employee ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Father Name</th>
                  <th>Address</th>
                  <th>Phone</th>
                   <th>Position</th>
                   <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($staff as $data)
                <tr>
                	<td>{{$data->em_id}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->father_name}}</td>
                  <td>{{$data->address}}</td>
                  <td>{{$data->phone}}</td>
                  <td>{{$data->position}}</td>
                  <td>
                  	
                    <a data-toggle="modal" data-target="#edit{{$data->id}}"><i class="fa fa-edit" style="font-size:25px;"></i></a>
	    <div id="edit{{$data->id}}" class="modal fade">
	          <div class="modal-dialog modal-lg" role="document">
	            <div class="modal-content tx-size-sm">
	              <div class="modal-header pd-x-20">
	                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Catagory Information</h6>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span>
	                </button>
	              </div>
	        <form action="{{route('admin.updatestaff')}}" method="post">
	        @csrf

	              <div class="modal-body pd-10">
	              
	        <input type="hidden" name="id" value="{{$data->id}}" >
	        <input type="hidden" name="eid" value="{{$data->em_id}}" >

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
	    <label for="exampleInputEmail1">Email:</label>
	    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->email}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	<div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Father Name:</label>
	    <input type="text" name="father_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->father_name}}">
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
	<div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Date of Joining:</label>
	    <input type="date" name="djoin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->Dateofjoining}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	<div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Department:</label>
	    <input type="text" name="Department" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->Department}}">
	 @error('class_name')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	<div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Designation:</label>
	    <input type="text" name="position" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->position}}">
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
	                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Show Staff Information</h6>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span>
	                </button>
	              </div>
         <table id="example1" class="table table-bordered">
               
                <tbody>
                	<tr>
                  <td>Employee ID</td>
                  <td>{{$data->em_id}}</td>
                  
                 
                  </tr>
                	
                <tr>
                  <td>Name</td>
                  <td>{{$data->name}}</td>
                  
                 
                  </tr>
                  <tr>
                  <td>Father Name</td>
                  <td>{{$data->father_name}}</td>
                  
                 
                  </tr>
                  <tr>
                  <td>Email</td>
                  <td>{{$data->email}}</td>
                  
                 
                  </tr>
                  <tr>
                  <td>Phone</td>
                  <td>{{$data->phone}}</td>
                  
                 
                  </tr>
                  <tr>
                  <td>Address</td>
                  <td>{{$data->address}}</td>
                  
                 
                  </tr>
                  <tr>
                  <td>Date Of Joining</td>
                  <td>{{$data->Dateofjoining}}</td>
                  
                 
                  </tr>
                  <tr>
                  <td>Department</td>
                  <td>{{$data->Department}}</td>
                  
                 
                  </tr>
                  <tr>
                  <td>Designation</td>
                  <td>{{$data->position}}</td>
                  
                 
                  </tr>
              </tbody>
          </table>

	       
	              </div>
	            </div>
	          </div><!-- modal-dialog -->
	        </div><!-- modal -->

	                    
	 <a href="{{url('admin/staff-delete',$data->id)}}"><i class="fa fa-trash" style="font-size:25px; color:red;"></i></a>















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