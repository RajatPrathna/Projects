<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function handle(Request $request)
    {
        // Access form data correctly using $request
        $email = $request->input('email');
        

        // For now, just return a simple message
        return view('Uhome');
    }
}
