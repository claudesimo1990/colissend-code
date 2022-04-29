<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\PasswordRequest;
use App\Http\Requests\Site\ProfileRequest;
use App\Mail\FriendInvitationEmail;
use App\Models\Message;
use App\Models\User;
use App\Repository\ProfileRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function board()
    {
        return view('app.user.profile.board', [
            'profile' => Auth::user()
        ]);
    }

    public function invitation()
    {
        return view('app.user.profile.invitation', [
            'profile' => Auth::user()
        ]);
    }

    public function index()
    {
        return view('app.user.profile.index', [
            'profile' => Auth::user()
        ]);
    }

    public function edit()
    {
        return view('app.user.profile.edit', [
            'profile' => Auth::user()
        ]);
    }

    public function messages()
    {
        $messages = Auth::user()
            ->messages()
            ->latest()
            ->with('user')
            ->get()
            ->sortByDesc('updated_at');

        return view('app.user.profile.messages', [
            'profile' => Auth::user(),
            'messages' => $messages
        ]);
    }

    public function bank()
    {
        return view('app.user.profile.bank', [
            'profile' => Auth::user()
        ]);
    }

    public function paypal()
    {
        return view('app.user.profile.paypal', [
            'profile' => Auth::user()
        ]);
    }

    public function profile()
    {
        return view('app.user.profile.detail', [
            'profile' => Auth::user()
        ]);
    }

    public function password()
    {
        return view('app.user.profile.password', [
            'profile' => Auth::user()
        ]);
    }

    public function update(ProfileRequest $request, ProfileRepository $repository)
    {
        $user = $repository->update($request);

        return redirect()->back()->with(['success' => 'Vos informations ont été sauvegarder avec succés.']);
    }

    public function bankStore()
    {
        // Store Bank Data
    }

    public function passwordStore(PasswordRequest $request)
    {
        if(Hash::check($request->get('current'), Auth::user()->password)) {

            Auth::user()->update([
                'password' => bcrypt($request->get('password'))
            ]);

            return redirect()->back()->with(['success' => 'Votre mot de passe à été modifié']);
        }

        return redirect()->back()->with(['error' => 'Ups! une erruer est souvenue, veuiller verifier vos informations']);
    }

    public function paypalStore()
    {
        // TODO Paypal Data store
    }

    public function invitationSend(Request $request)
    {
        $request->validate([
           'email' => 'required'
        ]);

        Mail::to($request->get('email'))->send(new FriendInvitationEmail());

        return redirect()->back()->with(['success' => 'Un e-mail a été envoyé a votre ami. Merci d agrandir la communauté Colissend :)']);
    }

    public function markAsRead(Message $message)
    {
        $message->update([
           'read' => true,
            'updated_at' => Now()->toDateTime()
        ]);

        return Auth::user()->messages;
    }

    public function markAllAsRead(Message $message)
    {
        Auth::user()->messages->each(function ($message){
            $message->update([
                'read' => true
            ]);
        });

        return redirect()->back();
    }

    public function deleteMessage(Message $message)
    {
        $message->delete();

        return redirect()->back();
    }
}
