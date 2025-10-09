<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract class Controller
{
    public function handle(Request $request)
    {
        $email = $request->input('email');
        return view('Uhome');
    }
}
