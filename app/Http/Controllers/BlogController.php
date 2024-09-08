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
    public function show($id)
{
    // Find the blog post by ID
    $blog = Blog::findOrFail($id);

    // Increment the view count by 1
    $blog->increment('views');

    // Return the view with the blog data
    return view('blogs.show', compact('blog'));
}

}
