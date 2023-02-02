<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\purchase_items;
use App\Models\Admin\purchase;
use App\Models\Admin\Product;



class PurchaseController extends Controller
{
    public function purchase(){


     return view('admin.Purchase.addpurchase');

    }



    public function addpurchase(Request $request){

    $order_date=$request->odate;
    $suppiler=$request->supplier;
    $date=date('d-m-y');
    $s=$request->dis;
    $day=date('d');
    $month=date('m');
    $year=date('Y');
      
    $cost=$request->cost;
    $name=$request->name;
    $qty=$request->qty;
    $price=$request->price;
    $discount=$request->discount;
    $sell=$request->sell;
    $invoice_id=rand(1,1000);
    $total=0;



    for($i=0; $i< count($name); $i++){

     $datasave=[
       'invoice_id' =>$invoice_id,
       'name' =>$name[$i],
       'qty' =>$qty[$i],
       'price' =>$price[$i],
       'discount' =>$discount[$i],
       'sell' =>$sell[$i],
       'total'=>$qty[$i] * $price[$i],

     ];
     

     $total+=$qty[$i]*$price[$i];
     
  DB::Table('purchase_items')->insert($datasave);

    }

    $sum=(int)$total+(int)$cost-(int)$s;

    $data['order_data']=$date;
    $data['invoice_id']=$invoice_id;
    $data['suppiler']=$suppiler;
     $data['discount']=$s;
     $data['totalamount']=$sum;
    
    $data['cost']=$cost;
    $data['day']=$day;
    $data['month']=$month;
    $data['year']=$year;

    DB::Table('purchases')->insert($data);

   

    for($j=0; $j< count($name); $j++){

    $datasave1=[
       'name' =>$name[$j],
       'qty' =>$qty[$j],
       'price' =>$price[$j],
       'discount' =>$discount[$j],
       'sell' =>$sell[$j],
        'suppiler' =>$suppiler,

     ];



     $stock=DB::Table('products')->where('name',$request->name[$j])->get();



if(!$stock){

DB::Table('products')->where('name',$request->name[$j])->increment('qty',$request->qty[$j]);

}

else{
  DB::Table('products')->insert($datasave1);

}
     

    

    }



$purchasedata=DB::Table('purchases')->where('invoice_id',$invoice_id)->first();
  $suppilerdata=DB::Table('suppilers')->where('name',$suppiler)->first();
  $purchase_itemsdata=DB::Table('purchase_items')->where('invoice_id',$purchasedata->invoice_id)->get();
  $total=DB::Table('purchase_items')->where('invoice_id',$purchasedata->invoice_id)->sum('total');

  return view('admin.Purchase.outcome',compact('purchasedata','suppilerdata','purchase_itemsdata','total'));

  
 


    }


  public function makepayment(Request $request){


    $validate=$request->validate([


  '*' =>'required',



   ]);


       $invoice=$request->invoice_id;
       $suppiler=$request->supplier;
       $amount=$request->amount;
       $payment=$request->payment;
       $Reference=$request->Reference;


	$pur=DB::table('purchases')->where('invoice_id',$invoice)->update(['paymenttype'=>1,'paidamount' => $amount,'Reference' =>$Reference]);


      $purchasedata=DB::Table('purchases')->where('invoice_id',$invoice)->first();
  $suppilerdata=DB::Table('suppilers')->where('name',$suppiler)->first();
  $purchase_itemsdata=DB::Table('purchase_items')->where('invoice_id',$invoice)->get();
  $total=DB::Table('purchase_items')->where('invoice_id',$invoice)->sum('total');

  return view('admin.Purchase.paidpayment',compact('purchasedata','suppilerdata','purchase_itemsdata','total'));


  }



  public function managepurchase(){


   $purchase=DB::Table('purchases')->get();
   return view('admin.Purchase.managepurchase',compact('purchase'));


  }


  public function editpurchase($invoice,$suppler){

   $purchasedata=DB::Table('purchases')->where('invoice_id',$invoice)->first();
  $suppilerdata=DB::Table('suppilers')->where('name',$suppler)->first();
  $purchase_itemsdata=DB::Table('purchase_items')->where('invoice_id',$invoice)->get();

    return view('admin.Purchase.editpurchase',compact('purchasedata','suppilerdata','purchase_itemsdata'));


  }


  public function updatepurchase(Request $request){
      

    
 
   $order_date=$request->odate;
    $suppiler=$request->supplier;
    $s=$request->dis;
    $invoice=$request->invoice;
    $cost=$request->cost;
    $name=$request->name;
    $qty=$request->qty;
    $price=$request->price;
    $discount=$request->discount;
    $sell=$request->sell;
    
    
    $total=0;

    for($i=0; $i< count($name); $i++){

    	$id=$request->id;

     
  

   $b=DB::Table('purchase_items')->where('id',$id[$i])->update([
        
       'name' =>$name[$i],
       'qty' =>$qty[$i],
       'price' =>$price[$i],
       'discount' =>$discount[$i],
       'sell' =>$sell[$i],
       'total'=>$qty[$i] * $price[$i],

     ]);
    



     

     $total+=$qty[$i]*$price[$i];
     
  

    }
  
    $sum=(int)$total+(int)$cost-(int)$s;

    for($i=0; $i< count($name); $i++){

    	

  

    }

  $purs=DB::table('purchases')->where('invoice_id',$invoice)->update(['suppiler'=>$suppiler,'discount' => $s,'cost' =>$cost,'totalamount'=>$sum,]);

    
    return redirect()->route('admin.mangepurchase')->with('message','Purchase Data Update Successfully');
    



  }



  public function showpurchase($invoice,$suppler){


     $purchasedata=DB::Table('purchases')->where('invoice_id',$invoice)->first();
  $suppilerdata=DB::Table('suppilers')->where('name',$suppler)->first();
  $purchase_itemsdata=DB::Table('purchase_items')->where('invoice_id',$invoice)->get();
   $total=DB::Table('purchase_items')->where('invoice_id',$purchasedata->invoice_id)->sum('total');

  return view('admin.Purchase.showpurchase',compact('purchasedata','suppilerdata','purchase_itemsdata','total'));




  }


  public function deletepurchase($id){

   $deletepurchase=purchase::find($id);
   $deletepurchase->delete();
   return redirect()->route('admin.mangepurchase')->with('error','Purchase Data Delete Successfully');



  }


  public function cashlist(){
 
    $purchase=DB::Table('purchases')->where('paymenttype',1)->get();
   return view('admin.Purchase.cashlist',compact('purchase'));


  }


  public function duelist(){

 $purchase=DB::Table('purchases')->where('paymenttype',0)->get();
   return view('admin.Purchase.duelist',compact('purchase'));


}


public function purchasepdf($invoice,$suppler){


 $purchase=DB::Table('purchases')->where('invoice_id',$invoice)->first();
 $purid=$purchase->id;
 $purchasedata=DB::Table('purchases')->where('id',$purid)->first();



  $suppilerdata=DB::Table('suppilers')->where('name',$suppler)->first();
  $purchase_itemsdata=DB::Table('purchase_items')->where('invoice_id',$invoice)->get();
   $total=DB::Table('purchase_items')->where('invoice_id',$invoice)->sum('total');

  return view('admin.Purchase.purchasepdf',compact('purchasedata','suppilerdata','purchase_itemsdata','total'));



}


}
