<?php

namespace App\Repository;

use App\Models\Pub;

class PubRepository
{
    /**
     * @var Pub
     */
    private $pub;

    /**
     * @param Pub $pub
     */
    public function __construct(Pub $pub)
    {
        $this->pub = $pub;
    }

    public function pubs()
    {
        return $this->pub->latest()->limit(3)->get();
    }
}
