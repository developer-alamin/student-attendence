<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\StudentModel;
use App\Models\crouseModel;
use App\Models\departModel;
use App\Models\classModel;


class studentController extends Controller
{
   public function addStudent($value='')
   {
      $class = classModel::all();
       $crouse = crouseModel::all();
       $depart = departModel::all();
   		return view('addStudent',[
        'classKey' => $class,
        'crouseKey' => $crouse,
        'departKey' => $depart
      ]);
   }
   public function viewStudent($value='')
   {
     $class = classModel::all();
     $crouse = crouseModel::all();
     $depart = departModel::all();
   		return view('viewStudent',[
        'classKey'=> $class,
        'crouseKey' => $crouse,
        'departKey' => $depart
      ]);
   }

   public function createStudent(Request $req)
   {  

           $http = $_SERVER['HTTP_HOST'];
           $addimg = "http://".$http."/storage/img/";

           $file = $req->file('photo');
           $addFileName = $addimg.time().'.'.$file->getClientOriginalExtension();
           $fileName = time().'.'.$file->getClientOriginalExtension();
           $file->storeAs('public/img',$fileName);


         $users = StudentModel::where('roll',$req->roll)->count();
         
   		if ($users > 0) {
            return 100;
         }elseif ($req->StudentName && $req->roll && $req->mobile && $req->class && $addFileName  == true) {

            $create = StudentModel::insert([
            'name' => $req->StudentName,
            'roll' => $req->roll,
            'mobile' => $req->mobile,
            'class' => $req->class,
            'crouse' => $req->crouse,
            'depart' => $req->department,
            'photo' => $addFileName,
            'date'  => $req->studentDate
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

      if ($req->hasFile('upphoto')) {
         $file = $req->file('upphoto');

         $http = $_SERVER['HTTP_HOST'];
         $addimg = "http://".$http."/storage/img/";

         $UpaddFileName = $addimg.time().'.'.$file->getClientOriginalExtension();
         $fileName = time().'.'.$file->getClientOriginalExtension();
         $file->storeAs('public/img',$fileName);

         $updatePreImg = $req->stuUpImg;
         $updateExplode = explode('/', $updatePreImg);
         $updateEnd = end($updateExplode);
         Storage::delete('public/img/'.$updateEnd);
      }else{
         $UpaddFileName = $req->stuUpImg;
      }

      $update = DB::table("student")->where('id',$req->studentid)->update([
         'name' => $req->stuName,
          'roll' => $req->stuUpRoll,
          'mobile' => $req->upmobile,
          'class' => $req->upclass,
          'crouse' => $req->Upcrouse,
          'depart' => $req->Updepartment,
          'photo' =>$UpaddFileName,
          'date'  => $req->stuUpDate
       ]);
   
       return $update;
   }

   public function deleteStudent(Request $req)
    {

          $deleteId = $req->id;
           $delete = StudentModel::find($deleteId);
           $deleteImg = $delete->photo;

           $explode = explode('/',$deleteImg);
           $deleteimgEnd = end($explode);

          if (Storage::delete('public/img/'.$deleteimgEnd)) {
            $dataDelete = StudentModel::destroy($deleteId);
          }
          return $dataDelete;

    }

}
