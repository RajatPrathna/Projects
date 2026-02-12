<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\productimg;
use App\Models\user_review;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class userReviewC extends Controller
{

    //add reviews function
    public function addReview(request $request){

    if(!Auth::check()){
        return redirect('users/Ulogin')->with('error', 'You must be logged in to submit a review.');
    }
        $user_id = Auth::id();
        $validate=$request->validate([
        'user_name' => 'required|string|max:255',
        'user_review' => 'required|string|max:1000',
        'product_id' => 'required|integer|exists:products,id',
        'rating' => 'required|integer|between:1,5',
        
        ]);

        user_review::create([
            'user_id' => $user_id,
            'user_email' => Auth::user()->email,
            'user_name' => $request->user_name,
            'review' => $request->user_review,
            'product_id' => $validate['product_id'],
            'date' => now()->toDateString(),
            'time' => now()->toTimeString(),
            'rating' => $request->rating,
        ]);
        return back()->with('success', 'Review submitted successfully!');

    }


    //single product page function
    public function singleProductPage($id){
        $product = product::with('images')->findOrFail($id);
        $image=productimg::where('product_id',$id)->first();
        $Allreviews = user_review::where('product_id', $id)->limit(5)->get(); 

        return view('users.UsingleProduct', compact('product', 'Allreviews','image'));

    }

    
}
