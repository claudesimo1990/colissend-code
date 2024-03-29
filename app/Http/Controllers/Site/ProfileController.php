<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\PasswordRequest;
use App\Http\Requests\Site\ProfileRequest;
use App\Mail\FriendInvitationEmail;
use App\Models\Country;
use App\Models\Message;
use App\Models\Reservation;
use App\Models\User;
use App\Repository\ProfileRepository;
use App\Repository\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    public function board(): Factory|View|Application
    {
        return view('app.user.profile.board', [
            'profile' => Auth::user()
        ]);
    }

    public function invitation(): Factory|View|Application
    {
        return view('app.user.profile.invitation', [
            'profile' => Auth::user()
        ]);
    }

    public function index(): Factory|View|Application
    {
        return view('app.user.profile.index', [
            'profile' => Auth::user()
        ]);
    }

    public function edit(): Factory|View|Application
    {
        return view('app.user.profile.edit', [
            'profile' => Auth::user(),
            'countries' => Country::all()
        ]);
    }

    public function messages(): Factory|View|Application
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

    public function notifications(): Factory|View|Application
    {
        return view('app.user.profile.notifications', [
            'profile' => Auth::user(),
            'notifications' => Auth::user()->notifications
        ]);
    }

    public function bank(): Factory|View|Application
    {
        return view('app.user.profile.bank', [
            'profile' => Auth::user()
        ]);
    }

    public function paypal(): Factory|View|Application
    {
        return view('app.user.profile.paypal', [
            'profile' => Auth::user()
        ]);
    }

    public function paypalStore(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'paypal_name' => 'required',
            'paypal_email' => 'required'
        ]);

        $this->userRepository->updatePaypalAccount($request->only('paypal_name', 'paypal_email'));

        return redirect()->back()->with(['success' => 'Votre données ont été sauvegarder.']);
    }

    public function profile(): Factory|View|Application
    {
        return view('app.user.profile.detail', [
            'profile' => Auth::user()
        ]);
    }

    public function password(): Factory|View|Application
    {
        return view('app.user.profile.password', [
            'profile' => Auth::user()
        ]);
    }

    public function update(ProfileRequest $request, ProfileRepository $repository): \Illuminate\Http\RedirectResponse
    {
        $user = $repository->update($request);

        return redirect()->back()->with(['success' => 'Vos informations ont été sauvegarder avec succés.']);
    }

    public function bankStore(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'bank_address_1' => 'required',
            'bank_postal_code' => 'required',
            'bank_city' => 'required',
            'bank_owner' => 'required',
            'bank_iban' => 'required',
        ]);

        $this->userRepository->updateBankAccount($request->only('bank_address_1', 'bank_address_2' ,'bank_address_2' ,'bank_postal_code' ,'bank_city' ,'bank_owner' ,'bank_iban'));

        return redirect()->back()->with(['success' => 'Votre données ont été sauvegarder.']);
    }

    public function passwordStore(PasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        if(Hash::check($request->get('current'), Auth::user()->password)) {

            Auth::user()->update([
                'password' => bcrypt($request->get('password'))
            ]);

            return redirect()->back()->with(['success' => 'Votre mot de passe à été modifié']);
        }

        return redirect()->back()->with(['error' => 'Ups! une erruer est souvenue, veuiller verifier vos informations']);
    }

    public function invitationSend(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
           'email' => 'required'
        ]);

        Mail::to($request->get('email'))->send(new FriendInvitationEmail());

        return redirect()->back()->with(['success' => 'Un e-mail a été envoyé a votre ami. Merci d agrandir la communauté Colissend.']);
    }

    public function markAsRead(Message $message)
    {
        $message->update([
           'read' => true,
            'updated_at' => Now()->toDateTime()
        ]);

        return Auth::user()->messages;
    }

    public function markAllAsRead(Message $message): \Illuminate\Http\RedirectResponse
    {
        Auth::user()->messages->each(function ($message){
            $message->update([
                'read' => true
            ]);
        });

        return redirect()->back();
    }

    public function deleteMessage(Message $message): \Illuminate\Http\RedirectResponse
    {
        $message->delete();

        return redirect()->back();
    }
}
