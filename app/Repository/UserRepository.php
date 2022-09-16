<?php
/**
 * @package App\Repository
 * @author Claude Simo <claudesimo1990@gmail.com>
 * @copyright COLISSEND GMBH
 * @license proprietary
 */

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class UserRepository
{
    /**
     * @var User
     */
    private User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function findById(int $id)
    {
        return $this->user->find($id);
    }

    public function updatePaypalAccount(array $data): bool
    {
        return Auth::user()->update($data);
    }

    public function updateBankAccount(array $data): bool
    {
        return Auth::user()->update($data);
    }

}
