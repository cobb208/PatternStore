@extends('layouts.default')

@section('title', 'Edit a Project')

@section('content')
    <div>
        <p class="underline">Created: {{ date('d-M-Y', strtotime($project['created_at'])) }}</p>
        <p class="underline">Last Update: {{ date('d-M-Y', strtotime($project['updated_at'])) }}</p>
    </div>
    <div class="grid grid-cols-1 justify-items-center">
        <div>
            <h3 class="text-3xl mb-3">{{ Str::headline($project['title']) }}</h3>
        </div>
        <div class="justify-items-start">
            <p><span class="font-bold">Yarn Type:</span> {{ $project['yarn_type'] }}</p>
            <p><span class="font-bold">Hook Size:</span> {{ $project['hook_size'] }}</p>
        </div>
        <div class="justify-items-start">
            <p class="font-bold">Notes:</p>
            <p>{{ $project['notes'] }}</p>
        </div>
        <div>
            <a class="bg-green-400 text-white px-2 my-2 rounded inline-block" href="{{ route('projects.edit', $project['id']) }}">Edit</a>
            <form class="inline-block" method="POST" action="{{ route('projects.destroy', $project['id']) }}">
                @csrf
                @method('delete')
                <input class="text-white bg-red-700 px-2 my-2 rounded" type="submit" value="Delete" />
            </form>
        </div>

    </div>
@endsection
