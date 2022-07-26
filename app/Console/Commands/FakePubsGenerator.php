<?php

/**
 * @package App\Console\Commands
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */

namespace App\Console\Commands;

use App\Models\User;
use Database\Factories\PubFactory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FakePubsGenerator extends Command
{
    protected $signature = 'colissend:pubs';
    protected $description = 'Generate fake Pubs for colissend';
    private PubFactory $pubFactory;

    /**
     * @param PubFactory $pubFactory
     */
    public function __construct(PubFactory $pubFactory)
    {
        parent::__construct();
        $this->pubFactory = $pubFactory;
    }

    public function handle(): int
    {
        DB::table('pubs')->truncate();

        $this->pubFactory->count(5)->create(
            [
                'user_id' => User::first()->id
            ]
        );

        $this->line('5 publicites ont ete creer !!!', 'info');

        return Command::SUCCESS;
    }

}
