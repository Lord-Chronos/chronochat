<!DOCTYPE html>

<head>
    <title> @yield('title') </title>
</head>

<body>

    <head>
        <title>@yield('title')</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> --}}
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        {{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
                @vite(['public/css/app.css', 'resources/js/app.js'])

        @livewireStyles

    </head>
            {{-- @include('layouts.navigation') --}}

    {{-- <header>        <p> Chrono Chat</p>    </header> --}}


        {{-- <div class="topnav">
            <a class="active" href={{ route('posts.index') }}>Home</a>
            <a href={{ route('users.show', Auth::id()) }}>User</a>
            <a href={{ route('posts.create') }}>Create Post</a>
            <a href="#about">About</a>
        </div> --}}
    <!-- navigation bar -->

    {{-- <div class="topnav">

            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href={{ route('posts.index') }}>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('users.show', Auth::id()) }}>User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('posts.create') }}>Create Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
            </ul>

        </div> --}}
    <!-- navigation bar ends here -->

    <body>
    @livewireScripts
        {{-- <h1> @yield('header') </h1> --}}
        <main id="page-content">

            <div id="posts-list">


                <div id="filter-list" class="box">
                    @if (Auth::check())
                        <div class="filter">
                            <a class="nav-link" href={{ route('posts.index') }}>Home</a>
                        </div>

                        <div class="filter">
                            <a class="nav-link" href={{ route('users.show', Auth::id()) }}>User</a>
                        </div>

                        <div class="filter">
                            <a class="nav-link" href={{ route('posts.create') }}>
                                <p>Create Post</p>
                            </a>
                        </div>
                    @else
                        <div class="filter">
                            <a class="nav-link" href={{ route('login') }}>
                                <p>Login</p>
                            </a>
                        </div>
                        <div class="filter">
                            <a class="nav-link" href={{ route('register') }}>
                                <p>Register</p>
                            </a>
                        </div>
                    @endif

                </div>
                @if ($errors->any())
                    <div>
                        Errors:
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('message'))
                    <p><b>{{ session('message') }}</b></p>
                @endif

                @yield('content')
            </div>
        </main>
{{-- @include('layouts.footer') --}}

    </body>
    </html>
