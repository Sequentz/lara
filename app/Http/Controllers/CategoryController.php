<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $categories = Category::sortable()->paginate(10);
        return view('categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        $category = new Category;
        $category->name = $validated['name'];
        $category->description = $validated['description'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        $category->save();

        return redirect()->route('categories')->with('success', 'Category created successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('showcategory', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('editcategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        $category->name = $validated['name'];
        $category->description = $validated['description'];

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        $category->save();

        return redirect()->route('categories')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();

        return redirect()->route('categories')->with('success', 'Category deleted successfully!');
    }
}
