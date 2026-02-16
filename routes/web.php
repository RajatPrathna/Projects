<?php

use App\Http\Controllers\CartC;
use App\Http\Controllers\Users;
use App\Http\Controllers\OrderC; 
use App\Http\Controllers\Products;
use App\Http\Controllers\UserReviewC;
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

route::get('/Uproducts',[Products::class,'viewProducts']);

/////////////////////////////////////////////////////////////////// users signup//////

Route::get('users/Usignup', function () {
    return view('users.Usignup');
});
route::post('users/Usignup',[Users::class,'gmail'])->name('Usignup');

////////////////////////////////////////////////////////////////login routes//////

Route::get('/users/Ulogin', function () {
    return view('users.Ulogin');
});
route::post('users/Ulogin', [Users::class,'login'])->name('login');

Route::middleware('auth')->group(function () {

        ///////////// users payments route ////////////////////////

        route::post('users/UplaceOrder',[OrderC::class,'placeOrder']);

        ////////////////////////////////////////////////////////////////
        //logout route
        route::post('/users/Ulogout',[Users::class,'logout']);

        ////users details
        route::get('/users/Udetails',[Users::class,'user_details']);
        route::post('/users/Udetails',[Users::class,'update_details']);

        //edit details
        route::get('/users/UeditDetails',[Users::class,'edit_details']);


        /////////////////////////////////////////////////////////////////

        Route::get('/forgot_password', function () {
            return view('users/UforgotP');
        });

        Route::get('/csrf-token', function () {
            return response()->json(['token' => csrf_token()]);
        });

        route::get('users/Ucart',[CartC::class,'cart']);                            //go to cart
        route::post('/Ucart',[CartC::class,'addToCart'])->name('cart.add');         // add to cart

        route::get('users/Ucheckout',[Products::class,'paymentDetails']);  // checkout route
        route::post('users/Ucheckout',[Products::class,'paymentDetails']);  // checkout route
        route::post('/users/Ubuyproduct',[OrderC::class,'addressDetails']);  // buy product route

        route::get('users/Uview_Orders',function(){
            return view('users.Uview_Orders');
        }); 
        route::get("users/Uview_Orders",[OrderC::class,'userOrders']);  // user view orders route
        route::get('users/Uproduct_details/{id}',[Products::class,'buyProduct']); // product details route
        route:: get ('users/UsingleProduct/{id}',[UserReviewC::class,'singleProductPage']);  // single product page route
        route:: post ('users/review/',[UserReviewC::class,'addReview'])->name('addReview');  // add review route

        ////////////////////////////////   admin routes  ///////////////////////////////////////////////////////

        route::get("admin/Aaddproducts",function(){
            return view('admin.Aaddproducts');
        });


        route::get('admin/adminDashboard',function(){
            return view('admin.adminDashboard');
        });

        route::get('admin/Amanageorders',[OrderC::class,'viewOrders']); // add Products

        Route::POST("Aaddproducts",[Products::class,'addProducts']);// admin view Products
        Route::get('admin/Aproducts', [Products::class, 'index'])->name('Aproducts');
        Route::POST('admin/Aproducts/{id}/toggle', [Products::class, 'toggleStatus']);


        /////////////  edit Products details /////////////////////////////

        Route::get('admin/AeditProducts/{id}', [Products::class, 'editProducts']);
        Route::post('admin/AeditProducts/{id}', [Products::class, 'updateProducts']);
        Route::post('admin/AdeleteProducts/{id}', [Products::class, 'deleteProducts']);


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


route::post('users/cancelOrder',[OrderC::class,'cancelOrder']);