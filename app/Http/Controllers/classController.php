<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\classModel;

class classController extends Controller
{
   public function addClass($value='')
   {
   		return view('addClass');
   }

   public function viewClass($value='')
   {
   		return view('viewClass');
   }

   public function createClass(Request $req)
   {

   		$check = classModel::where('class',$req->className)->count();
   		if ($check > 0) {
   			return 500;
   		}else if(!($check > 0)){
   			$create = classModel::insert(['class'=>$req->className]);
   			return 1;
   		}else{
   			return 0;
   		}
   }

   public function getClass($value='')
   {
   		return classModel::all();
   }

    public function upShowClass(Request $req)
    {
    	$id = $req->id;
    	$upShow = classModel::where('id',$id)->get();
    	return $upShow;
    }

    public function updateClass(Request $req)
    {

       $update = DB::table('class')->where('id',$req->upId)->update([
            'class' => $req->upClassName
    	]);
    	return $update;
    }



    public function deleteClass(Request $req)
    {
    	$classDelete = classModel::where('id',$req->id)->delete();
    	return $classDelete;
    }

}
