@extends('admin.admin_layouts')
@section('admin.content')
<style type="text/css">
	


</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sales</li>
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
            <h3 class="card-title">New Sales</h3>

            
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          	<form action="{{route('admin.sales.invoice')}}" method="post">
          		@csrf
            <div class="row">
            	
            	<div class="col-md-4">
                <div class="form-group">
                	 <label>Invoice</label>
                   @php

                   $in=rand(1,1000);
                   @endphp
                        <input type="text" class="form-control" value={{$in}}  name="invoice">
                </div>
            </div>
              

              <div class="col-md-4">
                <div class="form-group">
                	 <label>Invoice date</label>
                        <input type="text" class="form-control" value="{{date('d-m-Y')}}" name="invoicedate">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label>Customer Name</label>
                 <input type="text" class="form-control"  name="customer" required>
                </div>
                <!-- /.form-group -->
              
                <!-- /.form-group -->
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Customer Address</label>
                 <input type="text" class="form-control"  name="address">
                </div>
                <!-- /.form-group -->
              
                <!-- /.form-group -->
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Customer Phone</label>
                 <input type="text" class="form-control"  name="phone">
                </div>
                <!-- /.form-group -->
              
                <!-- /.form-group -->
              </div>
              <div class="col-md-4">
                <div class="form-group">
                	 <label>Payment Type</label>
                	 <select class="form-control select" name="payment" style="width: 100%;" required>
                   
                    <option>Select Payment Type</option>
                    <option value="0">Cash</option>
                    <option value="1">Bkash</option>
                    <option value="2">Due</option>

                    
                    
                  </select>
                        
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                	 <label>Reference</label>
                        <input type="text" class="form-control"  name="Reference" required>
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                   <label>Bkash Number</label>
                        <input type="text" class="form-control"  name="number">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label>Delivery Charge</label>
                 <input type="text" class="form-control"  name="charge">
                </div>
                <!-- /.form-group -->
              
                <!-- /.form-group -->
              </div>
              <!-- /.col -->

               <div class="col-md-12">
                  <div class="form-group">
                    <label for="lname" class="text-danger"> Product Name <span style="color: red"> *</span></label>
                    <div align="center">
                      <input type="text" name="search" id="tags" accesskey="A" class="form-control" placeholder="Enter Product Name / Product Code" autofocus="autofocus" autocomplete="off"/>
                    </div>
                    <div id="productlist"></div>

                  </div>

                  <div style="overflow-x:auto;">
                   
                   <table class="table tbl table-bordered table-striped table-hover" id="receipt_bill">
                     <thead>
                      <tr>
                       <th class="col-md-3"><center>Item</center></th>
                       <th class="wp-100"><center>Quantity</center></th>
                       <th class="col-md-3"><center>Price</center></th>
                       <th class="wp-100"><center>Discount</center></th>
                       <th class="col-md-3"><center>Line Total</center></th>
                       <th><center>Action</center></th>
                     </tr>
                   </thead>

                   <tbody id="new">


                   </tbody>
                    <tfoot class="tfoot active">
                                        <tr>
                                            <th>Total</th>
                                          
                                            
                                            <th class="text-center"><span id="total_cart_item">{{Cart::count()}}</span></th>
                                            <th></th>
                                           
                                            <th class="text-center" id="total-discount">0.00</th>
                                            
                                            <th class="text-center"><span id="total">{{Cart::subtotal()}}</span></th>
                                            <th class="text-center"></th>
                                            <input type="hidden" name="product_total" id="product_total" value="0">
                                            <input type="hidden" name="tax_total" id="tax_total" value="0">
                                        </tr>
                                    </tfoot>
                  
                  </table>

                </div>   
                
                 <input type="submit" class="btn btn-primary" name="" value="Submit">
               </form>

         

          
              <!-- /.col -->
            </div>
            <!-- /.row -->

           
          <!-- /.card-body -->
        </div>
         <button class="btn btn-danger reset mt-3" >Reset</button>
        
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
       
      
                   

              </div>
       
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

                      <script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script> $(document).ready(function(){

   $('#tags').keyup(function(){

    var a=$(this).val();
    if(a != ''){

      var _token=$('input[name="_token"]').val();
      $.ajax({

        url:"{{ route('autocomplete.fetch') }}",
        method:"POST",
        data:{a:a, _token:_token},
        success:function(data){

         $('#productlist').fadeIn();
         $('#productlist').html(data);

       }

     })

    }

  });

   $(document).on('click','li',function(){

     $('#productlist').fadeOut();


   })





 });

