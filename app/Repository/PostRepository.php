<?php

namespace App\Repository;

use App\Http\Requests\Site\PostRequest;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Request;

class PostRepository
{
    /**
     * @var Post
     */
    private $post;

    /**
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * List of all Posts
     * @return mixed
     */
    public function posts()
    {
        return $this->post
            ->latest()
            ->where('status','ACCEPTED')
            ->with('user')
            ->get();
    }

    public function findById(int $id)
    {
        return $this->post->with('user')->find($id);
    }

    /**
     * @param string $slug
     * @return Builder|Model|object|null
     */
    public function showPost(string $slug)
    {
        return $this->post->with('user')->where('slug', $slug)->first();
    }

    public function store(PostRequest $request)
    {
        dd($request->all());
        $post = $this->post->create([
            'user_id' => Auth::id(),
            'type' => 'TRAVEL',
            'from' => $request->get('from'),
            'to' => $request->get('to'),
            'dateFrom' => $request->get('dateFrom'),
            'dateTo' => $request->get('dateTo'),
            'content' => $request->get('content'),
            'slug' => Str::slug($request->get('from') . '-' . $request->get('to') . '-' . (Carbon::parse($request->get('dateFrom'))->format('y_m_d'))),
            'kilo' => $request->get('kilo'),
            'objects' => $request->get('objects'),
            'payments' => $request->get('payment'),
            'price' => $request->get('price'),
            'company' => $request->get('company'),
            'status' => 'PROGRESS'
        ]);

        if (request()->hasFile('ticket') && request()->file('ticket')->isValid()) {
            $post->addMediaFromRequest('ticket')->toMediaCollection('travels');
        }
    }

    public function search(Request $request): Collection
    {
        return Post::with('user')

            ->where(function (Builder $query) use ($request) {

                if ($request->get('type') && $request->get('type') != 'ALL') {
                    $query->where('type', $request->get('type'));
                }

                if ($request->get('from')) {
                    $query->where('from', 'LIKE', '%'. $request->get('from') .'%');
                }

                if ($request->get('to')) {
                    $query->where('to', 'LIKE', '%'. $request->get('to') .'%');
                }

                if ($request->get('dateFrom')) {
                    $query->where('dateFrom','<=', Carbon::parse($request->get('dateFrom')));
                }
            })->get();
    }

    public function getLastTreePosts()
    {
        return $this->post
            ->latest()
            ->where('status','ACCEPTED')
            ->with('user')
            ->limit(3)
            ->get();
    }

    /**
     * @param PostRequest $request
     * @return void
     */
    public function storeColi(PostRequest $request)
    {
        $post = $this->post->create(
        [
            'user_id' => Auth::id(),
            'type' => 'PACKS',
            'from' => $request->get('from'),
            'to' => $request->get('to'),
            'dateFrom' => $request->get('dateFrom'),
            'dateTo' => $request->get('dateTo'),
            'content' => $request->get('content'),
            'slug' => Str::slug($request->get('from') . '-' . $request->get('to') . '-' . (Carbon::parse($request->get('dateFrom'))->format('y_m_d'))),
            'kilo' => $request->get('kilo'),
            'objects' => $request->get('objects'),
            'price' => 0,
            'status' => 'PROGRESS'
        ]);

        if (request()->hasFile('coli') && request()->file('coli')->isValid()) {
            $post->addMediaFromRequest('coli')->toMediaCollection('colis');
        }
    }
}
