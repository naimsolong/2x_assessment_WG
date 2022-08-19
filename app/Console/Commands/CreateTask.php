<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Models\User;
use Illuminate\Console\Command;

class CreateTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wg:new-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new task';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::get('name')->pluck('name')->toArray();

        $task_name = $this->ask('What is task name?', '');

        if(Task::where('name', $task_name)->where('done_flag', false)->where('approval_flag', false)->exists())
        {
            $this->warn('Task name cannot be duplicate! Please try again.');
            return $this::FAILURE;
        }

        $user_name = $this->choice('Assign task for which user? (Insert user\'s name)', $users, 'test_user');

        $user = User::where('name', $user_name)->first();
        if(!$user)
        {
            $this->warn('User doesn\'t exist! Please try again.');
            return $this::FAILURE;
        }

        $days = $this->ask('How many days do you expected to finish? (1 day = 8 hour working)', 1);
        $email = $this->ask('Which email should be send for notification?', 'client@email.com');

        if($task_name == '' || $user_name == '' || $days == 0 || $email == '')
        {
            $this->warn('Wrong input! Please try again.');
            return $this::FAILURE;
        }

        $user->tasks()->create([
            'name' => $task_name,
            'hour_expected' => (int)$days * 8,
            'email' => $email,
        ]);

        return $this::SUCCESS;
    }
}
