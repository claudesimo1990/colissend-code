<?php

namespace App\Http\Controllers\Auth;

use App\Events\Hallo;
use App\Http\Controllers\Controller;
use App\Notifications\User\UserVerifyEmail;
use App\Notifications\User\WelcomeNotification;
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
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make(
            $data,
            [
            'name' => ['required', 'string', 'max:255'],
//            'avatar' => ['required', 'mimes:jpg,png', 'dimensions:min_width=100,min_height=200'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data): User
    {
        $user = User::create(
            [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
             'confirmation_token' => Str::random(60)
            ]
        );

        if (request()->hasFile('avatar') && request()->file('avatar')->isValid()) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }

        $user->profile()->create([
            'avatar' => '/images/colissend/default.svg',
            'full_name' => $user->name
        ])->save();

        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     * @throws ValidationException
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

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
