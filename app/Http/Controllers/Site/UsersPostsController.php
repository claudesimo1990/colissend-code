<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class UsersPostsController extends Controller
{
    public function travels(): Factory|View|Application
    {
        $travels = Auth::user()->posts->where('type', 'TRAVEL');
        return view('app.user.profile.posts.travel.index', compact('travels'));
    }

    public function packs(): Factory|View|Application
    {
        $colis = Auth::user()->posts->where('type', 'PACKS');
        return view('app.user.profile.posts.colis.index', compact('colis'));
    }

    public function bookings(): Factory|View|Application
    {
        $reservations = Auth::user()->reservations()->paginate(5);
        return view('app.user.profile.posts.booking', compact('reservations'));
    }

    public function payments(): Factory|View|Application
    {
        return view('app.user.profile.payments', [
            'payments' => Auth::user()->reservations->first()->payments()->paginate(2)
        ]);
    }
}
