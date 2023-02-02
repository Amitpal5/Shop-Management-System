<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class Admincontroller extends Controller
{
    public function dashboard(){

    $user=Auth::user()->utype;
		if($user=='1'){
					

			return view('admin.master');
		}
		
		else if($user=='0'){
			

						return view('student.master');
			
		}

		else{

        
            return view('welcome');


		}


		
	}


	public function adminlogout(){



Auth::logout();

    return redirect()->route('fro.home')->with('message','Admin Logout Succesfully');;

}


    }

