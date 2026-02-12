<?php

use App\Http\Controllers\cartC;
use App\Http\Controllers\users;
use App\Http\Controllers\orderC; 
use App\Http\Controllers\products;
use App\Http\Controllers\userReviewC;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

route::get('/Uproducts',[products::class,'viewProducts']);

/////////////////////////////////////////////////////////////////// users signup//////

Route::get('users/Usignup', function () {
    return view('users.Usignup');
});
route::post('users/Usignup',[users::class,'gmail'])->name('Usignup');

////////////////////////////////////////////////////////////////login routes//////

Route::get('/users/Ulogin', function () {
    return view('users.Ulogin');
});
route::post('users/Ulogin', [users::class,'login'])->name('login');

Route::middleware('auth')->group(function () {

        ///////////// users payments route ////////////////////////

        route::post('users/UplaceOrder',[orderC::class,'placeOrder']);

        ////////////////////////////////////////////////////////////////
        //logout route
        route::post('/users/Ulogout',[users::class,'logout']);

        ////users details
        route::get('/users/Udetails',[users::class,'user_details']);
        route::post('/users/Udetails',[users::class,'update_details']);

        //edit details
        route::get('/users/UeditDetails',[users::class,'edit_details']);


        /////////////////////////////////////////////////////////////////

        Route::get('/forgot_password', function () {
            return view('users/UforgotP');
        });

        Route::get('/csrf-token', function () {
            return response()->json(['token' => csrf_token()]);
        });

        route::get('users/Ucart',[cartC::class,'cart']);                            //go to cart
        route::post('/Ucart',[cartC::class,'addToCart'])->name('cart.add');         // add to cart

        route::get('users/Ucheckout',[products::class,'paymentDetails']);  // checkout route
        route::post('users/Ucheckout',[products::class,'paymentDetails']);  // checkout route
        route::post('/users/Ubuyproduct',[orderC::class,'addressDetails']);  // buy product route

        route::get('users/Uview_Orders',function(){
            return view('users.Uview_Orders');
        }); 
        route::get("users/Uview_Orders",[orderC::class,'userOrders']);  // user view orders route
        route::get('users/Uproduct_details/{id}',[products::class,'buyProduct']); // product details route
        route:: get ('users/UsingleProduct/{id}',[userReviewC::class,'singleProductPage']);  // single product page route
        route:: post ('users/review/',[userReviewC::class,'addReview'])->name('addReview');  // add review route

        ////////////////////////////////   admin routes  ///////////////////////////////////////////////////////

        route::get("admin/Aaddproducts",function(){
            return view('admin.Aaddproducts');
        });


        route::get('admin/adminDashboard',function(){
            return view('admin.adminDashboard');
        });

        route::get('admin/Amanageorders',[orderC::class,'viewOrders']); // add products

        Route::POST("Aaddproducts",[products::class,'addProducts']);// admin view products
        Route::get('admin/Aproducts', [products::class, 'index'])->name('Aproducts');
        Route::POST('admin/Aproducts/{id}/toggle', [products::class, 'toggleStatus']);


        /////////////  edit products details /////////////////////////////

        Route::get('admin/AeditProducts/{id}', [products::class, 'editProducts']);
        Route::post('admin/AeditProducts/{id}', [products::class, 'updateProducts']);
        Route::post('admin/AdeleteProducts/{id}', [products::class, 'deleteProducts']);


});

route:: get('admin/adminLogin',function(){
    return view('admin/adminLogin');
});
route ::post('admin/adminLogin',[AdminController::class,'adminLogin']);


route:: get('admin/adminSignup',function(){
    return view('admin/adminSignup');
});
route:: post('admin/adminSignup',[AdminController::class,'adminSignup']);

/////////////////////////////////////////////////////////////////////////////////////////////////////

route::get('admin/adminpanell',[AdminController::class,'adminPanel'])->name('admin.dashboard');


route::post('users/cancelOrder',[orderC::class,'cancelOrder']);