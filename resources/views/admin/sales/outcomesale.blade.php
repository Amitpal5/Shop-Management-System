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
                 <button class="btn btn-default"><a href="{{url('admin/sales/customerpdf',$order->invoiceid)}}"><i class="fas fa-print"></i>Print</a>
                  </button>
                  
                    
                  
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
                  <h3>Order Details</h3>
                  <address>
                    
                    Invoice ID:{{$order->invoiceid}}<br>
                    Invoice Date:{{$order->invoice_date}}<br>
                    Reference: {{$order->reference}}<br>
                    Total Amount:{{$order->TotalAmount}}<br>
                   
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-6 invoice-col float-right" style="padding: 30px;">
                 <h3>Customer Details</h3>
                  <address>
                    
                    Customer Name:{{$order->name}}<br>

                     @if($order->paymenttype == 0)
      Payment:<span class="badge badge-danger">Cash</span><br>
      @elseif($order->paymenttype  == 1)
      Payment:<span class="badge badge-info">Bkash</span><br>
      @else
      Payment:<span class="badge badge-info">Due</span><br>
      @endif
                    
       @if($order->paymenttype == 1)
			 Bkash Number:{{$order->bkash}}<br>
       @else
       @endif
        Total Paid:{{$order->TotalPaid}}<br>




                    
                    
                  </address>
                </div>
                <!-- /.col -->
               
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-bordered">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach($order_itemsdata as $data)
                    <tr>
                      <td>{{$data->name}}</td>
                      <td>{{$data->qty}}</td>
                      <td>{{$data->selling}}</td>
                      <td>{{$data->discount}}</td>
                      <td>{{$data->Amount}}</td>
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
                                    <td><b>Grand Total</b></td>
                                    <td class="text-right">
                                        <b>৳ {{$total}}</b>
                                    </td>
                                </tr>
                                <tr>
                                  @if($order->paymenttype == 2)
                                    <td>Total Paid</td>
                                    <td class="text-right">
                                        <span>৳ 0</span>
                                    </td>
                                    @else
                                     <td>Total Paid</td>
                                    <td class="text-right">
                                        <span>৳ {{$total}}</span>
                                    </td>
                                    @endif

                                </tr>
                               
                                     <tr>
                                      @if($order->paymenttype == 2)

                                    <td>Amount Due</td>
                                    <td class="text-right">
                                        <span>৳ {{$total}}</span>
                                    </td>
                                    @else
                                    <td>Amount Due</td>
                                    <td class="text-right">
                                        <span>৳ 0</span>
                                    </td>
                                    @endif
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