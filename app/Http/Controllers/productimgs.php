<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\productimg;


class productimgs extends Controller
{
    public function viewimg()
    {
        $imgs = productimg::all();
        return view('users.Uproducts',compact('imgs'));
    }
}
