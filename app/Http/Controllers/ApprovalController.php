<?php

namespace App\Http\Controllers;

use App\Mail\SendInvoiceMail;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApprovalController extends Controller
{
    public function viewApprovalClient(Request $request)
    {
        if ($request->has(['email', 'task_id']))
            $tasks = Task::where('approval_flag', false)->whereIn('id', explode(',', $request->task_id))->where('email', $request->email)->get();

        if($tasks)
            return view('approval.client', $request->merge([
                'tasks' => $tasks
            ])->toArray());

        return abort(404);
    }

    public function ApprovalClient(Request $request)
    {
        if ($request->has(['email', 'task_id']))
            $tasks = Task::where('approval_flag', false)->whereIn('id', explode(',', $request->task_id))->where('email', $request->email)->update([
                'approval_flag' => true
            ]);

        if($tasks > 0)
        {
            Mail::to('finance@email.com')->send(new SendInvoiceMail());
            return 'Success';
        }
        else
        {
            return 'Fail';
        }

        return abort(404);
    }
}
