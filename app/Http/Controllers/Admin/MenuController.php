<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuItem;
use App\Http\Controllers\Admin\Storage;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    public function create()
    {
        $categories = Category::all(); 
        return view('admin.menu.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'discount_percentage' => 'nullable|numeric|min:0|max:100',
        'image' => 'nullable|image|max:2048',
        'category_id' => 'nullable|exists:categories,id',
    ]);

    $menuItem = new MenuItem($request->only(['name', 'description', 'price', 'discount_percentage', 'image', 'category_id']));

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $menuItem->image = $request->file('image')->store('menu_images', 'public');
    }

    $menuItem->save();

    return redirect()->route('admin.menu.index')->with('success', 'Menu item added successfully with discount!');
}
    

    public function index(Request $request)
    {
        $categories = Category::all();
        $query = MenuItem::with('category');

        if ($request->has('category') && $request->input('category') !== '') {
            $category = $request->input('category');
            $query->where('category_id', $category);
        }

        $menuItems = $query->get();

        return view('admin.menu.index', compact('menuItems', 'categories'));
    }
    public function edit($id)
{
    $menuItem = MenuItem::findOrFail($id);
    $categories = Category::all();

    return view('admin.menu.edit', compact('menuItem', 'categories'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'discount_percentage' => 'nullable|numeric|min:0|max:100',
        'category_id' => 'nullable|exists:categories,id',
        'image' => 'nullable|image|max:2048',
    ]);

    $menuItem = MenuItem::findOrFail($id);

    $menuItem->update($request->only(['name', 'description', 'price', 'discount_percentage', 'category_id']));

    if ($request->hasFile('image')) {
        if ($menuItem->image) {
            Storage::delete($menuItem->image);
        }
        $menuItem->image = $request->file('image')->store('menu_images', 'public');
    }

    return redirect()->route('admin.menu.index')->with('success', 'Menu item updated with discount successfully.');
}
public function destroy($id)
{
    $menuItem = MenuItem::findOrFail($id);

    if ($menuItem->image) {
        \Storage::disk('public')->delete($menuItem->image);
    }

    $menuItem->delete();

    return redirect()->route('admin.menu.index')->with('success', 'Menu item deleted successfully.');
}
}
