<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InitProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wg:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initiate project migrations and seeders';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('migrate:fresh');
        $this->call('db:seed');

        return $this::SUCCESS;
    }
}
