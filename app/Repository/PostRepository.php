<?php

namespace App\Repository;

use App\Http\Requests\Site\PostRequest;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostRepository
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function posts(): LengthAwarePaginator
    {
        return Post::whereStatus('ACCEPTED')
            ->with('user')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);
    }

    public function findById(int $id): Post
    {
        /** @var Post $post */
        $post = $this->post->with('user')->find($id);

        return $post;
    }

    public function showPost(string $slug)
    {
        return $this->post->with('user')->where('slug', $slug)->first();
    }

    public function store(PostRequest $request)
    {
        $post = $this->post->create([
            'user_id' => Auth::id(),
            'referenznumber' => generateRandomNumber(),
            'type' => 'TRAVEL',
            'from' => $request->get('from'),
            'to' => $request->get('to'),
            'dateFrom' => $request->get('dateFrom'),
            'dateTo' => $request->get('dateTo'),
            'content' => $request->get('content'),
            'slug' => Str::slug($request->get('from') . '-' . $request->get('to') . '-' . (Carbon::parse($request->get('dateFrom'))->format('y_m_d'))),
            'kilo' => $request->get('kilo'),
            'objects' => $request->get('objects'),
            'payment' => $request->get('payment'),
            'price' => $request->get('price')/100,
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

    public function storeColi(PostRequest $request): Post
    {
        $post = $this->post->create(
        [
            'user_id' => Auth::id(),
            'referenznumber' => generateRandomNumber(),
            'type' => 'PACKS',
            'from' => $request->get('from'),
            'to' => $request->get('to'),
            'dateFrom' => $request->get('dateFrom'),
            'dateTo' => $request->get('dateTo'),
            'content' => $request->get('content'),
            'slug' => Str::slug($request->get('from') . '-' . $request->get('to') . '-' . (Carbon::parse($request->get('dateFrom'))->format('y_m_d'))),
            'kilo' => 0,
            'objects' => $request->get('objects'),
            'price' => 0,
            'status' => 'PROGRESS'
        ]);

        if (request()->hasFile('coli') && request()->file('coli')->isValid()) {
            $post->addMediaFromRequest('coli')->toMediaCollection('colis');
        }

        return $post;
    }
}
