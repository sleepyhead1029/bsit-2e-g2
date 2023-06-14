<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title'] = 'Shuriten';
        $data['q'] = $request->get('q');
        $data['products'] = Product::where('product_name','like','%'.$data['q'].'%')->get();
        return view('product.index', $data);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Add Customer';
        return view('product.create', $data);
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'product_name' => 'required',
        'category' => 'required',
        'unit' => 'required',
        'in_stock' => 'required',
        'on_order' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $destinationPath = public_path('image/');
        $imageName = $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);
    }

    $product = new Product([
        'product_name' => $request->product_name,
        'category' => $request->category,
        'unit' => $request->unit,
        'in_stock' => $request->in_stock,
        'on_order' => $request->on_order,
        'image' => $imageName,
    ]);

    $product->save();

    return redirect('product')->with('success', 'Product added successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data['title'] = 'Edit Product';
        $data['product'] = $product;
        return view('product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'unit' => 'required',
            'in_stock' => 'required',
            'on_order' => 'required',
            'image' => 'required',
        ]);
    
        
            $product -> product_name = $request->product_name;
            $product -> category = $request->category;
            $product -> unit = $request->unit;
            $product -> in_stock = $request->in_stock;
            $product -> on_order = $request->on_order;
            $product -> image = $request->image;
            
        $product->save();

        return redirect('product')->with('success','Customer edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the product
        $product->delete();

        // Redirect with success message
        return redirect('product')->with('success', 'Product deleted successfully');

    }
}
