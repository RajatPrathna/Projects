<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users;
use App\Http\Controllers\products;

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

Route::get('/users/Ulogin', function () {
    return view('users/Ulogin');
});
route::post('users/Ulogin', [users::class,'login'])->name('login');

//////////////////////////////////////////////////////////////////////////
//logout route
route::post('/users/Ulogout',[users::class,'logout']);

//////////////////////////////////////////////////////////////////////////
//// users signup

Route::get('/Usignup', function () {
    return view('users/Usignup');
});

route::post('/users/Usignup',[users::class,'gmail'])->name('Usignup');

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

////////////////////////////////   admin routes  ///////////////////////////////////////////////////////

Route::get('admin/Aproducts',function()
{
    return view("admin/Aproducts");
});

route::get("admin/Aaddproducts",function(){
    return view('admin/Aaddproducts');
});

Route::POST("Aaddproducts",[products::class,'addProducts']);