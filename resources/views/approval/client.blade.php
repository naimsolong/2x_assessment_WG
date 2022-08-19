@extends('layouts.blank')

@section('title', 'Approval Page')

@section('content')
Once you click this button, all task these will be approve and an invoice email will be send for you.
<br><br>
<div class="max-w-full lg:max-w-3xl xl:max-w-5xl">
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Task name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Hour Expected
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Hour Done
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Log
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $task->name }}
                    </th>
                    <td class="py-4 px-6">
                        {{ $task->hour_expected }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $task->hour_done }}
                    </td>
                    <td class="py-4 px-6">
                        @foreach ($task->logs as $log)
                            {{ $log->hour_done }} hour at {{ $log->created_at->format('d/m/Y') }} <br/>
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br><br>

@if (count($tasks) > 0)
<form action="/approval/client" method="POST">
    @csrf
    <input type="hidden" name="email" value="{{ $email }}">
    <input type="hidden" name="task_id" value="{{ $task_id }}">
    <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Approved!</button>
</form>
@endif

@endsection
