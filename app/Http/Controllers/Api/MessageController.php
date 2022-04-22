<?php

namespace App\Http\Controllers\Api;

use App\Events\Messages\NewMessage;
use App\Http\Controllers\Controller;
use App\Repository\MessageRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller
{
    public function messages(MessageRepository $repository): JsonResponse
    {
        return response()->json($repository->all());
    }

    public function navMessages(MessageRepository $repository): JsonResponse
    {
        return response()->json($repository->navMessages());
    }

    public function getMessagesFor(MessageRepository $repository, int $id): JsonResponse
    {
        return response()->json($repository->getFor($id));
    }

    public function store(Request $request, MessageRepository $repository): JsonResponse
    {
        $message = $repository->store($request);

        //Notification::send(Auth::user(), new NewMessage($message->load('user')));

        return response()->json($message);
    }
}
