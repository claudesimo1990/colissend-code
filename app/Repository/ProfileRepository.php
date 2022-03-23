<?php

namespace App\Repository;

use App\Http\Requests\Site\ProfileRequest;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileRepository
{
    /**
     * @param ProfileRequest $profileRequest
     * @param int $profileId
     */
    public function update(ProfileRequest $profileRequest, int $profileId)
    {
        $profile = Profile::find($profileId);

        $data = $profileRequest->all();

        if ($profile->avatar) {
            Storage::delete('/public/avatars/' . $profile->avatar);
        }

        $profile->update([
            'avatar' => $data['profile_image'] ?? 'default.jpg',
            'about' => $data['about'],
            'country' => $data['country'],
            'city' => $data['city'],
            'birthday' => $data['birthday'],
            'street' => $data['street'],
            'phone' => $data['phone'],
            'full_name' => $data['fullName'],
            'facebook' => $data['facebook'],
            'instagram' => $data['instagram'],
            'google' => $data['google'],
            'linkedin' => $data['linkedin'],
        ]);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return Profile::find($id);
    }

    public function notifications()
    {
        return Auth::user()->notifications;
    }
}
