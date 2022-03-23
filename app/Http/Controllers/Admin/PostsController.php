<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Notifications\Admin\NotifyUserPostPublished;
use App\Notifications\Admin\NotifyUserPostRejected;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PostsController extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    public function travel()
    {
        $travels = Post::where('type', 'TRAVEL')->latest()->paginate(8);

        return render('admin.posts.travels.index', [
            'travels' => $travels
        ]);
    }

    /**
     * @throws BindingResolutionException
     */
    public function packs()
    {
        $packs = Post::where('type', 'PACKS')->latest()->paginate(8);

        return render('admin.posts.packs.index', [
            'packs' => $packs
        ]);
    }

    public function postAccepted(Post $post): RedirectResponse
    {
        $post->update([
           'status' => 'ACCEPTED'
        ]);

        Notification::send($post->user, new NotifyUserPostPublished($post));

        return redirect()->back()->with('success', 'succesfully updated');
    }

    public function postRejected(Post $post): RedirectResponse
    {
        $post->update([
            'status' => 'REJECTED'
        ]);

        Notification::send($post->user, new NotifyUserPostRejected($post));

        return redirect()->back()->with('success', 'succesfully updated');
    }
}
