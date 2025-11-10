<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users;
use App\Http\Controllers\products;
use App\Http\Controllers\orderC; 

Route::get('/', function () {
    return view('users/Uhome');
});

Route::get('Uhome', function () {
    return view('users.Uhome');
});

Route::get('Ufeatures', function () {
    return view('users.Ufeatures');
});

Route::get('Uabout', function () {
    return view('users.Uabout');
});

Route::get('Ucontact', function () {
    return view('users.Ucontact');
});

route::get('users/Ucart',function(){
    return view('users.Ucart');
});

route::get('/Uproducts',[products::class,'viewProducts']);

///////////// users payments route ////////////////////////

route::post('/UplaceOrder',[orderC::class,'placeOrder']);
route::get('/UplaceOrder',function(){
    return view('users.UplaceOrder');
});

//////////////////////////////////////////////////////////////
  //login routes

Route::get('/users/Ulogin', function () {
    return view('users.Ulogin');
});
route::post('users/Ulogin', [users::class,'login'])->name('login');

////////////////////////////////////////////////////////////////
//logout route
route::post('/users/Ulogout',[users::class,'logout']);

///////////////////////////////////////////////////////////////
//// users signup

Route::get('users/Usignup', function () {
    return view('users.Usignup');
});

route::post('users/Usignup',[users::class,'gmail'])->name('Usignup');

////users details
route::get('/users/Udetails',[users::class,'user_details']);

//edit details
route::get('/users/UeditDetails',function(){
    return view('users.UeditDetails');
});


/////////////////////////////////////////////////////////////////

Route::get('/forgot_password', function () {
    return view('users/UforgotP');
});
Route::get('/new_signup', function () {
    return "new signup";
});

////////////////////////////////buy products routes  payments ///////////
route::get('/users/UbuyProduct/{id}',[products::class,'buyProduct']);

//////////////////////////////// place order ///////////////////////
route::post('/users/UplaceOrder/',[orderC::class,'placeOrder']);

////////////////////////////////   admin routes  ///////////////////////////////////////////////////////

Route::get('admin/Aproducts',function(){
    return view("admin/Aproducts");
});

route::get("admin/Aaddproducts",function(){
    return view('admin.Aaddproducts');
});

route::get('admin/adminDashboard',function(){
    return view('admin.adminDashboard');
});


route::get('admin/Amanageorders',[orderC::class,'viewOrders']);
//////////////////////////// add products  ///////////////////////

Route::POST("Aaddproducts",[products::class,'addProducts']);

///////////// admin view products ///////////////////////////////

Route::get('admin/Aproducts', [products::class, 'index'])->name('Aproducts');
Route::POST('admin/Aproducts/{id}/toggle', [products::class, 'toggleStatus']);


/////////////  edit products details /////////////////////////////

Route::get('admin/AeditProducts/{id}', [products::class, 'editProducts']);
Route::post('admin/AeditProducts/{id}', [products::class, 'updateProducts']);
Route::post('admin/AdeleteProducts/{id}', [products::class, 'deleteProducts']);


