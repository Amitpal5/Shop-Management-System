@extends('admin.admin_layouts')
@section('admin.content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invocie List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invocie List</li>
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
              
             


            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Invocie ID</th>
                  <th>Invocie Date</th>
                  <th>Payment Type</th>
                  <th>Total Amount</th>
                  <th>Total Paid</th>
                   <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($manage as $data)
                <tr>
                  <td>{{$data->invoiceid}}</td>
                  <td>{{$data->invoice_date}}</td>
                  <td>
                  	
                  	@if($data->paymenttype==0)
                  	Cash
                  	@elseif($data->paymenttype==1)
                  	Bkash
                  	@else
                  	Due

                  	@endif



                  </td>
                  <td>{{$data->TotalAmount}}</td>
                  <td>{{$data->TotalPaid}}</td>
                 
                  <td>
                  	
                 <a href="{{url('admin/sales/single-invoice-edit',$data->invoiceid)}}"><i class="fa fa-edit" style="font-size:25px; "></i></a> 
                  <a href="{{url('admin/sales/show-single-invoice-show',$data->invoiceid)}}"><i class="fa fa-eye" style="font-size:25px; "></i></a>

	       <a href="{{route('admin.sales.delete',['id'=>$data->id,'invoiceid' =>$data->invoiceid])}}"><i class="fa fa-trash" style="font-size:25px; color:red;"></i></a>















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






























