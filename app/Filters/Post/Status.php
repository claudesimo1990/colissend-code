<?php

namespace App\Filters\Post;

/**
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */
class Status
{
    public function handle($query, $next)
    {
        return $next($query->where('status', 'ACCEPTED'));
    }

}
