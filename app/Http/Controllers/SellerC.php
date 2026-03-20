<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

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


/////////////// google login for sellers

   public function Loginredirect(Request $request)
    {
        return Socialite::driver('google')
        ->redirectUrl('http://localhost:8000/auth/googlelogin/callback')
        ->redirect();
    }

    public function Logincallback(Request $request)
    {
        try {

        $user = Socialite::driver('google')
        ->redirectUrl('http://localhost:8000/auth/googlelogin/callback')
        ->user();

            $existingUser = User::where('email', $user->getEmail())->first();

            if ($existingUser) {
                Auth::Login($existingUser);
                return redirect('/seller/dashboard');
            } 
            
            else {
                return redirect('/seller/signup')->withErrors(['email' => 'No account found with this email. Please sign up first.']);
            }
        }
         
        catch (\Throwable $e) {
            dd([
                'exception' => get_class($e),
                'message' => $e->getMessage(),
                'session' => session()->all(),
                'request_state' => request()->get('state'),
                'session_state' => session('state')
                
            ]);
        }
    }
}
