<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class users extends Controller
{
    public function gmail(Request $request)
    {
        $signup=$request->validate([
            'gmail' => 'required|email',
            'password' => 'required|max:255',
         ]);
                               
        $login_at_signup=User::create([
            'email' => $signup['gmail'],
            'password' =>$signup['password'],
        ]);
        auth()->login($login_at_signup);
        return redirect("/");
    }


    //login function
    public function login(Request $request)
    {
        $login=$request->validate([
            'login_email'=> 'reequired|email',
            'login_password' =>'required|min:2,'
        ]);

    //    if(auth()->attempt($login)=
    //    {

    //    }
       return redirect('users/Ulogin')->with('message','Login unsuccessful');

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

