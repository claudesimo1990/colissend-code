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

class To
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle($query, $next)
    {
        if (!empty(request('to'))) {
            return $next($query->where('to', 'LIKE', '%'. request('to') .'%'));
        }

        return $next($query);
    }

}