$(document).on('click','.addcart',function(){
   
    var id=$(this).data('id');
if(id){
$.ajax({
url:"{{url('add/to/product')}}/"+id,
type:"GET",
dataType:"json",
 success:function(data) {
   
  if(data.status){
  
  $('span#total_cart_item').text(data.counts);
    $('span#total').text(data.amounts);
    $('span#total-qty').text(data.qty);


   // $("#receipt_bill").load(location.href + " #receipt_bill");
  $("#new").empty();
   fetchdata();
  
  }

},
});
}
});

fetchdata();

     function fetchdata(){

     $.ajax({
url:"{{url('/fetch_data')}}",
type:"GET",
dataType:"json",
 success:function(response) {
$.each(response.carts,function(key,item){

$('tbody').append('<tr class="cartpage"><td class="col-md-3"><input type="hidden" class="qty" name="bprice[]" value="'+item.id+'"><input type="hidden" name="name[]" class="qty"  value="'+item.name+'">'+ item.name + '</td><td><input type="hidden" class="qty" id="id" value="'+item.rowId+'"><input type="number" name="qty[]" min="1" class="wp-100 form-control qty" id="qty" value="'+item.qty+'"></td><td class="col-md-2"><input type="hidden" name="price[]" class="qty"  value="'+item.price+'">' + item.price + '</td><td><input type="hidden" name="proid[]" id="pro_id" value="'+item.size+'"><input type="text" name="discount[]" class="wp-100 form-control" id="discount"></td><td class="col-md-1"><input type="hidden" name="total[]" class="qty" id="id" value="'+item.price * item.qty+'">'+item.price * item.qty+'</td></strong><td class="col-md-1"><a href="javascript:void(0)" class="btn btn-danger DeleteRow"><i class="fa fa-trash"></i></a></td></tr>');


});




 



},
});



     }


    $(document).on('click','.reset',function(){
   

$.ajax({
url:"{{url('add/to/reset')}}/",
type:"GET",
dataType:"json",
 success:function(data) {
   
  if(data.status){

    $('span#total').text(data.tks);
     $('span#total_cart_item').text(data.counts);
      $("#new").empty();
   fetchdata();


  }

},
});

});

      $(document).on('click','.DeleteRow',function(){


    var id=$(this).closest(".cartpage").find("#id").val();
    
    if(id){
$.ajax({
url:"{{url('product/delete')}}/"+id,
type:"GET",
dataType:"json",
 success:function(data) {
   
  if(data.status){
  
 $('span#total').text(data.amounts);
$('span#total_cart_item').text(data.counts);
  
  $("#new").empty();
   fetchdata();
  
  }

},
});
}



  });


        $(document).on('change','#qty',function(){


    var id=$(this).closest(".cartpage").find("#id").val();
    var qty=$(this).closest(".cartpage").find("#qty").val();

    
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

 $.ajax({
url:"{{url('product/update/sales')}}",
type:"POST",
data:{

  id:id,
  qty:qty,
},
dataType:"json",
 success:function(data) {
   
  if(data.status){

      $('span#total').text(data.amount);
$('span#total_cart_item').text(data.counts);
      $("#new").empty();
   fetchdata();

  }

},
});



  });

        $(document).on('keyup','#discount',function(){



          var id=$(this).closest(".cartpage").find("#id").val();

    var discount=$(this).closest(".cartpage").find("#discount").val();


    
 });


</script>











@endsection