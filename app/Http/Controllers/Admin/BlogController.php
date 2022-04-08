<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    public function create()
    {
        $categories = config('users.categories');

        return view('admin.blog.create', [
            'categories' => $categories
        ]);
    }

    public function index()
    {
        $blogs = Blog::latest()->paginate(10);

        return view('admin.blog.index',[
            'blogs' => $blogs
        ]);
    }

    public function edit(Blog $blog)
    {
        $categories = config('users.categories');

        return view('admin.blog.edit', [
            'categories' => $categories,
            'blog' => $blog
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'image' => 'required',
        ]);

        $blog = Blog::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'category' => $request->get('category'),
            'pub'
        ]);

        if (request()->hasFile('image') && request()->file('image')->isValid()) {
            $blog->addMediaFromRequest('image')->toMediaCollection('blog');
        }

        return redirect()->route('admin.blog.index')->with(['success' => 'sauvegarde reussite!']);

    }

    public function update(Blog $blog, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);

        $blog->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'category' => $request->get('category'),
        ]);

        if (request()->hasFile('image') && request()->file('image')->isValid()) {
            $blog->addMediaFromRequest('image')->toMediaCollection('blog');
        }

        return redirect()->route('admin.blog.index')->with(['success' => 'sauvegarde reussite!']);
    }

    public function publish(Blog $blog)
    {
        $blog->publishedAt = now()->getTimestamp();
        $blog->save();

        return redirect()->route('admin.blog.index')->with(['success' => 'Publier']);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blog.index')->with(['success' => 'Effacer']);
    }
}
