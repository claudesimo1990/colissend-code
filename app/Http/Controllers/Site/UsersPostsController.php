<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersPostsController extends Controller
{
    public function travels()
    {
        $travels = Auth::user()->posts->where('type', 'TRAVEL');
        return view('app.user.profile.posts.travel.index', compact('travels'));
    }

    public function packs()
    {
        $colis = Auth::user()->posts->where('type', 'PACKS');
        return view('app.user.profile.posts.colis.index', compact('colis'));
    }

    public function bookings()
    {
        $reservations = Auth::user()->reservations()->paginate(5);
        return view('app.user.profile.posts.booking', compact('reservations'));
    }
}
