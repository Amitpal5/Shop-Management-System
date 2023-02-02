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
          <small class="float-right">Date: {{$purchasedata->order_data}}</small>
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
          <b><strong>Suppiler Information</strong></b><br>
          Name:{{$suppilerdata->name}}<br>
          Phone:{{$suppilerdata->phone}}<br>
          Email:{{$suppilerdata->email}}<br>
          Address:{{$suppilerdata->address}}
        </address>
      </div>
      <!-- /.col -->
      
      <!-- /.col -->
      <div class="col-sm-6 invoice-col">
        <address>
        <b><strong>Invoice Information</strong></b><br>
          Incoice ID:{{$purchasedata->invoice_id}}<br>
          Order Date:{{$purchasedata->order_data}}<br>
          Total Amount:{{$purchasedata->totalamount}}<br>
          @if($purchasedata->paymenttype==0)
          Payment Status:Due
          @else
          Payment Status:Paid
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
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Sell</th>
            <th>Sub Total</th>
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
              <th style="width:50%">Subtotal:</th>
              <td>{{$total}} TK</td>
            </tr>
            <tr>
              <th>Shipping Cost</th>
              <td><span>+ ৳ {{$purchasedata->cost}}</span></td>
            </tr>
            <tr>
                                    <td>Discount</td>
                                    <td class="">
                                        <span>- ৳ {{$purchasedata->discount}}</span>
                                    </td>
                                </tr>
                                @php
                               $subtotal=(int) $total+$purchasedata->cost-$purchasedata->discount;

                                @endphp
                                <tr>
                                    <td><b>Grand Total</b></td>
                                    <td class="">
                                        <b>৳ {{$subtotal}}</b>
                                    </td>
                                </tr>
                               @if($purchasedata->paymenttype == 0)
                                <tr>
                                    <td>Total Paid</td>
                                    <td class="">
                                        <span>৳ 0.00</span>
                                    </td>
                                </tr>
                                                                <tr>
                                    <td>Amount Due</td>
                                    <td class="">
                                        <span>৳ {{$subtotal}}</span>
                                    </td>
                                </tr>

                               @else
                                <tr>
                                    <td>Total Paid</td>
                                    <td class="">
                                        <span>৳ {{$purchasedata->paidamount}}</span>
                                    </td>
                                </tr>
                                    <tr>
                                    <td>Amount Due</td>
                                    <td class="">
                                      @php

                                    $due=(int)$subtotal-(int)$purchasedata->paidamount;
                                      @endphp
                                        <span>৳ {{$due}}</span>
                                    </td>
                                </tr>


                               @endif
                               
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