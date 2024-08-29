<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create()
    {
        $categories = Category::all(); // Get all categories to populate a dropdown in the form
        return view('admin.menu.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id', // Validate category_id
        ]);

        $menuItem = new MenuItem($request->only(['name', 'description', 'price', 'image', 'category_id']));

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $menuItem->image = $request->file('image')->store('menu_images', 'public');
        }

        $menuItem->save();

        return redirect()->route('admin.menu.index')->with('success', 'Menu item added successfully!');
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        $query = MenuItem::with('category');

        // Check if there is a category filter
        if ($request->has('category') && $request->input('category') !== '') {
            $category = $request->input('category');
            $query->where('category_id', $category);
        }

        // Get the menu items
        $menuItems = $query->get();

        return view('admin.menu.index', compact('menuItems', 'categories'));
    }
}
