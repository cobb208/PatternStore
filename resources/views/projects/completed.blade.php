@extends('layouts.default')

@section('title', 'Home Page')

@section('content')
    <div>
        <h1 class="text-3xl">
            Completed Projects
        </h1>
    </div>

@if(count($projects) > 0)
    @foreach($projects as $project)
        <div class="flex border border-black my-2 py-2 pl-2 justify-between hover:bg-gray-300">
            <div>
                <h3 class="text-xl">{{ $project['title'] }} | @if($project['notes']){{Str::limit($project['notes'], 50)}}@endif</h3>
                <p class="text-gray-600">Date Created: {{ date('d-M-Y', strtotime($project['created_at'])) }}</p>
            </div>
{{--            <div class="mr-2">--}}
{{--                <form class="inline-block" method="POST" action="{{ route('projects.complete', $project['id']) }}">--}}
{{--                    @csrf--}}
{{--                    <input class="bg-teal-400 text-white bg-red-700 px-2 my-2 rounded underline" type="submit" value="Complete" />--}}
{{--                </form>--}}
{{--                <a class="px-2 my-2 bg-green-400 rounded text-white underline inline-block" href="{{ route('projects.show', $project['id']) }}">--}}
{{--                    Open--}}
{{--                </a>--}}
{{--                <form class="inline-block" method="POST" action="{{ route('projects.destroy', $project['id']) }}">--}}
{{--                    @csrf--}}
{{--                    @method('delete')--}}
{{--                    <input class="text-white bg-red-700 px-2 my-2 rounded underline" type="submit" value="Delete" />--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>
    @endforeach
@else
    <p>No completed projects get to working! ❤️</p>
@endif
@endsection
