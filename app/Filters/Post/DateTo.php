<?php
/**
 * @package App\Filters\Post
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */

namespace App\Filters\Post;

use Carbon\Carbon;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class DateTo
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle($query, $next)
    {
        if (!empty(request('dateTo'))) {
            return $next($query->where('dateTo','<=', Carbon::parse(request('dateTo'))));
        }

        return $next($query);
    }

}
