<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StudentModel;

class studentController extends Controller
{
   public function addStudent($value='')
   {
   		return view('addStudent');
   }
   public function viewStudent($value='')
   {
   		return view('viewStudent');
   }

   public function createStudent(Request $req)
   {

         $users = StudentModel::where('roll',$req->roll)->count();
         
   		if ($users > 0) {
            return 100;
         }elseif ($req->StudentName && $req->studentDate && $req->roll == true) {
            $create = StudentModel::insert([
            'name' =>$req->StudentName,
            'roll' =>$req->roll,
            'date' =>$req->studentDate
         ]);
            if ($create == true) {
              return 200;
            }else{
               return 0;
            }
            
         }
   }

   public function getStudent(Request $req)
   {
      $data = StudentModel::all();
      return $data;
   }

   public function upShowStudent(Request $req)
   {
      $upshowId = $req->id;
      $upshowData = StudentModel::where('id',$upshowId)->get();
      return $upshowData;
   }

   public function updateStudent(Request $req)
   {

      $update = DB::table("student")->where('id',$req->studentid)->update([
        'name' => $req->stuName,
         'roll' => $req->stuUpRoll,
         'date'=> $req->stuUpDate
      ]);
      
      return $update;
   }

   public function deleteStudent(Request $req)
    {
      $studentdelete = StudentModel::where('id',$req->id)->delete();
      return $studentdelete;
    }

}
