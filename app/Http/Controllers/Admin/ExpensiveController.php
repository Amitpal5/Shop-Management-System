<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Expensive;
use DB;

class ExpensiveController extends Controller
{
    public function expensive(){

   $expensive=Expensive::get();
   return view('admin.Transcation.dailyexpensive',compact('expensive'));


    }


    public function addexpense(Request $request){

    $validate=$request->validate([

     '*' => 'required',


    ]);

    $day=date('d');
    $month=date('m');
    $year=date('y');
    $date=$request->date;
    $data=array();
    $data['day']=$day;
    $data['month']=$month;
    $data['year']=$year;
    $data['date']=$date;
    $data['name']=$request->name;
    $data['amount']=$request->amount;

    DB::table('expensives')->insert($data);

     return redirect()->route('admin.dailyexpense')->with('message','Daily Expense Added Successfully');



    }


    public function updateexpense(Request $request){

   $id=$request->id;
   $day=date('d');
   $month=date('m');
   $year=date('y');
   $updateexpense=Expensive::find($id);
   $updateexpense->day=$day;
   $updateexpense->month=$day;
   $updateexpense->year=$day;
   $updateexpense->date=$request->date;
   $updateexpense->name=$request->name;
   $updateexpense->amount=$request->amount;
   $updateexpense->save();
        return redirect()->route('admin.dailyexpense')->with('message','Daily Expense Update Successfully');



    }


    public function deleteexpense($id){

    $deleteexpense=Expensive::find($id);
    $deleteexpense->delete();
        return redirect()->route('admin.dailyexpense')->with('error','Daily Expense Delete Successfully');


    }
}
