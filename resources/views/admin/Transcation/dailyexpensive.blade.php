@extends('admin.admin_layouts')
@section('admin.content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content mt-4">
      <div class="row">
        <div class="col-12">
          
            <!-- /.card-header -->
            
          <!-- /.card -->

          <div class="card">
            <div class="container">

            <div class="row mb-10">
          <div class="col-sm-8 p-3">
            <h4>Daily Expense</h4>
            </div>
          <div class="col-sm-4 p-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                  Add a Daily Expense
                </button>
          </div>




       <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add a Daily Expense</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="{{route('admin.add.daily.expense')}}" method="post" >
                @csrf
                <div class="card-body">
                  <div class="row">
                  
              
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Date</label>
                    <input type="date" class="form-control" name="date" id="exampleInputPassword1" placeholder="Enter Payment Method Name">
                    @error('date')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>

               
                 
                  <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Expense Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputPassword1" placeholder="Enter Expense Name">
                    @error('name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>

              <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Amount</label>
                    <input type="text" class="form-control" name="amount" id="exampleInputPassword1" placeholder="Enter Amount">
                    @error('amount')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>
                  
                  
              </div>
                 
                </div>
                <!-- /.card-body -->

                
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


</div>
                    </div>


            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Expensive Name</th>
                  <th>Amount</th>
                  
                  
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                  
                  @foreach($expensive as $data)


                <tr>
                  <td>{{$data->date}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->amount}}</td>
                  
                  <td>
                    <a data-toggle="modal" data-target="#edit{{$data->id}}"><i class="fa fa-edit" style="font-size:25px;"></i></a>
    <div id="edit{{$data->id}}" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Daily Expense Information</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        <form action="{{route('admin.update.expense')}}" method="post" enctype="multipart/form-data">
        @csrf

              <div class="modal-body pd-10">
              
        <input type="hidden" name="id" value="{{$data->id}}" >

          <div class="row">
                   
 <div class="col-md-6">
        <div class="form-group">
    <label for="exampleInputEmail1">Date:</label>
    <input type="text" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->date}}">
 @error('class_name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror


 </div>
</div>
 <div class="col-md-6">
        <div class="form-group">
    <label for="exampleInputEmail1">Expense Name:</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->name}}">
 @error('class_name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror


 </div>
</div>
<div class="col-md-6">
        <div class="form-group">
    <label for="exampleInputEmail1">Amount:</label>
    <input type="text" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->amount}}">
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
                    
 <a href="{{url('admin/delete-expense',$data->id)}}"><i class="fa fa-trash" style="font-size:25px; color:red;"></i></a>


                  </td>
                </tr>
               @endforeach
                
                </tbody>
                <tfoot>
                
                </tfoot>
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