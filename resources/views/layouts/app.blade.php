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
    <div class="container-home">
        <nav class="navbar flex p-8 ">
            <div class="filters sticky top-0 bg-white w-full">
                <div class="flex absolute left-5">
                    <!-- SIDENAV -->
                    <div id="id-side-nav" class="side-nav">
                        <div class="font-ranchers text-white text-3xl m-5">Young Choices</div>
                        <div href="javascript:void(0)" id="id-side-nav-close" class="side-nav-close">&times;</div>

                        <a href="{{ route('home') }}" class=""><i class="fa-solid fa-house text-white"> </i>Home</a>
                        <a href="#" class=""><i class="fa-solid fa-user"></i>Mijn profiel</a>
                        <a href="{{ route('saved') }}" class=""><i class="fa-solid fa-heart"></i>Opgeslagen</a>

                        @hasrole('moderator')
                        <a href="#" class=""><i class="fa-solid fa-bookmark"></i>Mijn Artikelen</a>
                        @endhasrole
                        @hasrole('admin')
                        <a href="{{ route('admin.index') }}" class=""><i class="fa-solid fa-user-tie"></i>Admin</a>
                        @endhasrole
                    </div>
                    <div id="id-side-nav-open" class="side-nav-menu text-2xl"><i class="fa-solid fa-bars"></i></div>
                    <a href="{{ route('home') }}" class="title-nav font-ranchers text-orange-600 text-3xl ml-8">Young Choices</a>
                </div>
                <div class="login-register flex absolute right-5 font-medium">
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="login-nav m-3">{{ __('Logout') }}</button>
                        </form>
                    @else
                        <a class="login-nav m-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                        <a class="nav-link m-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
