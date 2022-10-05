<?php
/**
 * @package App\Filters\Post
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */

namespace App\Filters\Post;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class From
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle($query, $next)
    {
        if (!empty(request('from'))) {
            return $next($query->where('from', 'LIKE', '%'. request('from') .'%'));
        }
//        return Post::with('user')
//
//            ->where(function (Builder $query) use ($request) {
//
//                if ($request->get('type') && $request->get('type') != 'ALL') {
//                    $query->where('type', $request->get('type'));
//                }
//
//                if ($request->get('from')) {
//                    $query->where('from', 'LIKE', '%'. $request->get('from') .'%');
//                }
//
//                if ($request->get('to')) {
//                    $query->where('to', 'LIKE', '%'. $request->get('to') .'%');
//                }
//
//                if ($request->get('dateFrom')) {
//                    $query->where('dateFrom','<=', Carbon::parse($request->get('dateFrom')));
//                }
//            })->get();

        return $next($query);
    }

}
