<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     *get All latest posts
     * @return Response
     */
    public function posts(): Response
    {
        return new Response($this->postRepository->posts(), 200);
    }

    /**
     * @param Request $request
     * @param PostRepository $postRepository
     * @return Response
     */
    public function filter(Request $request, PostRepository $postRepository): Response
    {
        $posts = $postRepository->search($request);

        return new Response($posts, 200);
    }
}
