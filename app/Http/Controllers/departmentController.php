<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departModel;

class departmentController extends Controller
{
    public function addDepart($value='')
    {
    	return view('addDepart');
    }
    public function viewDepart($value='')
    {
    	return view('viewDepart');
    }

    public function createdepart(Request $req)
    {
    	$create = departModel::insert([
    		'departid'=> $req->departid,
    		'department'=> $req->departName,
    		'description'=>$req->departDescrip
    	]);

    	if ($create == true) {
    		return 1;
    	}else{
    		return 0;
    	}
    }
    public function getdepart(Request $req)
    {
    	$getDepart = departModel::all();
    	return $getDepart;
    }

    public function upShowDepart(Request $req)
    {
    	$show = departModel::where('id',$req->id)->get();
    	return $show;
    }

      public function updateDepart(Request $req)
    {
    	$update = departModel::where('id',$req->departPriId)->update([
            'departid' => $req->updepartId,
    		'department' => $req->updepartName,
     		'description'=>  $req->updepartdes
    	]);
    	return $update;
    	
    }

    public function delatedepart(Request $req)
    {
    	$crousedelete = departModel::where('id',$req->id)->delete();
    	return $crousedelete;
    }
}
