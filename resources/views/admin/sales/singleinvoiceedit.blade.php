@extends('admin.admin_layouts')
@section('admin.content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Invoice Order</h3>

            
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{route('admin.invoice.update')}}" method="post">
              @csrf
            <div class="row">
           

              <div class="col-md-3">
                <div class="form-group">
                   <label>Invoice ID</label>
                        <input type="text" class="form-control" name="invoiceid" value="{{$order->invoiceid}}" disabled>
                        <input type="hidden" name="inid" value="{{$order->invoiceid}}">
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-group">
                   <label>Invoice Date</label>
                        <input type="text" class="form-control" name="date" value="{{$order->invoice_date}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                   <label>Customer Name</label>
                        <input type="text" class="form-control" name="name" value="{{$order->name}}">
                </div>
            </div>
          
            <div class="col-md-3">
                <div class="form-group">
                   <label>Reference</label>
                        <input type="text" class="form-control" name="Reference" value="{{$order->reference}}">
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-group">
                   <label>Payment Type</label>
                  <select class="form-control select" name="type" style="width: 100%;">
                   
                    <option value="0" {{($order->paymenttype == '0')? 'selected' : ''}} >Cash</option>
                    <option value="1" {{($order->paymenttype == '1')? 'selected' : ''}}>bkash</option>
                    <option value="2" {{($order->paymenttype == '2')? 'selected' : ''}}>Due</option>

                   
                    
                  </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                   <label>Total Amount</label>
                        <input type="text" class="form-control" name="TotalAmount" value="{{$order->TotalAmount}}" disabled>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                   <label>Total Paid</label>
                        <input type="text" class="form-control" name="TotalPaid" value="{{$order->TotalPaid}}" disabled>
                </div>
            </div>
           
            <div class="col-md-3">
                <div class="form-group">
                   <label>Bkash</label>
                        <input type="text" class="form-control" name="bkash" value="{{$order->bkash}}">
                </div>
            </div>
            
              <!-- /.col -->
              
                
                 
          
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              
           <div class="col-md-12">
            
           <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Name</th>
                      <th>Quantity</th>
                      <th>Unit Cost</th>
                      <th>Discount</th>
                      <th>Total Amount</th>
                      
                    </tr>
                  </thead>
                  <tbody id="pur">
                   @foreach($order_itemsdata as $data)
                    <tr class="cartpage">
                      <td><input type="text" name="name[]" class="form-control" value="{{$data->name}}">
                        <input type="hidden" name="id[]" value="{{$data->id}}"></td>
                        <input type="hidden" name="buying[]" value="{{$data->buying}}" >
                      <td><input type="text" name="qty[]" class="form-control" value="{{$data->qty}}"></td>
                      <td><input type="text" name="price[]" class="form-control" value="{{$data->selling}}"></td>
                      <td><input type="text" name="discount[]" class="form-control" value="{{$data->discount}}"></td>
                      <td><input type="text" name="amount[]" class="form-control" value="{{$data->Amount}}" disabled></td>
                      
                      
                    </tr>
                    @endforeach

                   
                
                    
                   
                   
                  </tbody>
                </table>
      <input type="submit" class="btn btn-primary" value="Update">
                </form>

           </div>






            </div>

            
        
          </div>
          <!-- /.card-body -->
          
        </div>
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
       
      

       
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>















@endsection