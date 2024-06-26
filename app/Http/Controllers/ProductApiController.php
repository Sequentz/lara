<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products)->resolve();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // $validated = $request->validated();

        // $product = new Product;
        // $product->name = $validated['name'];
        // $product->description = $validated['description'];
        // $product->price = $validated['price'];
        // $product->brand_id = $validated['brand_id'];
        // $product->category_id = $validated['category_id'];
        // $product->image = $validated['image'];

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('products', 'public');
        //     $product->image = $imagePath;
        // }

        // $product->save();

        // return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(StoreProductRequest $request, Product $product)
    // {
    //     $validated = $request->validated();

    //     $product->name = $validated['name'];
    //     $product->description = $validated['description'];
    //     $product->price = $validated['price'];
    //     $product->brand_id = $validated['brand_id'];
    //     $product->category_id = $validated['category_id'];

    //     if ($request->hasFile('image')) {
    //         if ($product->image) {
    //             Storage::disk('public')->delete($product->image);
    //         }
    //         $imagePath = $request->file('image')->store('products', 'public');
    //         $product->image = $imagePath;
    //     }

    //     $product->save();

    //     return new ProductResource($product);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // if ($product->image) {
        //     Storage::disk('public')->delete($product->image);
        // }

        // $product->delete();

        // return response()->json(null, 204);
    }
}
