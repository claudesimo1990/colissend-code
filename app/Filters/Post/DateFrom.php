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

class DateFrom
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle($query, $next)
    {
        if (!empty(request('dateFrom'))) {
            return $next($query->where('dateFrom','<=', Carbon::parse(request('dateFrom'))));
        }

        return $next($query);
    }

}
