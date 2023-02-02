<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cart;
use App\Models\Admin\orders;
use App\Models\Admin\profit_details;


class SalesController extends Controller
{
    public function sales(){
   return view('admin.sales.addsales');

   }


 public function fetch(Request $request){

 if($request->get('a'))
 {
 	$a=$request->get('a');

 	$data=DB::table('products')->where('name' ,'LIKE','%'.$a.'%')->get();
 	
 		$output ='<ul class="dropdown-menu" style="display:block; position:relative">';
 	foreach($data as $row){
     $output .='<li class="item"><a href="javascript:void(0)" data-id="'.$row->id.'" class="addcart">'.$row->name.'<input type="hidden" name="id" class="id" value="'.$row->id.'"><input type="hidden" name="name" class="name" value="'.$row->name.'"><input type="hidden" name="qty" class="qty" value="1"><input type="hidden" name="name" class="price" value="'.$row->price.'"></a></li>';

 	}
 	$output .='</ul>';
 	return \Response::json($output);
 }

 }


 public function addcart($id){

  $product=DB::table('products')->where('id',$id)->first();
  $check=$product->qty;
   if(!$check==0){
 $data =array();
     
     $data['id'] =$product->price;
     $data['name'] =$product->name;
     $data['qty'] =1;
     $data['price'] =$product->sell;
     $data['option']=$product->price;
     $data['weight'] =1;
     
     
     Cart::add($data);
     
     $items=Cart::content();
     $count=Cart::count();
     $amount=Cart::subtotal();

     
     return \Response::json(['status'=>true,'counts'=>$count,'item'=>$items,'amounts'=>$amount,'msg' => 'Successfully added to cart']);

    

   }

   else{

 
       return \Response::json(['status'=>true,'msg' => 'Product are not available']);



   }

}

    public function fetchdata(){

   $cart=Cart::content();

	   $count=Cart::count();
	   $amount=Cart::subtotal();

   return \Response::json(['status'=>true,'carts'=>$cart,'counts'=>$count,'amounts'=>$amount]);




   }


   public function reset(){

		Cart::destroy();
		$tk=cart::subtotal();
		$count=cart::count();

return \Response::json(['status'=>true,'tks'=>$tk,'counts'=>$count]);



}

   public function deletecart($id){

  Cart::remove($id);
   $amount=cart::subtotal();
   $count=cart::count();

    return \Response::json(['status'=>true,'counts'=>$count,'amounts'=>$amount,]);



   }

      public function updatecart(Request $request){


   $rowId=$request->input('id');
   


      $qty=$request->input('qty');

    $update=Cart::update($rowId, $qty);
       $amounts=cart::subtotal();
       $count=cart::count();


    return \Response::json(['status'=>true,'update'=>$update,'counts'=>$count,'amount'=>$amounts]);


   }

  
 public function addinvocie(Request $request){


   $invoice=$request->invoice;
   $customer=$request->customer;
   $invoicedate=$request->invoicedate;
   $paymenttype=$request->payment;
   $Reference=$request->Reference;
   $name=$request->name;
   $qty=$request->qty;
   $price=$request->price;
   $buying=$request->buy;
   $discount=$request->discount;
   $customer=$request->customer;
   $bprice=$request->bprice;
   $bkash=$request->number;
   $total=$request->total;
$total=0;


   for($i=0; $i< count($name); $i++){

     $datasave=[
       'invoiceid' =>$invoice,
       'name' =>$name[$i],
       'qty' =>$qty[$i],
       'discount' =>$discount[$i],
       'selling' =>$price[$i],
        'buying'=>$request->bprice[$i],
       'Amount'=>$price[$i]-$discount[$i],

     ];






     DB::Table('products')->where('name',$request->name[$i])->decrement('qty',$request->qty[$i]);
     

     $total+=$price[$i]-$discount[$i];

     
  DB::Table('order_details')->insert($datasave);



    }

  
    for($j=0;$j<count($name); $j++){

     
     

       $day=date('d');
       $month=date('m');
       $year=date('Y');
       
 

     $data=[

      'day'=> $day,
      'month' =>$month,
       'year' =>$year,
       'invoiceid' =>$invoice,
       'name'=>$name[$j],
        'discount'=>$discount[$j],
       'qty'=>$request->qty[$j],
       'buying' =>$request->bprice[$j],
       'selling' =>$request->price[$j],
       'Amount' => $request->price[$j]-$request->bprice[$j]-$discount[$j],
       'profit' =>$request->price[$j]-$request->bprice[$j]-$discount[$j] * $request->qty[$j],
       


     ];

      DB::Table('profit_details')->insert($data);


    }





  $data=array();
  $data['invoiceid']=$invoice;
  $data['invoice_date']=$invoicedate;
  $data['reference']=$Reference;
  $data['TotalAmount']=$total;
  $data['paymenttype']=$paymenttype;
  $data['name']=$customer;
  $data['bkash']=$bkash;
  $data['day']=date('d');
  $data['month']=date('m');
  $data['year']=date('Y');
  $data['address']=$request->address;
  $data['phone']=$request->phone;
  $data['shipping_charage']=$request->charge;

  if($paymenttype==2){
  
  $data['TotalPaid']=0;


  }  

  else{

    $data['TotalPaid']=$total;
  }

  DB::Table('orders')->insert($data);

Cart::destroy();
$order=DB::Table('orders')->where('invoiceid',$invoice)->first();
  $order_itemsdata=DB::Table('order_details')->where('invoiceid',$order->invoiceid)->get();
  $total=DB::Table('order_details')->where('invoiceid',$order->invoiceid)->sum('Amount');

  return view('admin.sales.outcomesale',compact('order','order_itemsdata','total'));





 }


