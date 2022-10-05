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

class Type
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle($query, $next)
    {
        if (request()->has('type') && request('type') != 'ALL') {
            return $next($query->where('type', request('type')));
        }

        return $next($query);
    }

}
