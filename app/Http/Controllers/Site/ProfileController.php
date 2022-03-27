<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\PasswordRequest;
use App\Http\Requests\Site\ProfileRequest;
use App\Models\User;
use App\Repository\ProfileRepository;
use App\Repository\ReservationRepository;
use App\Services\PasswordChange;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @var ProfileRepository
     */
    private $profileRepository;
    /**
     * @var ReservationRepository
     */
    private $reservationRepository;

    /**
     * @param ProfileRepository $profileRepository
     * @param ReservationRepository $reservationRepository
     */
    public function __construct(ProfileRepository $profileRepository, ReservationRepository $reservationRepository)
    {
        $this->profileRepository = $profileRepository;
        $this->reservationRepository = $reservationRepository;
    }

    /**
     * Display a user Profile
     * @param int $id
     * @return Factory|View
     * @throws BindingResolutionException
     */
    public function show(int $id)
    {
        $profile = $this->profileRepository->find($id);
        $notifications = $this->profileRepository->notifications();
        $reservations = $this->reservationRepository->findByUser(Auth::id());

        return render('app.user.dashboard', array(
            'profile' => $profile,
            'notifications' => $notifications,
            'reservations' => $reservations,
        ));
    }

    public function notifications()
    {
        return $this->profileRepository->notifications();
    }

    public function edit(int $profile, ProfileRequest $request): RedirectResponse
    {
        if (request()->hasFile('avatar') && request()->file('avatar')->isValid()) {
            Auth::user()->updateMedia([], 'avatar');
            Auth::user()->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }

        $this->profileRepository->update($request, $profile);
        request()->attributes->add(['active' => 'edit']);

        return redirect()->back()->with('success', 'Votre compte à été modifier avec success');
    }

    public function changePassword(PasswordRequest $request, PasswordChange $passwordChange): RedirectResponse
    {
        $passwordChange->setPassword($request);

        $request->attributes->add(['active' => 'password']);

        return redirect()->back()->with('success', 'success password changed');
    }
}
