@extends('admin.admin_layouts')
@section('admin.content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company Information</li>
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
                <h3 class="card-title">Company Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('admin.companyinformation.update')}}" method="post" enctype="multipart/form-data">
              	@csrf
              	<input type="hidden" name="id" value="{{$company->id}}">
              	<input type="hidden" name="old" value="{{$company->logo}}">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="name" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Name" value="{{$company->name}}">
                    
                  </div>
                  </div>
                       <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="address" class="form-control" name="address" id="exampleInputEmail1" placeholder="Enter Email" value="{{$company->address}}">
                     @error('email')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                  </div>
                  
                   <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" name="phone" id="exampleInputEmail1" placeholder="Enter Phone Name" value="{{$company->phone}}">
                     @error('phone')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                  </div>
                   <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Address" value="{{$company->email}}">
                     @error('Address')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
                  </div>
                  </div>
                   

                


                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Old logo</label>
                    <img src="{{asset($company->logo)}}" width="100px" height="100px">
                     
                  </div>
                  </div>
                  <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">New Image<span class="tx-danger">*</span></label>
                @error('image_1')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
             <label class="custom-file">
           <input type="file" id="file" class="custom-file-input" name="image" onchange="readURL(this);">
          <label class="custom-file-label" for="exampleInputFile">Choose file</label>

         <span class="custom-file-control"></span>
     <img src="#" id="one">
            </label>
   




			   </div>
              </div><!-- col-4 -->
                  
               
                
                  
                </div>
            </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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