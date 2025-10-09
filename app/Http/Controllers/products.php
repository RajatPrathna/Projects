<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\productimg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class products extends Controller
{
    public function index()
    {
        $prod = product::with('images')->paginate(20);;
        $totalProducts = product::count();
        $lowStock=product::where('stock','<=',10)->count(); 
        $activeProducts = product::where('status','1')->count();
        return view('admin.Aproducts',compact('prod','totalProducts','activeProducts','lowStock',));
        //return view('admin.Aproducts', ['prod' => $productimgs, 'totalProducts' => $totalProducts,
        //'activeProducts'=>$activeProdcts,'lowStock'=>$lowStock]);
    }

    
    public function toggleStatus(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Get new status from AJAX
        $newStatus = $request->input('status');

        // Update and save
        $product->status = $newStatus;
        $product->save();
        return response()->json([
            'success' => true,
            'status' => $product->status,
        ]);
        
    }

    public function addProducts(Request $Request)
    {
        
        $Request->validate([
            'productName' => 'required|max:50',
            'category' => 'required',
            'price' => 'max:50',
            'stock' => 'max:50',
            'weight' => 'max:50',
            'description' => 'max:500',
            'productImages.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'status' => 'max:5', 
            'type' => 'max:15', 
        ]);
        
        // $imagePath = $Request->file('productImages')->store('images', 'public');      for single image storage
        
        $save=product::create([
            'product_name' =>$Request['productName'],
            'category' =>$Request['category'],
            'price' =>$Request['price'],
            'stock' =>$Request['stock'],
            'weight' =>$Request['weight'],
            'description' =>$Request['description'],
            'type'=> $Request['type'],
            'status' =>$Request['status'][0],
            
        ]);
        

        if ($Request->hasFile('productImages')) {                          // for multiple image storage
            foreach ($Request->file('productImages') as $image) {
                $imagePath = $image->store('images', 'public');

                productimg::create([
                    'product_id' => $save->id,
                    'image' => $imagePath,
                ]);
            }
        }
        return back()->withsuccess("Product added successfully!"); 
    }

    ////edit product

    public function editProducts($id)
    {
        $products = product::findOrFail($id);
        $totalProducts = product::count();  
        if (!$products) {
            return redirect()->back()->withErrors('Product not found.');
        }
        return view("admin.AeditProducts",compact('products','totalProducts'));
        
    }

    /////update product
    public function updateProducts(Request $request,$id)
    {
        
        $request->validate([
            'productName' => 'max:50',
            'category' => 'max:50',
            'productPrice' => 'max:50',
            'productStock' => 'max:50',
            'productWeight' => 'max:50',
            'description' => 'max:500',
            'productStatus' => 'max:10', 
        ]);
        dd($request->all());
        $id->update([
            'product_name' => $request->input('productName'),
            'category' => $request->input('category'),
            'price' => $request->input('productPrice'),
            'stock' => $request->input('productStock'),
            'weight' => $request->input('productWeight'),
            'description' => $request->input('description'),
            'status' => $request->input('productStatus')[0],
        ]);

        return redirect()->route('Aproducts')->with('success', 'Product updated successfully!');
    }


    ////delete product

    public function deleteProducts($id)
    {
        $product = product::findOrFail($id);
        $product->delete();
        return back()->withsuccess("Product deleted successfully!");
        // return view('admin.Aproducts');
    }
}
