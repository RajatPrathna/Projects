<?php
namespace App\Http\Controllers;
use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class cartC extends Controller
{
    public function cart(){
        $userId = Auth::id();
        $cartItems = cart::where('user_id',$userId)->get();
        $productId=$cartItems->pluck("product_id");
        $products= product::whereIn('id',$productId)->get();
        return view('users.Ucart',compact('cartItems','products'));

    }



    /////////////////////////////add to cart functionallity/////////////////////////////

    public function addToCart(Request $request){
        
        $userId=Auth::id();
        $productId=$request->product_id;
        $quantity=1;
        $existingItem=cart::where('user_id',$userId)->where('product_id',$productId)->first();

        if (!$userId){
            return response()->json([
            'success'=>false,
            'message'=>'you are not logged in.',
        ]);
            
        }
        else{
            if ($existingItem){
                $existingItem->update([
                    'quantity' => $existingItem->quantity + 1
                ]);

                return response()->json([
                'success'=>true,
                'message'=>'added to cart',
                ]);
            }
            else{
                $cart=cart::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ]);

                return response()->json([
                'success'=>true,
                'message'=>'product added to cart',
                'cart'=>$cart->quantity,
                ]);
            }
           
        }
    }
}
