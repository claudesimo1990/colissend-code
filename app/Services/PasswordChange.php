<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;

class PasswordChange
{
    public function setPassword(Request $request): bool
    {
        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->get('password'), $hashedPassword)) {
            Auth::user()->update([
               'password' => bcrypt($request->get('password'))
            ]);

            return true;
        }

        return false;
    }
}
