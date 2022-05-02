<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\User\UserVerifyEmail;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'avatar' => ['required', 'mimes:jpg,png', 'dimensions:min_width=100,min_height=200'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data): User
    {
        $user = User::create(
            [
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
             'confirmation_token' => Str::random(60),
             'last_connexion' => now()->toDateTime()
            ]
        );

        if (request()->hasFile('avatar') && request()->file('avatar')->isValid()) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }

        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        Notification::send($user, new UserVerifyEmail());

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath())->with('success', 'votre compte a bien ete creer, veuillez confirmer votre compte dans le Mail recue.');
    }

    public function confirmation(User $user, string $token)
    {
        $user = User::where('id', $user->id)->where('confirmation_token', $token)->first();

        if ($user) {
            $user->update([
               'confirmation_token' => null
            ]);

            $this->guard()->login($user);

            return redirect($this->redirectPath())->with('success', 'Votre compte a ete verifier avec success.');

        } else {
            return redirect('/login')->with('Error', 'Ce compte ne peut etre verifié, vueillez creer un compte valable.');
        }
    }
}
