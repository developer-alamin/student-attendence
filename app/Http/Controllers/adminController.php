<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\departModel;
use App\Models\crouseModel;
use App\Models\attendenModel;
use App\Models\StudentModel;

use App\Models\classModel;

use carbon\carbon;


class adminController extends Controller
{
    public function home($value='')
    {

      $attendenDateData = attendenModel::select('id','date')->get()->groupBy(function($data)
       {
         return carbon::parse($data->date)->format('D');
       });

       $attenMounths = [];
       $attenMounthCount = [];
       foreach ($attendenDateData as $attenDataKey => $AttendDataValue) {
           $attenMounths[]=$attenDataKey;
           $attenMounthCount[]=count($AttendDataValue);
       }



        $studentdateData = StudentModel::select('id','date')->get()->groupBy(function($data)
       {
         return carbon::parse($data->date)->format('D');
       });

       $studentmount = [];
       $studentmountCount = [];
       foreach ($studentdateData as $studentDateKey => $studentdateValue) {
           $studentmount[]=$studentDateKey;
           $studentmountCount[]=count($studentdateValue);
       }



       $allStudent = StudentModel::count();
       $allAttend = attendenModel::count();
       $allClass = classModel::count();
       $allDepart = departModel::count();
       $allCrouse = crouseModel::count();
      return view('adminhome',[
        'studentkey' => $allStudent,
        'attendKey' => $allAttend,
        'classKey' => $allClass,
        'departKey' => $allDepart,
        'crouseKey' => $allCrouse,
        'attenMounthsKey'=>$attenMounths,
        'attenMounthCountKey'=>$attenMounthCount,
        'studentMonthKey' =>$studentmount,
        'studentmonthCount' => $studentmountCount
      ]);
    }

    public function test(Request $req)
    {

      attendenModel::truncate();
      
    }
}
