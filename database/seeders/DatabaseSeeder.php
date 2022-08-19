<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'test_user',
            'email' => 'user@email.com',
            'password' => Hash::make('password'),
        ]);

        $user->tasks()->create([
            'name' => 'Test #1',
            'hour_expected' => 40,
            'email' => 'client@email.com',
        ]);
    }
}
