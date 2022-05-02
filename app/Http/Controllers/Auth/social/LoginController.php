<?php

/**
 * @package App\Http\Controllers\Auth\social
 * @author Claude Simo <claudesimo1990@gmail.com>
 * @copyright COLISSEND GMBH
 * @license proprietary
 */

namespace App\Http\Controllers\Auth\social;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\Request;

class LoginController
{

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function googleCallBack(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();
            $isUser = User::where('email', $user->email)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect('/');
            }else{
                $createUser = User::create([
                    'firstname' => $user->name,
                    'lastname' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'email_verified_at' => Carbon::now(),
                    'confirmation_token' => null,
                    'password' => encrypt($user->name),
                    'last_connexion' => now()->toDateTime()
                ]);

                Auth::login($createUser);

                return redirect('/user/profile/' . $createUser->id)->with(['success' => 'Votre compte à été enregistrer avec success, veuillez completer ces informations et aussi un mot de passe']);
            }

        } catch (Exception $exception) {
            echo($exception->getMessage());
        }

        return back();
    }

    public function facebookCallBack(Request $request)
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('email', $user->email)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect('/');
            }else{
                $createUser = User::create([
                    'firstname' => $user->name,
                    'lastname' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => encrypt($user->email),
                    'last_connexion' => now()->toDateTime()
                ]);

                Auth::login($createUser);

                return redirect('/user/profile/' . $createUser->id)->with(['success' => 'Votre compte à été enregistrer avec success, veuillez completer ces informations et aussi un mot de passe']);
            }

        } catch (Exception $exception) {
            echo($exception->getMessage());
        }
    }

}