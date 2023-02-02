@extends('admin.admin_layouts')
@section('admin.content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Salary List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Salary List</li>
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
              <h3 class="card-title">Salary List</h3>
              <a data-toggle="modal" data-target="#save" class="float-right btn btn-primary" style="font-size:16px; color:white;"><i class="fas fa-plus"></i> Add Salary</a>
                 <div id="save" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New Salary Add</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
          <form action="{{route('admin.addsalary')}}" method="post">
          @csrf

                <div class="modal-body pd-10">
                
          

            <div class="row">
                 <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Date:</label>
      <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
   @error('date')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>
                     
 
  <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Employee Name:</label>
       @php

                 $sup=DB::Table('staff')->get();
                  @endphp
                  <select class="form-control select2" name="employee" style="width: 100%;" required>
                    <option value="">Select Employee</option>
                   @foreach($sup as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>

                    @endforeach
                    
                  </select>
                  @error('employee')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror

     


   </div>
  </div>

  <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Month:</label>
          <select class="form-control select" name="month" style="width: 100%;" required>
                   
                    <option value="">Select Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>

                    
                  </select>
                  @error('month')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror

     
     


   </div>
  </div>
  <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Year:</label>
    <select class="form-control select" name="year" style="width: 100%;" required>
                   
                    <option value="">Select Year</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    

                    
                  </select>
                   @error('year')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>
  </hr>
  
 <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Basic Salary:</label>
      <input type="text" name="basic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
   @error('basic')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>
   <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">DA:</label>
      <input type="text" name="da" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   @error('da')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>
    <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">TA:</label>
      <input type="text" name="ta" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   @error('ta')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>
   <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Sales Incentive:</label>
      <input type="text" name="sales" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
   @error('sales')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>
  <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Bonus:</label>
      <input type="text" name="Bonus" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
   @error('sales')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>
     <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Lates Fine:</label>
      <input type="text" name="lfine" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   @error('sales')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>

    <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Absence:</label>
      <input type="text" name="absence" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   @error('sales')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>
    <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Made of payment:</label>
      <input type="text" name="mop" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
   @error('sales')
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
                  <th>Date</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Month</th>
                   <th>Year</th>
                   <th>Amount</th>
                   <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($salary as $data)
                  <td>{{$data->date}}</td>
                  <td>{{$data->emid}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->month}}</td>
                  <td>{{$data->year}}</td>
                  <td>{{$data->pay}}</td>
                  
                     <td>
                    
         <a data-toggle="modal" data-target="#edit{{$data->id}}"><i class="fa fa-edit" style="font-size:25px; color:black;"></i></a>
          <div id="edit{{$data->id}}" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Salary</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
          <form action="{{route('admin.updatesalary')}}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$data->id}}">
          <input type="hidden" name="emid" value="{{$data->emid}}">

                <div class="modal-body pd-10">
                
          

            <div class="row">
                 <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Date:</label>
      <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->date}}">
   @error('date')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>
                     
 
  <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Employee Name:</label>
      
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->name}}">
     


   </div>
  </div>

  <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Month:</label>
         <input type="text" name="month" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->month}}">

     
     


   </div>
  </div>
  <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Year:</label>
   <input type="text" name="year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->year}}">


   </div>
  </div>
  </hr>
  
 <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Basic Salary:</label>
      <input type="text" name="basic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->amount}}">
   @error('basic')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>
   <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">DA:</label>
      <input type="text" name="DA" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->DA}}">
   @error('da')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>
    <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">TA:</label>
      <input type="text" name="TA" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->TA}}">
   @error('ta')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>
   <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Sales Incentive:</label>
      <input type="text" name="sales" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->SalesIncentive}}" >
   


   </div>
  </div>
  <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Bonus:</label>
      <input type="text" name="Bonus" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->Bonus}}">
  


   </div>
  </div>
     <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Lates Fine:</label>
      <input type="text" name="lfine" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->LateFine}}">
   @error('sales')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>

    <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Absence:</label>
      <input type="text" name="absence" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->Absence}}">
   


   </div>
  </div>
    <div class="col-md-6">
          <div class="form-group">
      <label for="exampleInputEmail1">Made of payment:</label>
      <input type="text" name="mop" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->mop}}">
   @error('sales')
                             <strong class="text-danger">{{$message}}</strong>
                                    @enderror


   </div>
  </div>


  
  
  </div>


       </div><!-- modal-body -->
                <div class="modal-footer">
                 <input type="submit" class="btn btn-primary" value="Update" />
          </form>
                  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->



   <a href="{{route('admin.showsalary',['id'=>$data->id,'emid' =>$data->emid])}}"><i class="fa fa-eye" style="font-size:25px; color:black;"></i></a>
   
   <a href="{{url('admin/salary-delete',$data->id)}}"><i class="fa fa-trash" style="font-size:25px; color:red;"></i></a>

   
   








                  </td>
                 
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