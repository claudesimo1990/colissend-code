<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateImportancesUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'colissend:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Admin and Test User';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        User::create([
            'firstname' => 'Jean Claude',
            'lastname' => 'Simo',
            'email' => 'claudesimo1990@gmail.com',
            'email_verified_at' => now(),
            'last_connexion' => now()->toDateTime(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => null,
        ]);

        Admin::create([
            'name' => 'Claude Simo',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        return Command::SUCCESS;
    }
}
