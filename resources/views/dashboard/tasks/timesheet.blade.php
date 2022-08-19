@extends('layouts.master')

@section('title', 'Dashboard Page')

@section('style')
@endsection

@section('content')

<div class="w-full xl:w-2/3 p-6 xl:max-w-6xl">

    <h1>NOTE: Once task is done, it will disappear from the list</h1>
    <!--"Container" for the graphs"-->
    <div class="max-w-full lg:max-w-3xl xl:max-w-5xl">
        <div class="overflow-x-auto relative">
            <form action="/dashboard/task/timesheet/{{ $id }}" method="POST">
                @csrf
                Hour: <input type="number" name="hour_add" value="8">
                <button>Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection


@section('script')

@endsection
