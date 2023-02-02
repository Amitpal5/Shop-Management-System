@extends('admin.admin_layouts')
@section('admin.content')

<style type="text/css">
	
  .invoice-summary-right {
    width: 30%;
    margin-left: 70%;


}

.a{

margin-left: 70%;
margin-bottom:20px;
}





</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <div class="row no-print">
                <div class="col-12 mb-4">
                  <button type="button" id="print" class="btn btn-default"><i class="fas fa-print"></i>Print
                  </button>
                  <a data-toggle="#" class="btn btn-success" style="color:white;" data-target="#payment"><i class="far fa-credit-card"></i> Paid Payment</a>
                    
                  
                  <button type="button" class="btn btn-primary" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <h2 class="a">KKR ENTERPRISE</h2>
              <div class="row">
                
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-6 invoice-col" style="padding: 30px;">
                  <h3>Supplier Details</h3>
                  <address>
                    
                    Name:{{$suppilerdata->name}}<br>
                    Email:{{$suppilerdata->email}}<br>
                    Phone: {{$suppilerdata->phone}}<br>
                    Address: {{$suppilerdata->address}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-6 invoice-col float-right" style="padding: 30px;">
                 <h3>Purchase Order</h3>
                  <address>
                    
                    Order ID:{{$purchasedata->invoice_id}}<br>
                    Order Date:{{$purchasedata->order_data}}<br>
                    @if($purchasedata->paymenttype	== 0)
			Payment:<span class="badge badge-danger">Due</span>
			@else($purchasedata->paymenttype	== 1)
			Payment:<span class="badge badge-info">Paid</span>
			@endif
			

                    
                    
                  </address>
                </div>
                <!-- /.col -->
               
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th>Sell</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach($purchase_itemsdata as $data)
                    <tr>
                      <td>{{$data->name}}</td>
                      <td>{{$data->qty}}</td>
                      <td>{{$data->price}}</td>
                      <td>{{$data->discount}}</td>
                      <td>{{$data->sell}}</td>
                      <td>{{$data->total}}</td>
                    </tr>

                    
                    @endforeach
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

             <div class="invoice-summary-right">
                        <table class="table table-bordered " id="invoice-summary-table">
                            <tbody>
                                <tr>
                                    <td>Sub Total</td>
                                    <td class="text-right">
                                        <span>৳ {{$total}}</span>
                                    </td>
                                </tr>
                                                                <tr>
                                    <td>Shipping Cost</td>
                                    <td class="text-right">
                                        <span>+ ৳ {{$purchasedata->cost}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td class="text-right">
                                        <span>- ৳ {{$purchasedata->discount}}</span>
                                    </td>
                                </tr>
                                @php
                               $subtotal=(int) $total+$purchasedata->cost-$purchasedata->discount;

                                @endphp
                                <tr>
                                    <td><b>Grand Total</b></td>
                                    <td class="text-right">
                                        <b>৳ {{$subtotal}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Paid</td>
                                    <td class="text-right">
                                        <span>৳ {{$purchasedata->paidamount}}</span>
                                    </td>
                                </tr>
                                                                <tr>
                                    <td>Amount Due</td>
                                    <td class="text-right">
                                      @php

                                    $due=(int)$subtotal-(int)$purchasedata->paidamount;
                                      @endphp
                                        <span>৳ {{$due}}</span>
                                    </td>
                                </tr>
                                 
                                                            </tbody>
                        </table>
                    </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
           
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
	
 $('#print').on("click", function () {
      $('.invoice').printThis();
    });




</script>















@endsection