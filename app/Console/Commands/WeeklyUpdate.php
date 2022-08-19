<?php

namespace App\Console\Commands;

use App\Mail\SendApprovalMail;
use App\Models\Task;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class WeeklyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wg:weekly-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A weekly update to automatically notify via email for approval';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tasks = Task::where('done_flag', true)
                    ->where('approval_flag', false)
                    ->groupBy('user_id')
                    ->havingRaw('SUM(hour_done) >= 40')
                    ->get([
                        'tasks.user_id',
                        DB::raw('GROUP_CONCAT(id) AS task_id')
                    ]);

        $tasks_id = '';

        foreach($tasks as $task)
        {
            $tasks_id .= $task->task_id;
        }

        $tasks = Task::whereIn('id', explode(',', $tasks_id))->groupBy('email')->get([
            'email',
            DB::raw('GROUP_CONCAT(id) AS task_id')
        ]);

        foreach($tasks as $task)
        {
            Mail::to($task->email)->send(new SendApprovalMail($task->email, $task->task_id));
        }

        return $this::SUCCESS;
    }
}
