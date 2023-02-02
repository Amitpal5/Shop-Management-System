<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function todayincome(){


    $today=date('d');
		$order=DB::Table('orders')->where('day',$today)->get();
		$total=DB::Table('orders')->where('day',$today)->sum('TotalAmount');
		
		
		return view('Admin.Report.todayincome',compact('order','total'));


    }

    public function monthincome(){

    $month=date('m');
    $order=DB::Table('orders')->where('month',$month)->get();
    $total=DB::Table('orders')->where('month',$month)->sum('TotalAmount');
    return view('Admin.Report.monthincome',compact('order','total'));


    }


    public function yearincome(){

    $year=date('Y');
    $order=DB::Table('orders')->where('year',$year)->get();
    $total=DB::Table('orders')->where('year',$year)->sum('TotalAmount');
     return view('Admin.Report.yearincome',compact('order','total'));

  


    }


    public function dailyexpense(){

    $day=date('d');
    $ex=DB::Table('purchases')->where('day',$day)->get();
    $total=DB::Table('purchases')->where('day',$day)->sum('totalamount');

    return view('Admin.Report.dailyexpense',compact('ex','total'));



    }


    public function monthexpense(){

    $month=date('m');
    $ex=DB::Table('purchases')->where('month',$month)->get();
    $total=DB::Table('purchases')->where('month',$month)->sum('totalamount');

    return view('Admin.Report.monthexpense',compact('ex','total'));



    }


    public function yearexpense(){

     $year=date('Y');
    $ex=DB::Table('purchases')->where('year',$year)->get();
    $total=DB::Table('purchases')->where('year',$year)->sum('totalamount');

    return view('Admin.Report.yearexpense',compact('ex','total'));


    }


    public function monthprofit(){

    $month=date('m');
    $profit=DB::Table('profit_details')->where('month',$month)->get();
    $total=DB::Table('profit_details')->where('month',$month)->sum('profit');

    return view('Admin.Report.monthprofit',compact('profit','total'));


    }


    public function yearprofit(){

    $year=date('Y');
    $profit=DB::Table('profit_details')->where('year',$year)->get();
    $total=DB::Table('profit_details')->where('year',$year)->sum('profit');

    return view('Admin.Report.yearprofit',compact('profit','total'));





    }



}
