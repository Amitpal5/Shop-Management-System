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
            <h4>This Year Expense List</h4>
            <h3 style="color:red">This Year Total Expense {{$total}} TK</h3>
            </div>
        




       
      </div>


</div>
                    </div>


            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                   <th>Date</th>
                 <th>Suppiler Name</th>
                 <th>Amount</th>
                 <th>Action</th>
                </tr>
              </thead>
       
         @foreach($ex as $data)
        <tbody>
         
        <tr>
        <td>{{$data->order_data}}</td>
        <td>{{$data->suppiler}}</td>
         <td>{{$data->totalamount}}</td>
         <td><a href="{{route('admin.showpurchase',['invoice'=>$data->invoice_id,'suppler' =>$data->suppiler])}}"><i class="fa fa-eye" style="font-size:25px; color:black;"></i></a></td>
          
    
        
        
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