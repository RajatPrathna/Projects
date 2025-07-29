<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users;

Route::get('/', function () {
    return view('users/Uhome');
});

Route::get('Uhome', function () {
    return view('users/Uhome');
});

Route::get('Ufeatures', function () {
    return view('users/Ufeatures');
});

Route::get('Uabout', function () {
    return view('users/Uabout');
});

Route::get('Ucontact', function () {
    return view('users/Ucontact');
});

route::get('/Uproducts',function(){
    return view('users/Uproducts');
});

//////////////////////////////////////////////////////////////////////////
  //login routes

route::get("users/Ulogin", function () {
    return view('users/Ulogin');
});
Route::post('users/login', [users::class,'login'])->name('login');



//////////////////////////////////////////////////////////////////////////
//// users signup

Route::get('/Usignup', function () {
    return view('users/Usignup');
});

route::post('/users/Usignup',[users::class,'gmail'])->name('Ugmail');

////users details
route::get('/users/Udetails',function(){
    return view('users/Udetails');
});

    //edit details
route::post('/users/Udetails',[users::class,'users']);


//////////////////////////////////////////////////////////////////////////

Route::get('/forgot_password', function () {
    return view('users/UforgotP');
});
Route::get('/new_signup', function () {
    return "new signup";
});