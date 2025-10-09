<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class users extends Controller
{
    //signup function
    public function gmail(Request $request)
    {
        $signup=$request->validate([
            'gmail' => 'required|email',
            'password' => 'required|max:255',
         ]);

        $existingUser = User::where('email', $signup['gmail'])->first();
        if($existingUser){
            return redirect("users/Ulogin")->withErrors(['duplicate_gmail' => 'This Gmail address is already registered.Please login here.'])
                ->onlyInput('duplicate_gmail');
        }  
        else{               
            $login_at_signup=User::create([
                'email' => $signup['gmail'],
                'password' =>Hash::make($signup['password']),
            ]);
            auth()->guard()->login($login_at_signup);
            return redirect("/");
        }
    }

    //login function
    public function login(Request $request)
    {
        $login=$request->validate([
            'login_email'=> 'required|email',
            'login_password' =>'required|min:2,'
        ]);
        //this is checks if the email exists in the database if not it redirects to signup page with error message
        $userExists = \App\Models\User::where('email', $login['login_email'])->exists();
        if (!$userExists) {
            return redirect("users/Usignup")->withErrors(['login_email' => 'This email is not registered,you can signup to create a new account',])
            ->onlyInput('login_email');
        }

       if(auth()->guard()->attempt(['email'=>$login['login_email'],'password'=>$login['login_password']]))       {
        $request->session()->regenerate();
        return redirect('/')->with('success', 'Login successful!');
       }
        else{
            return back()->withErrors(['login_email' => 'Invalid email or password.',])->onlyInput('login_email');
        }
    }

    //logout function
    public function logout(){
        auth()->guard()->logout();
        return redirect('/');
    }


    //view user details
    public function user_details(){
        $user = auth()->guard()->user();
        return view('users.Udetails', compact('user'));
        dd($user);
    }

            //edit details

        // public function details(request $request){
        //     $request->validate([
        //         'name' => 'required|max:50|min:3',
        //         'lastname' => 'required|max:50|min:3',
        //         'email' => 'email',
        //         'phonenumber' =>'required|max:15|min:10',
        //         'address' => 'required |max:100|min:5',
        //     ]);
        // }
    }

