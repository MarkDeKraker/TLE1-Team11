<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YoungChoices</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite ('resources/css/styles.css')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://kit.fontawesome.com/3e59291876.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar flex justify-between p-8 relative">
        <div>
            <button id="id-side-nav-open" class="side-nav-menu text-2xl"><i class="fa-solid fa-bars"></i></button>
            <a href="{{ route('home') }}" class="font-ranchers text-orange-600 text-3xl ml-8">Young Choices</a>
        </div>
        <div>
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="m-3">{{ __('Logout') }}</button>
                </form>
            @else
                <a class="m-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="m-3" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endauth
        </div>
    </nav>

    <!-- SIDENAV -->
    <div id="id-side-nav" class="side-nav absolute left-0 h-full">
        <div class="font-ranchers text-white text-3xl m-5">Young Choices</div>
        <div href="javascript:void(0)" id="id-side-nav-close" class="side-nav-close">&times;</div>

        <a href="{{ route('home') }}" class=""><i class="fa-solid fa-house text-white"> </i>Home</a>
        <a href="{{ route('saved') }}" class=""><i class="fa-solid fa-heart"></i>Opgeslagen</a>

        @hasrole('moderator')
        <a href="{{ route('moderator') }}" class=""><i class="fa-solid fa-bookmark"></i>Mijn Artikelen</a>
        @endhasrole
        @hasrole('admin')
        <a href="{{ route('admin.index') }}" class=""><i class="fa-solid fa-user-tie"></i>Admin</a>
        @endhasrole
    </div>

    <main class="py-4">
        @yield('content')
    </main>
</body>

</html>
