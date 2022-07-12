@extends('layouts.default')

@section('title', 'Create a Project')

@section('content')

    <div>
        <h3 class="text-3xl">Create a Project</h3>
    </div>
    <div class="flex w-full justify-center">
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf
            <div class="my-2">
                <label class="block" for="title">Title:</label>
                <input class="border border-black rounded" id="title" type="text" name="title" placeholder="Title of your Project" required />
                @error('title')
                    <div class="text-red-600 font-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="my-2">
                <label class="block" for="title">Yarn Type:</label>
                <input class="border border-black rounded" id="yarn_type" type="text" name="yarn_type" placeholder="What yarn are you using?"/>
                @error('yarn_type')
                    <div class="text-red-600 font-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="my-2">
                <label class="block" for="title">Hook Size:</label>
                <input class="border border-black rounded" id="hook_size" type="number" step="0.5" name="hook_size" placeholder="Hook size in MM"/>
                @error('hook_size')
                    <div class="text-red-600 font-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="block" for="notes">Notes:</label>
                <textarea class="border border-black rounded" id="notes" name="notes" placeholder="Any notes for the project"></textarea>
                @error('notes')
                    <div class="text-red-600 font-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-center">
                <input class="bg-green-400 p-2 rounded shadow text-white w-full hover:bg-green-700" type="submit" value="Submit" />
            </div>
        </form>
    </div>

@endsection
