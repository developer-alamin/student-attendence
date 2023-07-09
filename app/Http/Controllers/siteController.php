<?php

namespace App\Http\Controllers;

use Session;
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
          $adminId = $req->adminId;
          $pass = $req->userPass;

          $getdata = userModel::where('adminClass',$user)->where('adminId',$adminId)->first();

          if (isset($getdata) == true) {
            if($getdata->password == $pass){
              $req->session()->put('userKey',$getdata->adminClass);
              return 1;
            }else{
              return 0;
            }
          }else{
            return 404;
          }
          
      }

       public function logout(Request $req){
        $req->session()->flush();
        $classKey = classModel::all();
        return redirect(route('login.home',compact('classKey')));
      }
}
