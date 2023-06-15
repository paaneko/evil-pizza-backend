<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $category)
    {
        //
    }

    /**
     * Display the specified resource by category.
     */
    public function byCategory(string $category)
    {
        return ProductResource::collection(
            Product::with('category', 'sub_category', 'dough_specs', 'size_specs', 'ingredients', 'toppings')
                ->whereHas('category', function ($query) use ($category) {
                    $query->where('slug', $category);
                })->get()
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
