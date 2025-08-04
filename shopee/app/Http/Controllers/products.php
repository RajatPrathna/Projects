<?php

namespace App\Http\Controllers;
use \App\Models\product;
use Illuminate\Http\Request;


class products extends Controller
{
    public function index()
    {
        return view('admin/Aproducts');
    }

    public function addProducts(Request $Request)
    {
       
        $Request->validate([
            'productName' => 'required|max:50',
            'category' => 'required',
            'price' => 'max:50',
            'stock' => 'max:50',
            'weight' => 'max:50',
            'description' => 'required|max:200',
            'productImages' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'max:5', 
            'type' => 'max:10', 
            
        ]);
        dd($Request->all());
        product::create([
            'product_name' =>$Request['productName'],
            'category' =>$Request['category'],
            'price' =>$Request['price'],
            'stock' =>$Request['stock'],
            'weight' =>$Request['weight'],
            'description' =>$Request['description'],
            'image' =>$Request['productImage'],
            'status' =>$Request['status'][0],
            'type'=> $Request['type'],
        ]);
        
        // return ("product added successfully");
        // return redirect()->back()->with("Product added successfully!");    
    }
}
