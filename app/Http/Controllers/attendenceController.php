<?php

namespace App\Http\Controllers;

use Session;
use App\Models\userModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;

use App\Models\attendenModel;
use Illuminate\Support\Facades\DB;


class attendenceController extends Controller
{
    public function addAttenden($value='')
    {
    	
    	return view('addAttenden');
    }

    public function viewAttenden($value='')
    {
    	return view('viewAttenden');
    }

    public function recodeattenden($value='')
    {
      $value = DB::table('student')
      ->rightjoin('attenden','student.roll','=','attenden.roll')
      ->get()
      ->groupBy('date');
      return view('recodeAttend',['valueKey'=>$value]);
    }


    public function getStudentAttend(Request $req)
    {
   
      if (Session::has('userKey')) {
        $adminId = Session::get('userKey');
        $getAttend = StudentModel::where('class',$adminId)->get();
        return $getAttend;
      }
    }

    public function createAttendence(Request $req)
    {
         $date = date('d-M-Y');
         $attenCount = attendenModel::where('date',$date)->count();
         if ($attenCount > 0) {
           return 400;
         }else if ($req->attend) {
           foreach ($req->attend as $key => $value) {
             attendenModel::insert([
                ['roll' => $key, 'attenden' => $value,'date'=>$date]
            ]);
           }
         }else{
          return 0;
         }
    }

    public function getattend($value='')
    {
       $data = attendenModel::all();
        return $data;
    }

    public function attendUpShow(Request $req)
    {
       $updateShow = attendenModel::where('id',$req->id)->get();
       return $updateShow;
    }

    public function attendupdate(Request $req)
    {
        $update = attendenModel::where('id',$req->attendupid)->update([
          'attenden'=>$req->upAttend,
          'date'=>$req->updateattenTime
        ]);

        return $update;
    }
    public function attendDelete(Request $req)
    {
      $deleteId =  $req->id;
      $delete = attendenModel::where('id',$deleteId)->delete();
      return $delete;
    }
}
