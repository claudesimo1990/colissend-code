<?php

use App\Models\Gallery;
use App\Models\Message;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

if (! function_exists('render')) {

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

    function checkIfAvatarExist(string $file): bool
    {
        if (Storage::disk('public')->exists('avatars/' . $file)) {
            return true;
        }
        return false;
    }

}

if (! function_exists('formatDate')) {

    function formatDate(string $date): string
    {
        return Carbon::parse($date)->format('d.m.y : H:i');
    }

    function birthdayFormat(string $date): string
    {
        return date('Y-m-d', strtotime($date));
    }

     function agoDate(string $date) {

        return Carbon::parse($date)->diffForHumans();
    }
}

if (! function_exists('salutations')) {
    function getSalution() {
        if ((now())->hour > 12) {
            return 'Bonsoir';
        }
        return 'Bonjour';
    }
}

if (! function_exists('getHeaderImage')) {

    function getHeaderImage()
    {
        $header = Gallery::where('content', 'header')->where('active_img', '!=', null)->first();

        $media = $header->getMedia('galleries')->where('uuid', $header->active_img)->first();

        if ($header) {
            return $media->getUrl();
        }

        return asset('images/about/about.jpg');
    }

    function getContactImage()
    {
        $contact = Gallery::where('title', 'contact')->first();

        if ($contact) {
            return $contact->active_img;
        }
        return asset('images/about/about.jpg');
    }

}

function unreadMessages() {
    return Message::where('to', Auth::id())
            ->where('read', false)
            ->get()
            ->count();
}

function generateRandomNumber(): int {
    return str_pad(time(), 15, "0", STR_PAD_LEFT);
}
