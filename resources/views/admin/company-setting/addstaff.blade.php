@extends('admin.admin_layouts')
@section('admin.content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Staff</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Staff</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Staff</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('admin.addstaff')}}" method="post">
              	@csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="name" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Name">
                     @error('name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                  </div>
                       <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Email">
                     @error('email')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                  </div>
                     <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Father Name</label>
                    <input type="text" class="form-control" name="fname" id="exampleInputEmail1" placeholder="Enter Father Name">
                     @error('fname')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                  </div>
                   <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" name="phone" id="exampleInputEmail1" placeholder="Enter Phone Name">
                     @error('phone')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                  </div>
                   <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" name="Address" id="exampleInputEmail1" placeholder="Enter Address">
                     @error('Address')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                  </div>
                   <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Date of Joining</label>
                    <input type="date" class="form-control" name="djoin" id="exampleInputEmail1" placeholder="Enter Address">
                     @error('djoin')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Department</label>
                    <input type="text" class="form-control" name="department" id="exampleInputEmail1" placeholder="Enter Department">
                     @error('department')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                  </div>


                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Designation</label>
                    <input type="text" class="form-control" name="position" id="exampleInputEmail1" placeholder="Enter Staff Designation">
                     @error('position')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                  </div>
                 
                  
               
                
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
            <!-- /.card -->

            
            

          
           

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
















@endsection