<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'Home'])->name("dashboard")->middleware("islogged");
Route::get("/getData",[HomeController::class,"getData"])->name("getdata");
// login routes
Route::get("/login",[AuthController::class,'Login'])->name("login")->middleware("isAlreadyLogged");
Route::post("/loginuser",[AuthController::class,"loginuser"])->name("loginuser");

// register routes
Route::get("/register",[AuthController::class,"register"])->name("register");
Route::post("/registeruser",[AuthController::class,"registeruser"])->name("registeruser");

//logout route
Route::get("/logout",[AuthController::class,'logout'])->name("logout");


// create notes route
Route::post("/storenote",[HomeController::class,"storenotes"])->name("storenotes");
Route::get("/notes",[HomeController::class,"NewNotes"])->name("newnote");


//update notes
Route::get('/update/{id}',[HomeController::class,'update'])->name("update")->middleware("islogged");;
Route::post("/updatenotes/{id}",[HomeController::class,"updateNotes"])->name("updatenotes");

// delete notes
Route::get("/delete/{id}",[HomeController::class,"deleteNotes"])->name("delete");