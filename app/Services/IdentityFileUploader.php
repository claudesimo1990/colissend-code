<?php

/**
 * @package App\Services
 * @author Claude Simo <claudesimo1990@gmail.com>
 * @copyright COLISSEND GMBH
 * @license proprietary
 */

namespace App\Services;

use App\Models\Identity;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class IdentityFileUploader
{
    public function upload(Request $request)
    {
        if (request()->hasFile('identity') && request()->file('identity')->isValid()) {
            $identity = (new Identity())->create([
                'name' => $request->get('category'),
                'user_id' => Auth::id()
            ]);

            $identity->addMediaFromRequest('identity')->toMediaCollection('identities');
        }
    }

}