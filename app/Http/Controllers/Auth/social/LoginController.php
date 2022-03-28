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
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

    public function googleCallBack()
    {
        try {
            $user = Socialite::driver('google')->user();
            $isUser = User::where('email', $user->email)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect('/');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'email_verified_at' => Carbon::now(),
                    'confirmation_token' => null,
                    'password' => encrypt($user->name)
                ]);

                $createUser->profile()->create([
                    'avatar' => $user->avatar,
                    'full_name' => $user->name
                ])->save();

                Auth::login($createUser);

                return redirect('/')->with(['success' => 'Votre compte à été enregistrer avec success']);
            }

        } catch (Exception $exception) {
            echo($exception->getMessage());
        }

        return back();
    }

    public function facebookCallBack()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('email', $user->email)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect('/');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => encrypt($user->email)
                ]);

                $createUser->profile()->create([
                    'avatar' => $user->avatar,
                    'full_name' => $user->name
                ])->save();

                Auth::login($createUser);

                return redirect('/')->with(['success' => 'Votre compte à été enregistrer avec success']);
            }

        } catch (Exception $exception) {
            echo($exception->getMessage());
        }
    }

}