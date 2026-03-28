<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Twilio\Rest\Client;

use function Symfony\Component\String\s;

class SellerC extends Controller
{

    public function sellerOrderedProducts(){
        $products=Product::with('images','orders')->where('seller_id',Auth::id())->get();
        // dd($products);
        return view('seller/sellerOrders',compact('products'));
    }


    public function sellerProducts(){
        $products = Product::with('images', 'orders')->where('seller_id', Auth::id())->get();
        return view('seller.sellerProducts', compact('products',));
    } 

//////////////////////////////////////////////// seller registration
    public function sendOTP(Request $request){

        $request->validate([
            'seller_phone' => 'required',
        ]);

        if(User::where('phone_number',$request->seller_phone)->exists()){
            return redirect('seller/sellerLogin')->with(['seller_phone' => 'Phone number already registered. Please log in.']);
        }
        else{
            $otp = rand(100000, 999999);
            session([
                'otp' => $otp,
                'phone' => $request->seller_phone
            ]);

            $sid = config('services.twilio.sid');
            $token = config('services.twilio.token');
            $from = config('services.twilio.from');
            $twilio = new Client($sid, $token);
            $twilio->messages->create(
                $request->seller_phone, // must be like +91XXXXXXXXXX
                [
                    'from' => $from,
                    'body' => "Your OTP is: $otp"
                ]
            );
            return redirect('seller/sellerMatchOTP')->with('success', 'OTP sent successfully!');
        }
    }


    public function matchotp(Request $request){
        $request->validate([
            'otp' => 'required'
        ]);
        $enteredOtp = implode('', $request->otp);

        if($enteredOtp==session('otp')){
            session()->forget('otp'); 
            session()->put('otp_verified', true);

            return redirect('seller/sellerDetails');
        } else {
            return back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }
    }

  
    public function sellerDetails(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email' => 'required|email|unique:Users,email',
            // 'password' => 'required|string|min:8|confirmed',
            // 'confirm_password' => 'required|string|min:8|same:password',
        ]);

        if (!session('otp_verified')) {
            return redirect('seller/sellerMatchOTP')->withErrors(['otp' => 'Please verify your OTP first.']);
        }

        $seller_phone = session('phone');

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $seller_phone,
            'role' => 'seller',
        ]);

        Auth::login($data);
        session()->forget(['otp_verified', 'phone']);
        return redirect('seller/sellerHome');
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
