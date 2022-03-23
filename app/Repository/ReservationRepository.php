<?php

/**
 * @package App\Repository
 * @author Claude Simo <claudesimo1990@gmail.com>
 * @copyright COLISSEND GMBH
 * @license proprietary
 */

namespace App\Repository;

use App\Http\Requests\ReservationRequest;
use App\Models\Post;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationRepository
{
    /**
     * @var Reservation
     */
    private $reservation;

    /**
     * @param Reservation $reservation
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function store(ReservationRequest $request, Post $post)
    {
           return Reservation::create([
                   'post_id'  => $post->id,
                   'user_id'  => Auth::id(),
                   'message'  => $request->get('message'),
                   'kilo'  => $request->get('kilo'),
                   'price'  => $request->get('price'),
                   'objects'  => $request->get('objects'),
                   'status'  => 'PROGRESS'
           ]);
    }

    public function findByUser(int $id)
    {
        return $this->reservation->where('user_id', $id)->with('post')->get();
    }
}