 public function manageinvocie(){

  $manage=DB::Table('orders')->get();

  return view('admin.sales.managesales',compact('manage'));


 }


 public function singleinvoiceshow($id){

 $order=DB::Table('orders')->where('invoiceid',$id)->first();
  $order_itemsdata=DB::Table('order_details')->where('invoiceid',$order->invoiceid)->get();
  $total=DB::Table('order_details')->where('invoiceid',$order->invoiceid)->sum('Amount');

  return view('admin.sales.singleinviceshow',compact('order','order_itemsdata','total'));

  




 }



 public function editinvoicelist($id){

  $order=DB::Table('orders')->where('invoiceid',$id)->first();
  $order_itemsdata=DB::Table('order_details')->where('invoiceid',$id)->get();


  return view('admin.sales.singleinvoiceedit',compact('order','order_itemsdata'));
  


 }



 public function updateinvoicelist(Request $request){

  $invoiceid=$request->inid;
 $invociedate=$request->date;
 $cname=$request->name;
 $total=0;
 $reference=$request->Reference;
 $paymenttype=$request->type;
 $bkash=$request->bkash;
 $name=$request->name;
 $qty=$request->qty;
 $price=$request->price;
 $discount=$request->discount;
 $id=$request->id;

 for($i=0; $i<count($id); $i++){

 $id=$request->id;

     
  

   $b=DB::Table('order_details')->where('id',$id[$i])->update([

        'invoiceid' =>$invoiceid,
       'name' =>$name[$i],
       'qty' =>$qty[$i],
       'selling' =>$price[$i],
       'discount' =>$discount[$i],
       'Amount'=>$qty[$i] * $price[$i]-$discount[$i],

     ]);
    

    $total+=$qty[$i]*$price[$i]-$discount[$i];

 




 }


 $purs=DB::table('orders')->where('invoiceid',$invoiceid)->update(['name'=>$cname,'reference'=>$reference,'paymenttype' =>$paymenttype,'TotalAmount'=>$total,'TotalPaid'=>$total,'bkash'=>$bkash]);

    
    return redirect()->route('admin.invocie.manage')->with('message','Invocie Data Update Successfully');


 }


 public function deletesales($id,$invoiceid){


  $deletesales=orders::find($id);
  $deletesales->delete();

  $deleteor=DB::Table('profit_details')->where('invoiceid',$invoiceid)->first();
  $del=$deleteor->id;
  $deleteprofit=profit_details::find($del);
  $deleteprofit->delete();

  return redirect()->route('admin.invocie.manage')->with('error','Invocie Data Delete Successfully');




 }


 public function customerpdf($invoiceid){

 
$order=DB::Table('orders')->where('invoiceid',$invoiceid)->first();
  $order_itemsdata=DB::Table('order_details')->where('invoiceid',$order->invoiceid)->get();
  $total=DB::Table('order_details')->where('invoiceid',$order->invoiceid)->sum('Amount');

  return view('admin.sales.customerpdf',compact('order','order_itemsdata','total'));



 }

	   
	   
	  


 }







