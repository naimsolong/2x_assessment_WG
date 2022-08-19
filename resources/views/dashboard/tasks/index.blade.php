@extends('layouts.master')

@section('title', 'Dashboard Page')

@section('style')
@endsection

@section('content')

<div class="w-full xl:w-2/3 p-6 xl:max-w-6xl">

    <h1>NOTE: Once task is done, it will disappear</h1>
    <!--"Container" for the graphs"-->
    <div class="max-w-full lg:max-w-3xl xl:max-w-5xl">
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Task name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Task Hour Expected
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Task Hour Done
                        </th>
                        <th scope="col" class="py-3 px-6">
                            View Log
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
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
                        <td class="py-4 px-6">
                            <a href="/dashboard/task/timesheet/{{$task->id}}" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Add Hour</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@section('script')

@endsection
