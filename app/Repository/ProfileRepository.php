<?php

namespace App\Repository;

use App\Http\Requests\Site\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileRepository
{
    public function update(ProfileRequest $profileRequest)
    {
        Auth::user()->update($profileRequest->except('_token'));

        if (request()->hasFile('avatar') && request()->file('avatar')->isValid()) {
            Auth::user()->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }

        return Auth::user();
    }
}
