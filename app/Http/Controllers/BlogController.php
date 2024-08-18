<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Method to show all blogs
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('blogs.index', compact('blogs'));
    }

    // Method to show a single blog
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }
}
