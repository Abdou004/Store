<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Auth\Events\Validated;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->orderBy('created_at','desc')->paginate();
        return view('store.index',compact('products',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
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

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
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
