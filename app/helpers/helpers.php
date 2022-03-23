<?php

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

if (! function_exists('render')) {
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param string|null $view
     * @param Arrayable|array $data
     * @param array $mergeData
     * @return View|ViewFactory
     * @throws BindingResolutionException
     */
    function render(string $view = null, $data = [], array $mergeData = [])
    {
        $factory = app(ViewFactory::class);

        if (func_num_args() === 0) {
            return $factory;
        }

        return $factory->make($view, $data, $mergeData);
    }
}

if (! function_exists('checkIfAvatarExist')) {

    /**
     * @param string $file
     * @return bool
     */
    function checkIfAvatarExist(string $file): bool
    {
        if (Storage::disk('public')->exists('avatars/' . $file)) {
            return true;
        }
        return false;
    }

}

if (! function_exists('formatDate')) {

    /**
     * @param string $date
     * @return string
     */
    function formatDate(string $date): string
    {
        return Carbon::parse($date)->format('d.m.y à H:i');
    }

}
