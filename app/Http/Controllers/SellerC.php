<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SellerC extends Controller
{
    public function sellerSignup(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email' => 'required|email|unique:Orders,email',
            'password' => 'required|min:3',
            'phone' => 'required|max:12|min:10',
            'shop_name' => 'required|string|max:255',
            'address' => 'required|string'

        ]);

        
    $dataS = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'phone_number' => $request->phone,
        'shop_name' => $request->shop_name,
        'address' => $request->address,
        'role' => 'seller',

    ]);

    $dataS->save();
    Auth::login($dataS);
    return view('seller/sellerHome');
    }

    ////seller login

    public function sellerLogin(Request $request){
        $credentials = $request->validate([
            'login_email' => 'required|email',
            'login_password' => 'required',
        ]);

        if (Auth::attempt(['email' => $credentials['login_email'], 
                            'password' => $credentials['login_password'], 
                            'role' => 'seller'])) {
            $request->session()->regenerate();
            return redirect('seller/sellerHome');
        }

        return back()->withErrors([
            'login_email' => 'check your email and password and try again.',
        ]);
    }
}
