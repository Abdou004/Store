<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->with('category')->orderBy('created_at','desc')->paginate(3);
        $categories = Category::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::all();
        return view('product.create',compact('product','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $FormFileds = $request->validated();

        if ($request->hasFile('image')) {
            $FormFileds['image'] = $request->file('image')->store('product','public');
        }
        Product::create($FormFileds);

        return to_route('product.index')->with('success','Your Product has successfuly added !');
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
        $categories = Category::all();
        return view('product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $FormFields = $request->Validated();
        if ($request->hasFile('image')) {
            $FormFields['image'] = $request->file('image')->store('product','public');
        }
        $product->update($FormFields);
        return to_route('product.index')->with('success','Your product has updated successfuly !');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('product.index')->with('success' ,'Product deleted Successfuly !');


    }
}
