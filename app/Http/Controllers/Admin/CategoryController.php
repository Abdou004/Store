<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $FormFields = $request->validated();
        Category::create($FormFields);
        return to_route('category.index')->with('success','Category Added Successfuly !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $products = $category->products()->get();
        return view('categories.show',compact('products','category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category, CategoryRequest $request)
    {
        $FormFields = $request->validated();
        
        $category->update($FormFields);

        return to_route('category.index')->with('success','Category Updated Successfuly !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('category.index')->with('success','Category Deleted Successfuly !');
    }
}
