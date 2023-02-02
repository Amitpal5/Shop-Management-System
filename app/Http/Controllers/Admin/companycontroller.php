<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\Staff;
use App\Models\Admin\salary;
use App\Models\Admin\paymentmethod;
use App\Models\Admin\Vat;
use App\Models\Admin\companyinformation;
use Image;





class companycontroller extends Controller
{
    public function staff(){

    return view('admin.company-setting.addstaff');


    }

   public function addstaff(Request $request){

   $validate=$request->validate([


  '*' =>'required',



   ]);


  $emid=rand(1,1000);
  
   $data=array();
   $data['em_id']=$emid;
   $data['name']=$request->name;
   $data['email']=$request->email;
   $data['phone']=$request->phone;
   $data['address']=$request->Address;
   $data['father_name']=$request->fname;
   $data['Dateofjoining']=$request->djoin;
   $data['Department']=$request->department;
   $data['position']=$request->position;


   DB::Table('staff')->insert($data);

     return redirect()->route('admin.staff')->with('message','Staff Added Successfully');

    



   }

  public function managestaff(){

   $staff=DB::Table('staff')->get();

   return view('admin.company-setting.managestaff',compact('staff'));



  }


  public function updatestaff(Request $request){

   $id=$request->id;
   $eid=$request->eid;
   $updatestaff=Staff::find($id);
   $updatestaff->em_id=$eid;
   $updatestaff->name=$request->name;
   $updatestaff->email=$request->email;
   $updatestaff->phone=$request->phone;
   $updatestaff->address=$request->address;
   $updatestaff->father_name=$request->father_name;
   $updatestaff->Dateofjoining=$request->djoin;
   $updatestaff->Department=$request->Department;
     $updatestaff->position=$request->position;

   $updatestaff->save();
          return redirect()->route('admin.managestaff')->with('message','Staff Update Successfully');



  }



  public function deletestaff($id){


    $deletestaff=Staff::find($id);
    $deletestaff->delete();
              return redirect()->route('admin.managestaff')->with('error','Staff Delete Successfully');



  }


  public function salary(){


    $salary=DB::Table('salaries')->get();
  
   return view('Admin.company-setting.salary',compact('salary'));


  }


  public function addsalary(Request $request){


   $id=$request->employee;

   $information=DB::Table('staff')->where('id',$id)->first();
   $emid=$information->em_id;
   $employee_name=$information->name;

     $invoice=rand(1,1000);
     $totalpaid=$request->basic + $request->da +$request->ta +$request->sales +$request->Bonus;
     $totalde=$request->lfine+$request->absence;
     $totalpay=(int)$totalpaid-(int)$totalde;

   $data1=array();
   $data1['invoice']=$invoice;
   $data1['emid']=$emid;
   $data1['date']=$request->date;
   $data1['name']=$employee_name;
   $data1['month']=$request->month;
   $data1['year']=$request->year;
   $data1['amount']=$request->basic;
   $data1['DA']=$request->da;
   $data1['TA']=$request->ta;
   $data1['SalesIncentive']=$request->sales;
   $data1['Bonus']=$request->Bonus;
   $data1['LateFine']=$request->lfine;
   $data1['Absence']=$request->absence;
    $data1['mop']=$request->mop;
    $data1['pay']=$totalpay;


   DB::Table('salaries')->insert($data1);


   $salary=DB::Table('salaries')->where('invoice',$invoice)->first();
  $staff=DB::Table('staff')->where('em_id',$emid)->first();

  return view('admin.company-setting.salaryoutcome',compact('salary','staff'));




  }


  public function updatesalary(Request $request){


  $id=$request->id;
  $updatesalary=salary::find($id);
  $updatesalary->emid=$request->emid;
  $updatesalary->name=$request->name;
  $updatesalary->date=$request->date;
  $updatesalary->month=$request->month;
  $updatesalary->year=$request->year;
  $updatesalary->amount=$request->basic;
  $updatesalary->DA=$request->DA;
  $updatesalary->TA=$request->TA;
  $updatesalary->SalesIncentive=$request->sales;
  $updatesalary->Bonus=$request->Bonus;
  $updatesalary->LateFine=$request->lfine;
  $updatesalary->mop=$request->mop;
  $updatesalary->Absence=$request->absence;

  $totaladd=$request->basic+$request->DA+$request->TA+$request->sales+$request->Bonus;
  $totalsub=$request->lfine+$request->absence;
  $totalpay=$totaladd-$totalsub;
  $updatesalary->pay=$totalpay;

  $updatesalary->save();
     return redirect()->route('admin.staffsalary')->with('message','Staff Salary Update Successfully');






  }



