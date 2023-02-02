@extends('admin.admin_layouts')
@section('admin.content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Supplier</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Supplier</li>
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
                <h3 class="card-title">Add SupplierS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('admin.addsuppiler')}}" method="post">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="name" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Name">
                     @error('name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Company Name</label>
                    <input type="text" class="form-control" name="company" id="exampleInputPassword1" placeholder="Enter Company Name">
                    @error('company')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                     <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Enter Email">
                    @error('email')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="name" class="form-control" name="phone" id="exampleInputPassword1" placeholder="Enter Phone">
                    @error('phone')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="name" class="form-control" name="Address" id="exampleInputPassword1" placeholder="Enter Address">
                    @error('Address')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                 
                
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
