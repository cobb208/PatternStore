@extends('layouts.default')

@section('title', 'Edit a Project')

@section('content')
    <div class="flex w-full mb-3">
        <h3 class="text-3xl">Editing: <span class="italic">{{ $project['title'] }}</span></h3>
    </div>
    <div>
        <p class="underline">Created: {{ date('d-M-Y', strtotime($project['created_at'])) }}</p>
        <p class="underline">Last Update: {{ date('d-M-Y', strtotime($project['updated_at'])) }}</p>
    </div>
    <div class="flex w-full lg:justify-center">
        <form method="POST" action="{{ route('projects.update', $project['id']) }}">
            @csrf
            @method('PUT')
            <div class="my-3">
                <label class="block" for="title">Title:</label>
                <input class="border border-black rounded" id="title" type="text" name="title" value="{{ $project['title'] }}" required />
                @error('title')
                <div class="text-red-600 font-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block" for="title">Yarn Type:</label>
                <input class="border border-black rounded" id="yarn_type" type="text" name="yarn_type" value="{{ $project['yarn_type'] }}"/>
                @error('yarn_type')
                <div class="text-red-600 font-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block" for="title">Hook Size:</label>
                <input class="border border-black rounded" id="hook_size" type="number" step="0.5" name="hook_size" value="{{ $project['hook_size'] }}"/>
                @error('hook_size')
                <div class="text-red-600 font-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block" for="notes">Notes:</label>
                <textarea class="border border-black rounded" id="notes" name="notes" placeholder="Any notes for the project">{{ $project['notes'] }}</textarea>
                @error('notes')
                <div class="text-red-600 font-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-center">
                <input class="bg-green-400 p-2 rounded shadow text-white w-full hover:bg-green-700" type="submit" value="Update" />
            </div>
        </form>
    </div>
@endsection
