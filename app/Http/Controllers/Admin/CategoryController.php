<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display a listing of categories
    public function index()
    {
        $categories = Category::all(); // Retrieve all categories from the database
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store a newly created category in the database
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new category
        Category::create($request->only('name'));

        // Redirect to the category index with a success message
        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully!');
    }

    // Show the form for editing a category
    public function edit($id)
    {
        $category = Category::findOrFail($id); // Find the category by ID
        return view('admin.categories.edit', compact('category'));
    }

    // Update the specified category in the database
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Find the category by ID and update it
        $category = Category::findOrFail($id);
        $category->update($request->only('name'));

        // Redirect to the category index with a success message
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    // Remove the specified category from the database
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}
