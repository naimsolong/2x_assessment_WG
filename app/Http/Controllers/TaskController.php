<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function viewTasks()
    {
        $tasks = Auth::user()->tasks()->with('logs')->where('done_flag', false)->get();

        return view('dashboard.tasks.index', ['tasks' => $tasks]);
    }

    public function viewTaskTimesheet($id)
    {
        return view('dashboard.tasks.timesheet', ['id' => $id]);
    }

    public function taskTimesheet(Request $request, $id)
    {
        Task::find($id)->updateHour($request->hour_add);

        return redirect('/dashboard/tasks');
    }
}
