<?php

use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Productcontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/login', function () {
    return view('login');
});


Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/login');
});

Route::post('/login',[Usercontroller::class,'login']);
Route::get('/',[Productcontroller::class,'index']);
Route::get('detail/{id}',[Productcontroller::class,'detail']);
Route::get('search',[Productcontroller::class,'search']);
Route::post('/add_to_cart',[Productcontroller::class,'addtocart']);