@extends('layouts.default')

@section('title', 'Login')

@section('content')
    <div>
        <h3 class="text-2xl">
            Create an Account
        </h3>
    </div>
    <div class="flex w-full justify-center">
        <form method="POST" action="{{ route('auth.store') }}">
            @csrf
            <div class="my-3">
                <label class="block" for="name">Name:</label>
                <input class="border border-black rounded w-full" id="name" name="name" type="text" placeholder="Your Name" value="{{ old('name') }}" required/>
                @error('name')
                    <div class="text-red-600 font-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="my-3">
                <label class="block" for="email">Name:</label>
                <input class="border border-black rounded w-full" id="email" name="email" type="email" placeholder="Your Email" value="{{ old('email') }}" required/>
                @error('email')
                <div class="text-red-600 font-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="my-3">
                <label class="block" for="password">Password:</label>
                <input class="border border-black rounded w-full" id="password" name="password" type="password" placeholder="Your Password" required/>
                @error('password')
                    <div class="text-red-600 font-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="my-3">
                <label class="block" for="password_confirmation">Confirm Your Password:</label>
                <input class="border border-black rounded w-full" id="password_confirmation" name="password_confirmation" type="password" placeholder="Password Confirmation" required/>
                @error('password_confirmation')
                    <div class="text-red-600 font-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="my-3">
                <input class="bg-green-400 p-2 rounded shadow text-white w-full hover:bg-green-700" type="submit" value="Create" />
            </div>
            <div>
                <p class="text-sm">Already have an account? <a class="text-teal-400" href="{{ route('auth.login') }}">Click Here</a></p>
            </div>
        </form>
    </div>
@endsection
