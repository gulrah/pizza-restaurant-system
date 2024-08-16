<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');  // Ensure this middleware checks for admin
    }
    public function index()
{
    $menuItems = MenuItem::all(); // Retrieve all menu items from the database
    return view('admin.menu.index', compact('menuItems')); // Return the view with the menu items
}


    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048' // Optional image upload
        ]);

        // Create a new menu item using the validated data
        $menuItem = new MenuItem($request->only(['name', 'description', 'price', 'image']));

        // Check if an image was uploaded and is valid
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Store the image in the public storage under 'menu_images' directory
            $menuItem->image = $request->file('image')->store('menu_images', 'public');
        }

        // Save the new menu item to the database
        $menuItem->save();

        // Redirect to the menu index page with a success message
        return redirect()->route('menu.index')->with('success', 'Menu item added successfully!');
    }
}
