<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;

class ImportCountriesFromJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Countries:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Countries List from json';

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
     * @return int
     */
    public function handle(): int
    {
        Country::truncate();

        $json = base_path('countries.json');
        $json = json_decode(file_get_contents($json), true);

        foreach ($json as $country) {
            Country::create($country);
        }

        return Command::SUCCESS;
    }
}
