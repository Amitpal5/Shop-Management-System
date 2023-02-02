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
            <h4>Today Order List</h4>
            <h3 style="color:red">Today Total Delivery {{$total}} TK</h3>
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
                 <th>Invoice ID</th>
                 <th>Payment Method</th>
                 <th>Sub Total</th>
                 
                 
                 <th>Action</th>
                </tr>
              </thead>
       @foreach($order as $data)
        <tbody>
         
        <tr>
        <td>{{$data->invoice_date}}</td>
        <td>{{$data->invoiceid}}</td>
         <td>@if($data->paymenttype	== 0)
             Cash
           @elseif($data->paymenttype == 1)
           Bkash
           @else
           Due
           @endif
         </td>
         <td>{{$data->TotalAmount}}</td>
          
       
                <td>
    <a href="{{url('admin/sales/show-single-invoice-show',$data->invoiceid)}}"><i class="fa fa-edit" style="font-size:25px;"></i></a>
    

        
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