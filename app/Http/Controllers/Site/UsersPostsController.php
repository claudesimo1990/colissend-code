<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersPostsController extends Controller
{
    public function posts()
    {
        $posts = Auth::user()->posts->where('status');

        return view('app.user.post.index', [
            'posts' => $posts
        ]);
    }
}
