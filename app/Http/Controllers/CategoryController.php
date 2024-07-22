<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::latest()->paginate(6);
        return view('Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $category = $request->validate([
            'name' => ['required', 'max:255', 'unique:categories']
        ]);
        Category::create($category);
        return back()->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::findOrFail($id);
        return view('Category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $category = Category::findOrFail($id);
        $data = $request->validate(['name' => 'required|string|unique:categories']);
        $category->update($data);
        return back()->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        if (!$category) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Category not found.');
        }
        // if ($category->products()->count() > 0) {
        //     Nếu có sản phẩm liên quan, không cho phép xóa
        //     return redirect()->route('category.index')
        //         ->with('error', 'Cannot delete category with products.');
        // }
        //

        $category->delete();
        return redirect()->route('admin.categories.index')
            ->with('success', 'Delete successfully!.');
    }
}
