<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StudentModel;

class attendenceController extends Controller
{
    public function addAttenden($value='')
    {
    	$attenData = StudentModel::all();
    	return view('addAttenden',['attenDataKey'=>$attenData]);
    }

    public function viewAttenden($value='')
    {
    	
    	return view('viewAttenden');
    }


    public function getattendence(Request $req)
    {
        foreach ($req->attend as $key => $value) {
          if ($value == "present") {
             return DB::table('attenden')->insert(['roll'=>$key,'attenden'=>'present','date'=> now()]);
          }else if ($value == "Absent") {
             return DB::table('attenden')->insert(['roll'=>$key,'attenden'=>'absent','date'=> now()]);   
          }else{
            return 0;
          }
        }
    }


}
