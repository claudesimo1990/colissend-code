<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{

    public function index(Request $request): Factory|View|Application
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

    public function show(Blog $blog): Factory|View|Application
    {
        return view('app.blog.show', [
            'blog' => $blog
        ]);
    }
}
