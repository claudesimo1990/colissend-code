<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{

    public function index(Request $request)
    {
        $blogs = Blog::latest()->paginate(4);

        if (!empty($request->get('category'))) {
            $blogs = Blog::latest()->where('category', $request->get('category'))->paginate(4);
        }

        $categories = config('users.categories');

        return view('app.blog.index', [
            'categories' => $categories,
            'blogs' => $blogs
        ]);
    }

    public function show(Blog $blog)
    {
        return view('app.blog.show', [
            'blog' => $blog
        ]);
    }
}
