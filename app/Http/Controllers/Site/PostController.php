<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\PostRequest;
use App\Repository\PostRepository;
use App\Repository\PubRepository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{

    public function index(PubRepository $pubRepository)
    {
        return view('app.post.index', array(
            'pubs' => $pubRepository->pubs()
        ));
    }

    public function travel()
    {
        $transportedObjects = config('users.transportedObjects');
        $companies = config('users.flyCompnies');
        $payments = config('users.payments');

        return view('app.post.travel.create', [
            'transportedObjects' => $transportedObjects,
            'companies' => $companies,
            'payments' => $payments
        ]);
    }

    public function coli()
    {
        $coli = config('users.coli');
        $companies = config('users.flyCompnies');

        return view('app.post.coli.create', [
            'coli' => $coli,
            'companies' => $companies
        ]);
    }

    public function storeTravel(PostRequest $request, PostRepository $postRepository): Response
    {
        $postRepository->store($request);

        return new Response('post créé avec succès', 200);
    }

    public function storeColi(PostRequest $request, PostRepository $postRepository): Response
    {
        $postRepository->storeColi($request);

        return new Response('post créé avec succès', 200);
    }

    public function show(string $slug, PostRepository $postRepository)
    {
        return view('app.post.show', [
            'post' => $postRepository->showPost($slug),
            'user' => Auth::user()
        ]);
    }

    public function reservations(string $slug, PostRepository $postRepository)
    {
        return view('app.user.profile.posts.reservations', [
            'post' => $postRepository->showPost($slug)
        ]);
    }
}
