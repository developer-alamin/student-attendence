<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\crouseModel;

use App\Models\departModel;


class crouseController extends Controller
{
    public function addCrouse($value='')
    {
    	return view("addCrouse");
    }
    public function viewCrouse($value='')
    {
    	return view("viewCrouse");
    }


    public function createCrouse(Request $req)
    {

     	$create = crouseModel::insert([
            'crouseId' => $req->crouseId,
     		'name' => $req->crouseName,
     		'descrip'=>  $req->addDescrip,
     		'date' => $req->crouseDate
     	]);

     	if ($create == true) {
     		return 1;
     	}else{
     		return 0;
     	}
    }

    public function joingetCrouse(Request $req)
    {
        $data = DB::table('crouse')
        ->leftjoin('depart','crouse.crouseid','=','depart.departid')->get();

    	return $data;
    }

    public function getCrouse(Request $req)
    {
        $getCrouse = crouseModel::all();
        return $getCrouse;
    }

    public function updateShowCrouse(Request $req)
    {
    	$id = $req->id;
    	$upShow = crouseModel::where('id',$id)->get();
    	return $upShow;
    }

    public function updateCrouse(Request $req)
    {
    	$update = crouseModel::where('id',$req->upId)->update([
            'crouseid' => $req->upcrouseid,
    		'name' => $req->UpCrouseName,
     		'descrip'=>  $req->UpCrouseDes,
     		'date' => $req->UpCrouseDate
    	]);
    	return $update;
    	
    }

    public function deleteCrouse(Request $req)
    {
    	$crousedelete = crouseModel::where('id',$req->id)->delete();
    	return $crousedelete;
    }

}
