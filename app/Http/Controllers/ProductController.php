<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\Common;

class ProductController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('index',compact('products'));
    }
    
    public function index1()
    {
        $products = Product::latest()->get();
        return view('products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_product');
    }
      
    public function about()
    {
        $products = Product::latest()->get();
        return view('about',compact('products'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data= $request->validate([
        'title'=>'required|string',
        'price' =>'required|numeric',
        'short_description' => 'required|string|max:100',
        'image' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
       ]);
       $data['image'] = $this->uploadFile( $request->image,'asset/images/products/');
       Product::create($data);
       return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product_details', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product =Product::findOrFail($id);
        return view('edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'short_description' => 'required|string|max:100',
            'price' => 'required|numeric',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:2048',
            
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile( $request->image,'asset/images/products/');
        }
    
        Product::where('id', $id)->update($data);
        return redirect()->route('products.index1');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
