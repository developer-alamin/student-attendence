<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\departModel;
use App\Models\crouseModel;



class adminController extends Controller
{
    public function home($value='')
    {
      return view('home');
    }

    public function test(Request $req)
    {
    	$data = DB::table('crouse')
        ->leftjoin('depart','crouse.crouseid','=','depart.departid')->get();
        echo "<pre>";
        print_r($data);
    }
}
