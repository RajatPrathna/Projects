<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\order;
use Illuminate\Support\Facades\Auth;


class orderC extends Controller
{
        
        public function placeOrder(Request $request){
            $validated = $request->validate([
                'fullName' => 'required|max:50',
                'email' => 'required|email',
                'contactNumber' => 'required|digits_between:9,13',
                'address' => 'required',
                'address2' => 'nullable',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required',
                'paymentType' => 'required',
                'productQuantity' => 'required',
                'totalAmount' => 'required',
                'cardNumber' => 'required_if:paymentType,card',
                'cardName' => 'required_if:paymentType,card',
                'expiryMonth' => 'required_if:paymentType,card',
                'expiryYear' => 'required_if:paymentType,card',
                'cvv' => 'required_if:paymentType,card',
                'upiId' => 'required_if:paymentType,upi',
            ]);

        $save = order::create([
            'user_id'=>Auth::id(),
            'fullname'=>$request->fullName,
            'email'=>$request->email,
            'contact_number'=>$request->contactNumber,
            'address'=>$request->address,
            'address2'=>$request->address2,
            'city'=>$request->city,
            'state'=>$request->state,
            'zip'=>$request->zip,
            'paymentMethod'=>$request->paymentType,
            'quantity'=>$request->productQuantity,
            'totalAmount'=>$request->totalAmount,
            'product_id'=>$request->product_id,
            'cardNumber'=>$request->cardNumber,
            'cardName'=>$request->cardName,
            'expmonth'=>$request->expiryMonth,
            'expyear'=>$request->expiryYear,
            'cvv'=>$request->cvv,
            'upi'=>$request->upiId,
         ]);
        return redirect('/UplaceOrder')->with('status','Order Placed Successfully');
        }


        //admin orders table view

        public function viewOrders() {
            $orders = order::with(['product.images'])->get();
            return view('admin.Amanageorders', compact('orders'));
        }

}

        



            

               

