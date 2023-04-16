<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\userModel;
use App\Models\classModel;

class siteController extends Controller
{
    public function home($value='')
    {
    	$class = classModel::all();
    	return view('home',['classKey'=>$class]);
    }

     public function userlogin(Request $req){

          $user = $req->userClass;
          $pass = $req->userPass;

          $data = userModel::where('adminClass',$user)->where('password',$pass)->count();
          if ($data == 1) {
          $req->session()->put('userKey',$user);
           return 1;
          } else {
            return 0;
          }
          
      }

       public function logout(Request $req)
      {
        $req->session()->flush();
        $class = classModel::all();
      return view('home',['classKey'=>$class]);
      }
}
