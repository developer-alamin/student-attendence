<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function addUser($value='')
    {
    	return view('addUser');
    }
    public function viewUser($value='')
    {
    	return view('viewUser');
    }
}
