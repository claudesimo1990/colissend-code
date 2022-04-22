<?php

namespace App\Repository;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageRepository
{
    public function all()
    {
        $contacts = User::where('id', '!=', auth()->id())->get();

        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->groupBy('from')
            ->get();
        return $contacts->map(function ($contact) use ($unreadIds) {
               $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
               $contact->unread = $contactUnread ? ['count' => $contactUnread->messages_count,
                'last' => ((Message::where('from', $contact->id)->latest()->limit(1)->get())->first())->content
               ] : 0;
               return $contact;
        })->reject(function ($contact) {
            return $contact->message->count() < 1;
        });
    }

    public function navMessages()
    {
       return Message::where('to', Auth::id())->where('read', false)->with('user')->latest()->get();
    }

    public function getFor(int $id)
    {
       return Message::all()->load('from');
    }

    public function store($request)
    {
        return Message::create([
            'from' => $request->get('from'),
            'to' => $request->get('to'),
            'content' => $request->get('content')
        ]);
    }
}
