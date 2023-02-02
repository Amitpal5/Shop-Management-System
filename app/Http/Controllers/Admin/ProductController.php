<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\models\Admin\Product;

class ProductController extends Controller
{
    

public function manageproduct(){

 $product=DB::Table('products')->get();

 return view('admin.product.manageproduct',compact('product'));


}


public function deleteproduct($id){


$productsdelete=Product::find($id);
$productsdelete->delete();
 return redirect()->route('admin.manageproduct')->with('error','Product Delete Successfully');



}


public function addproduct(Request $request){


$validate=$request->validate([


'*' => 'required',


]);


$data=array();
$data['name']=$request->name;
$data['suppiler']=$request->supplier;
$data['price']=$request->cost;
$data['sell']=$request->sell;
$data['qty']=$request->qty;

$stock=DB::Table('products')->where('name',$request->name)->first();

if($stock){

DB::Table('products')->where('name',$request->name)->increment('qty',$request->qty);
 return redirect()->route('admin.manageproduct')->with('message','Product Added Successfully');


}

else{

DB::Table('products')->insert($data);

 return redirect()->route('admin.manageproduct')->with('message','Product Added Successfully');


}




}


public function updateproduct(Request $request){

$id=$request->id;
$qty=$request->qty;

$updateproduct=Product::find($id);
$updateproduct->name=$request->name;
$updateproduct->suppiler=$request->sup;
$updateproduct->qty	=$qty;
$updateproduct->price=$request->cost;
$updateproduct->sell=$request->sell;
$updateproduct->save();


 return redirect()->route('admin.manageproduct')->with('message','Product Update Successfully');

}



}
