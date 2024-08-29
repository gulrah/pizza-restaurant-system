<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $query = MenuItem::query();

        // Check if there is a search term
        if ($request->has('search') && $request->input('search') !== '') {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        // Get the menu items
        $menuItems = $query->get();

        return view('menu.index', compact('menuItems'));
    }
    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id', // Ensure the category exists
        'image' => 'nullable|image|max:2048' // Optional image upload
    ]);

    // Create a new menu item using the validated data
    $menuItem = new MenuItem($request->only(['name', 'description', 'price', 'category_id', 'image']));

    // Check if an image was uploaded and is valid
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Store the image in the public storage under 'menu_images' directory
        $menuItem->image = $request->file('image')->store('menu_images', 'public');
    }

    // Save the new menu item to the database
    $menuItem->save();

    // Redirect to the menu index page with a success message
    return redirect()->route('admin.menu.index')->with('success', 'Menu item added successfully!');
}
}
