<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Auth\Events\Validated;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productsQuery = Product::with('category');
        $categories = Category::has('products')->get();

        $category =($request->input('category_id'));
        if (!empty($category)) {
            $productsQuery->where('category_id', 'like', '%' .$category .'%');
        }
        $name = ($request->input('name'));
        if (!empty($name)) {
            $productsQuery->where(function ($query) use ($name) {
                $query->where('name', 'like', '%' . $name . '%')
                    ->orWhere('description', 'like', '%' . $name . '%');
            });
        }

        $max = ($request->input('max'));
        if (!empty($max)) {
            $productsQuery->where('price', '<=', $max);
        }
        $min = ($request->input('min'));
        if (!empty($min)) {
            $productsQuery->where('price', '>=', $min);
        }
        $products = $productsQuery->latest()->get();
        return view('store.index',compact('products','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */

}
