@extends('admin.admin_layouts')
@section('admin.content')

<div class="container">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row" style="padding:40px;">
      <div class="col-12">
        <h2 class="page-header">
         <i class="fas fa-globe"></i> The KKR SHOP.
          <small class="float-right">Date: {{$order->invoice_date}}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-6 invoice-col">
        <style type="text/css">
          
     address{
 
      font-size:18px;
      padding:30px;

     }







        </style>
       
        <address>
          <b><strong>Order Details</strong></b><br>
          Invoice ID:{{$order->invoiceid}}<br>
          Invoice Date:{{$order->invoice_date}}<br>
          Reference: {{$order->reference}}<br>
          Total Amount:{{$order->TotalAmount}}<br>
        </address>
      </div>
      <!-- /.col -->
      
      <!-- /.col -->
      <div class="col-sm-6 invoice-col">
        <address>
        <b><strong>Customer Details</strong></b><br>
          Customer Name:{{$order->name}}<br>
          Address:{{$order->address}}<br>
          Phone:{{$order->phone}}<br>
          @if($order->paymenttype==0)
          Payment Status:Cash On Delivery
          @elseif($order->paymenttype==1)
          Payment Status:Bkash
          @elseif($order->paymenttype==2)
          Payment Status:Condition
          @else
          Payment Status:Due
          @endif
        </address>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  <br>
  <br>
  <br>
    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Sub Total</th>
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

    <div class="row">
      <!-- accepted payments column -->
      <style type="text/css">
  
  .text-left {
    width: 30%;
    margin-left: 50%;


}

.a{

margin-left: 70%;
margin-bottom:20px;
}





</style>
      <!-- /.col -->
      <div class="col-6 text-left">
        

        <div class="table-responsive">
          <table class="table table-bordered">
                                 <tr>
                                    <td>Sub Total</td>
                                    <td class="text-right">
                                        <span>৳ {{$total}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Delivery Charge</td>
                                    <td class="text-right">
                                        <span>৳ {{$order->shipping_charage}}</span>
                                    </td>
                                </tr>
                                                         
                               
                                
                                <tr>
                                    <td><b>Grand Total</b></td>
                                    <td class="text-right">
                                        <b>৳ {{$total + $order->shipping_charage}}</b>
                                    </td>
                                </tr>
                                <tr>
                                  @if($order->paymenttype == 3)
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
                                      @if($order->paymenttype == 3)

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
                               
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>



















@endsection