  public function deletesalary($id){

    $deletesalary=Salary::find($id);
    $deletesalary->delete();
         return redirect()->route('admin.staffsalary')->with('error','Staff Salary Delete Successfully');




  }


  public function showsalary($id,$emid){


   $salary=DB::Table('salaries')->where('id',$id)->first();
   $staff=DB::Table('staff')->where('em_id',$emid)->first();

   return view('admin.company-setting.showsalary',compact('salary','staff'));




  }


  public function paymentmethod(){

    $payment=DB::Table('paymentmethods')->get();


   return view('admin.company-setting.paymentmethod',compact('payment'));


  }

  public function addpaymentmethod(Request $request){


   $validate=$request->validate([


   '*' => 'required',




   ]);


   $data2=array();
   $data2['name']=$request->name;
   $data2['type']=$request->type;
   $data2['number']=$request->number;

   DB::Table('paymentmethods')->insert($data2);
   return redirect()->route('admin.paymentmethod')->with('message','Payment Method Added Successfully');



  }


  public function updatepaymentmethod(Request $request){


    $id=$request->id;

   $updatepaymentmethod=paymentmethod::find($id);
   $updatepaymentmethod->name=$request->name;
   $updatepaymentmethod->type=$request->type;
   $updatepaymentmethod->number=$request->number;

   $updatepaymentmethod->save();

  return redirect()->route('admin.paymentmethod')->with('message','Payment Method Update Successfully');


  }


  public function deletepaymentmethod($id){

   
   $deletepaymentmethod=paymentmethod::find($id);
   $deletepaymentmethod->delete();
   return redirect()->route('admin.paymentmethod')->with('error','Payment Method Error Delete Successfully');


  }


  public function vat(){


   $vate=DB::Table('vats')->get();



   return view('admin.company-setting.tax',compact('vate'));


  }


  public function addvat(Request $request){

   $validate=$request->validate([

        '*' => 'required',


   ]);


   $data4=array();

   $data4['vat_code']=$request->code;
   $data4['name']=$request->name;
   $data4['percentage']=$request->percentage;

   DB::Table('vats')->insert($data4);

return redirect()->route('admin.vat')->with('message','Vat Added Successfully');
   


  }


  public function updatevat(Request $request){

  $id=$request->id;
  $code=$request->code;

  $updatevat=Vat::find($id);
  $updatevat->vat_code=$code;
  $updatevat->name=$request->name;
  $updatevat->percentage=$request->percentage;

  $updatevat->save();

return redirect()->route('admin.vat')->with('message','Vat update Successfully');




  }


  public function deletevat($id){

   $deletevat=Vat::find($id);
   $deletevat->delete();
   return redirect()->route('admin.vat')->with('error','Vat Delete Successfully');



  }


  public function companyinformation(){

   $company=DB::Table('companyinformations')->first();
   return view('admin.company-setting.companyinformation',compact('company'));



  }


  public function updateinformation(Request $request){

   $id=$request->id;
   $old=$request->old;
   $image=$request->image;

   if($image){
    $updateinformation=companyinformation::find($id);
    $updateinformation->name=$request->name;
    $updateinformation->address=$request->address;
    $updateinformation->phone=$request->phone;
    $updateinformation->email=$request->email;
    if($request->hasfile('image')){

     $image_1_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         $path = 'image/' . $image_1_name;
       Image::make($image)->resize(150,150)->save($path);
       $image_1_last=$path;
    
   $updateinformation->logo=$image_1_last;

    }

    $updateinformation->save();
     return redirect()->route('admin.companyinformation')->with('message','company information update succesfully');

   }

   else{
 
    $updateinformation=companyinformation::find($id);
    $updateinformation->name=$request->name;
    $updateinformation->address=$request->address;
    $updateinformation->phone=$request->phone;
    $updateinformation->email=$request->email;
    $updateinformation->save();
     return redirect()->route('admin.companyinformation')->with('message','company information update succesfully');


   }



  }


}
