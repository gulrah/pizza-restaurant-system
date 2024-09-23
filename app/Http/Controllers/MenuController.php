<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $query = MenuItem::query();

        if ($request->has('search') && $request->input('search') !== '') {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        $menuItems = $query->get();

        return view('menu.index', compact('menuItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048'
        ]);

        $menuItem = new MenuItem($request->only(['name', 'description', 'price', 'category_id', 'image']));

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $menuItem->image = $request->file('image')->store('menu_images', 'public');
        }

        $menuItem->save();

        return redirect()->route('admin.menu.index')->with('success', 'Menu item added successfully!');
    }
}
