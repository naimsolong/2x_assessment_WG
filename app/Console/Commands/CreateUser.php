<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wg:new-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user_name = $this->ask('What is user name?', '');
        $user_email = $this->ask('What is user email?', '');
        $user_password = $this->ask('What is user password?', '');

        User::create([
            'name' => $user_name,
            'email' => $user_email,
            'password' => Hash::make($user_password),
        ]);

        return $this::SUCCESS;
    }
}
