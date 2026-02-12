<?php

namespace App\Http\Controllers;
use App\Models\productimg;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class productimgs extends Controller
{
    public function viewimg()
    {
        $imgs = productimg::all();
        return view('users.Uproducts',compact('imgs'));
    }
}
