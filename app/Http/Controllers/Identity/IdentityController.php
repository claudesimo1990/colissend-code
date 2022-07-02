<?php

/**
 * @package App\Http\Controllers\Identity
 * @author Claude Simo <claudesimo1990@gmail.com>
 * @copyright COLISSEND GMBH
 * @license proprietary
 */

namespace App\Http\Controllers\Identity;

use App\Models\Identity;
use App\Services\IdentityFileUploader;
use Symfony\Component\HttpFoundation\Request;

class IdentityController
{
    /**
     * @var IdentityFileUploader
     */
    private $identityFileUploader;

    /**
     * @param IdentityFileUploader $identityFileUploader
     */
    public function __construct(IdentityFileUploader $identityFileUploader)
    {
        $this->identityFileUploader = $identityFileUploader;
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'identity' => 'required|file'
        ]);

        if ($request->hasFile('identity')) {

            $this->identityFileUploader->upload($request);

            return redirect()->back()->with(['success' => "Vos documents ont été sauvegarder."]);
        }

        return redirect()->back()->with(['error' => "Vous n'avez pas choisi de fichier."]);
    }

    public function destroy(Identity $identity)
    {
        $identity->delete();

        return redirect()->back()->with(['success' => "Fichier supprimé."]);
    }

}