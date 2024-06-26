<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::paginate(10);
        return view('products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('addproduct', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('products/images', $filename, 'public');
            $validated['image'] = $path;
        }
        Product::create($validated);
        return redirect()->route('products')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('showproduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('editproduct', compact('product', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        $product->update($validated);

        return redirect()->route('products', $product)->with('success', 'Product updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products')->with('success', 'Product deleted successfully.');
    }
}
