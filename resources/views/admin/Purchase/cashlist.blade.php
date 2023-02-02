@extends('admin.admin_layouts')
@section('admin.content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchasing With Cash List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchasing With Cash List</li>
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
              <h3 class="card-title">Purchasing List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order Date</th>
                  <th>Supplier</th>
                  <th>Grand Total</th>
                  <th>Paid</th>
                   <th>Payment Status</th>
                   <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($purchase as $data)
                <tr>
                  <td>{{$data->order_data}}</td>
                  <td>{{$data->suppiler}}</td>
                  <td>{{$data->totalamount}}</td>
                  <td>{{$data->paidamount}}</td>
                  <td>
                  	 @if($data->paymenttype	== 0)
			<span class="badge badge-danger">Due</span>
			@else($data->paymenttype	== 1)
			<span class="badge badge-info">Paid</span>
			@endif





                  </td>
                  
                  <td>
                  	
         <a href="{{route('admin.editpurchase',['invoice'=>$data->invoice_id,'suppler' =>$data->suppiler])}}"><i class="fa fa-edit" style="font-size:25px; color:black;"></i></a>
	 <a href="{{route('admin.showpurchase',['invoice'=>$data->invoice_id,'suppler' =>$data->suppiler])}}"><i class="fa fa-eye" style="font-size:25px; color:black;"></i></a>
	  @if($data->paymenttype	== 0)
	 <a data-toggle="modal" data-target="#payment"><i class="fa fa-credit-card" style="font-size:25px; color:black;">
	 </i></a>
	 <div id="payment" class="modal fade">
	          <div class="modal-dialog modal-lg" role="document">
	            <div class="modal-content tx-size-sm">
	              <div class="modal-header pd-x-20">
	                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Make Payment</h6>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span>
	                </button>
	              </div>
	        <form action="{{route('admin.makepayment')}}" method="post">
	        @csrf
	        <input type="hidden" name="invoice_id" value="{{$data->invoice_id}}">
	        <input type="hidden" name="supplier" value="{{$data->suppiler}}">

	              <div class="modal-body pd-10">
	              
	        

	          <div class="row">
	                   
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Pending Amount (৳):</label>
	    <input type="text" name="pamount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->totalamount}}" disabled>
	 


	 </div>
	</div>
	 <div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Amount (৳):</label>
	    <input type="text" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="" required>
	 @error('amount')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	<div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Payment Type:</label>
	    @php
      
      $payment=DB::Table('paymentmethods')->get();

	    @endphp
	      
                  <select class="form-control select2" name="payment" style="width: 100%;" required>
                    <option value="">Select Payment Type</option>
                    @foreach($payment as $data)
                    <option value="{{$data->name}}">{{$data->name}}</option>

                    @endforeach
                    
                  </select>
                  @error('payment')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror   


	 </div>
	</div>
	<div class="col-md-6">
	        <div class="form-group">
	    <label for="exampleInputEmail1">Reference:</label>
	    <input type="text" name="Reference" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="" required>
	 @error('Reference')
	                           <strong class="text-danger">{{$message}}</strong>
	                                  @enderror


	 </div>
	</div>
	

	 

	
	 
	
	</div>


	     </div><!-- modal-body -->
	              <div class="modal-footer">
	               <input type="submit" class="btn btn-primary" value="Payment" />
	        </form>
	                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
	              </div>
	            </div>
	          </div><!-- modal-dialog -->
	 @else

	 @endif
	                    
	 <a href="{{url('admin/Purchase/delete-purchase',$data->id)}}"><i class="fa fa-trash" style="font-size:25px; color:red;"></i></a>
















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