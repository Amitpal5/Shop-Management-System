<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FrontendController extends Controller
{
    public function index(){

    
     return view('welcome');

    }



public function redirect(){
		
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













}
