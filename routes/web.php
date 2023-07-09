<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siteController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\crouseController;
use App\Http\Controllers\attendenceController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\classController;
/*home Route code start form here*/
Route::get('/',[siteController::class,'home']);
Route::post('/userlogin',[siteController::class,'userlogin']);
/*home Route code end form here*/

/*crouse Route code start form here*/
Route::post('/createCrouse',[crouseController::class,'createCrouse']);
Route::get('/joingetCrouse',[crouseController::class,'joingetCrouse']);
Route::get('/getCrouse',[crouseController::class,'getCrouse']);
Route::post('/updateShowCrouse',[crouseController::class,'updateShowCrouse']);
Route::post('/updateCrouse',[crouseController::class,'updateCrouse']);
Route::post('/deleteCrouse',[crouseController::class,'deleteCrouse']);
/*crouse Route code end form here*/

/*Department Route code start form here*/
Route::post('/createdepart',[departmentController::class,'createdepart']);
Route::get('/getdepart',[departmentController::class,'getdepart']);
Route::post('/upShowDepart',[departmentController::class,'upShowDepart']);
Route::post('/updateDepart',[departmentController::class,'updateDepart']);
Route::post('/delatedepart',[departmentController::class,'delatedepart']);
/*Department Route code end form here*/

/*Student Route Code start form here*/
Route::post('/createStudent',[studentController::class,'createStudent']);
Route::get('/checkStudentRoll',[studentController::class,'checkStudentRoll']);
Route::get('/getStudent',[studentController::class,'getStudent']);
Route::post('/upShowStudent',[studentController::class,'upShowStudent']);
Route::post('/updateStudent',[studentController::class,'updateStudent']);
Route::post('/deleteStudent',[studentController::class,'deleteStudent']);
/*Student Route Code end form here*/

/*Attendence Route code start form here*/
Route::get('/getStudentAttend',[attendenceController::class,'getStudentAttend']);
Route::post('/createAttendence',[attendenceController::class,'createAttendence']);
Route::get('/getattend',[attendenceController::class,'getattend']);
Route::post('/attendUpShow',[attendenceController::class,'attendUpShow']);
Route::post('/attendupdate',[attendenceController::class,'attendupdate']);
Route::post('/attendDelete',[attendenceController::class,'attendDelete']);
/*Attendence Route code end form here*/
/*class Route code start form here*/
Route::post('/createClass',[classController::class,'createClass']);
Route::get('/getClass',[classController::class,'getClass']);
Route::post('/upShowClass',[classController::class,'upShowClass']);
Route::post('/updateClass',[classController::class,'updateClass']);
Route::post('/deleteClass',[classController::class,'deleteClass']);

/*class Route code end form here*/

Route::get('test',[adminController::class,'test']);

Route::prefix('admin')->group(function () {
	Route::get('/',[adminController::class,'home'])->name('login.home')->middleware('login');;

	Route::get('addClass',[classController::class,'addClass']);
	Route::get('viewClass',[classController::class,'viewClass']);

	Route::get('addCrouse',[crouseController::class,'addCrouse']);
	Route::get('viewCrouse',[crouseController::class,'viewCrouse']);

	Route::get('addDepart',[departmentController::class,'addDepart']);
	Route::get('viewDepart',[departmentController::class,'viewDepart']);

	Route::get('addStudent',[studentController::class,'addStudent']);
	Route::get('viewStudent',[studentController::class,'viewStudent']);
	
	Route::get('addUser',[userController::class,'addUser']);
	Route::get('viewUser',[userController::class,'viewUser']);

	Route::get('addAttenden',[attendenceController::class,'addAttenden']);
	Route::get('recodeattenden',[attendenceController::class,'recodeattenden']);
	Route::get('viewAttenden',[attendenceController::class,'viewAttenden']);

	
	Route::get('/logout',[siteController::class,'logout'])->middleware('login');

});