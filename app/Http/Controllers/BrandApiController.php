<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return BrandResource::collection($brands)->resolve();
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
    public function show(Brand $brand)
    {
        return new BrandResource($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }


    public function getProductsByBrand($name)
    {
        $brand = Brand::where('name', $name)->first();

        if (!$brand) {
            return response()->json(['message' => 'Brand not found'], 404);
        }

        $products = $brand->products;

        return response()->json($products, 200);
    }
}
