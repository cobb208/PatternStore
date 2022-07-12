<!DOCTYPE html>
<html>
    <head>
        <title>Pattern Store @yield('title', '')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
    </head>
    <body class="m-0 p-0">
    <nav class="text-3xl flex items-center justify-between flex-wrap bg-teal-500 p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <a href="{{ route('index') }}"><span class="font-semibold tracking-tight">Pattern Store</span></a>
        </div>
        <div id="mobile_menu_toggle" class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
        <div id="main_nav_bar_links" class="hidden w-full block flex-grow lg:flex lg:items-center lg:w-auto mt-3">
            <div class="lg:flex-grow">
                <a href="{{ route('projects.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    My Projects
                </a>
                <a href="{{ route('projects.create') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Create a Project
                </a>

                <a href="{{ route('projects.completed') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
                    Completed Work
                </a>
            </div>
            <div class="mt-5 lg:mt-0">
                @auth
                    <p class="lg:inline-block lg:mt-0 text-teal-200 mr-4">Hello! {{ Str::ucfirst(Auth::user()->name) }}</p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input class="lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4" type="submit" value="Logout" />
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Login</a>
                @endguest
            </div>
        </div>
    </nav>

        <div class="container mt-4 px-3">
            @yield('content')
        </div>
     @vite('resources/js/app.js')
    </body>
</html>
