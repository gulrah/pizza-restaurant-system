<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('blogs.index', compact('blogs'));
    }

    public function show($id)
{
    $blog = Blog::findOrFail($id);

    $blog->increment('views');

    return view('blogs.show', compact('blog'));
}

}
