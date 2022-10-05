<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repository\PostRepository;
use Illuminate\Pagination\LengthAwarePaginator;
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
     *  get All latest posts
     * @return LengthAwarePaginator
     */
    public function posts(): LengthAwarePaginator
    {
        return $this->postRepository->posts();
    }

    /**
     * @param PostRepository $postRepository
     * @return Response
     */
    public function filter(PostRepository $postRepository): Response
    {
        $posts = $postRepository->search();

        return new Response($posts, 200);
    }
}
