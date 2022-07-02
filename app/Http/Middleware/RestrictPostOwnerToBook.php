<?php

namespace App\Http\Middleware;

use App\Exceptions\OwnerPostCanNotBook;
use App\Repository\PostRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestrictPostOwnerToBook
{
    /**
     * @var PostRepository
     */
    private $repository;

    /**
     * @param PostRepository $repository
     */
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!is_null($this->repository->findById($request->get('id')))) {

            $currentUser = Auth::user();
            $postUser = $this->repository->findById($request->get('id'))->user;


        }

        return $next($request);
    }
}
