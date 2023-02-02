<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\suppiler;
use DB;


class SuppilerController extends Controller
{
    public function suppiler(){

    return view('admin.suppiler.addsupplier');


    }



    public function addsuppiler(Request $request){

     $validate=$request->validate([


         '*' => 'required',


   ]);

   $data=array();
   $data['name'] =$request->name;
   $data['company']=$request->company;
   $data['email'] =$request->email;
   $data['phone']=$request->phone;
   $data['address']=$request->Address;

   DB::Table('suppilers')->insert($data);

   return redirect()->route('admin.suppiler')->with('message','Supplier Added Successfully');




    }


    public function maangesupplier(){

    
    $suppiler=DB::Table('suppilers')->get();

    return view('admin.suppiler.managesupplier',compact('suppiler'));


    }


   public function updatesupplier(Request $request){


    $id=$request->id;

    $updatesupplier=suppiler::find($id);
    $updatesupplier->name=$request->name;
    $updatesupplier->company=$request->company;
    $updatesupplier->email=$request->email;
    $updatesupplier->phone=$request->phone;
    $updatesupplier->address=$request->address;
    $updatesupplier->save();

   return redirect()->route('admin.maangesupplier')->with('message','Supplier Update Successfully');




   }


   public function deletesuppiler($id){


    $deletesuppiler=suppiler::find($id);
    $deletesuppiler->delete();
    return redirect()->route('admin.maangesupplier')->with('error','Supplier Update Successfully');


   }


}
