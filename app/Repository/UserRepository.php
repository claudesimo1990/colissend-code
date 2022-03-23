<?php
/**
 * @package App\Repository
 * @author Claude Simo <claudesimo1990@gmail.com>
 * @copyright COLISSEND GMBH
 * @license proprietary
 */

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    /**
     * @var User
     */
    private $user;

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

}