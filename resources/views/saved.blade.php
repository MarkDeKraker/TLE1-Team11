<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YoungChoices</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite ('resources/css/styles.css')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <!-- <script type="module" src="{{ mix('js/app.js') }}" defer></script> -->
</head>

<body>
    {{ $articles }}
    <div class="container-home">
        <div class="filters sticky top-0 bg-white w-full">

            <section class="navbar flex p-8 ">
                <div class="flex absolute left-5">

                    <!-- SIDENAV -->
                    <div id="id-side-nav" class="side-nav">
                        <div class="font-ranchers text-white text-3xl m-5">Young Choices
                        </div>
                        <div href="javascript:void(0)" id="id-side-nav-close" class="side-nav-close">&times;</div>
                        <a href="{{ route('home') }}" class=""><img class="w-6 h-6 mr-1" src="icons/home.png">Home</a>
                        <a href="#" class=""><img class="w-6 h-6 mr-1" src="icons/user.png">Mijn profiel</a>
                        <a href="{{ route('saved') }}" class=""><img class="w-6 h-6 mr-1" src="icons/saved.png">Opgeslagen</a>
                        <a href="#" class=""><img class="w-6 h-6 mr-1" src="icons/article.png">Mijn Artikelen</a>
                        <a href="#" class=""><img class="w-6 h-6 mr-1" src="icons/lock.png">Admin</a>
                    </div>
                    <span>
                        <img id="id-side-nav-open" class="w-8" src="icons/menu.png"" />
                </span>


                    <div class=" title-nav font-ranchers text-orange-600 text-3xl ml-8">Young Choices
                </div>
        </div>
        <div class="login-register flex absolute right-5 font-medium  ">
            @auth
                <a class="login-nav m-3" href="{{ route('home') }}">{{ __('Home') }}</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="login-nav m-3">{{ __('Logout') }}</button>
                </form>
            @else
                <a class="login-nav m-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="nav-link m-3" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endauth
            <img class="profile-nav w-7 h-7 m-3" src="icons/user.png" />
        </div>
        </section>

        <!-- SEARCHBAR -->
        <section class="flex justify-center">
            <div class="searchbar m-3 mt-12">
                <form action="#">
                    <input class="search-input" type="text" placeholder="Search..." name="search">
                    <button type="submit"></button>
                </form>
            </div>
        </section>

        <section class="flex">
            <h2 class="ml-20 m-1 font-semibold">Populaire artikelen</h2>
            <button id="openModalButton" class="art-btn-filter"> Filters
                <!-- <img class="w-4" src="icons/chevron-down.png" /> -->
            </button>
        </section>

        <!-- Modal -->
        <div id="overlay" class="overlay"></div>
        <div id="userModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModal"><img src="icons/close.png" /></span>
                <form class="filter-form" action="#" method="get">
                    <div class="filter-subject">
                        <div class="filter-title">Categorie</div>
                        <label>
                            <input class="sub-btn" type="checkbox" name="category[]" value="Werk"> Werk
                        </label>
                        <label>
                            <input class="sub-btn" type="checkbox" name="category[]" value="Gezondheid"> Gezondheid
                        </label>
                        <label>
                            <input class="sub-btn" type="checkbox" name="category[]" value="Sociaal"> Sociaal
                        </label>
                    </div>

                    <div class="filter-age">
                        <div class="filter-title">Leeftijd</div>
                        <label>
                            <input type="checkbox" name="age[]" value="14-16"> 14-16 jaar
                        </label>
                        <label>
                            <input type="checkbox" name="age[]" value="12-14"> 12-14 jaar
                        </label>
                        <label>
                            <input type="checkbox" name="age[]" value="16-18"> 16-18 jaar
                        </label>
                        <label>
                            <input type="checkbox" name="age[]" value="18+"> 18+
                        </label>
                    </div>
                    <div class="filter-btn">
                        <input type="submit" value="filters toepassen" src="icons/close.png">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- FAVORITE ARTICLELIST -->
    <section class="articlelist">
        <div class="article ">
            <h4 class="art-title">Op zoek naar je eerste bijbaantje?
                Hier moet je op
                letten.</h4>
            <div class="art-tag"></div>
            <img src="images/dummy-img1.png" alt="dummy image" class="art-img">
        </div>

        <div class="article ">
            <h4 class="art-title">Op zoek naar je eerste bijbaantje?
                Hier moet je op
                letten.</h4>
            <div class="art-tag">
            </div>
            <img src="images/dummy-img3.png" alt="dummy image" class="art-img">
        </div>

        <div class="article ">
            <h4 class="art-title">Op zoek naar je eerste bijbaantje?
                Hier moet je op
                letten.</h4>
            <div class="art-tag">
            </div>
            <img src="images/dummy-img2.png" alt="dummy image" class="art-img">
        </div>

        <div class="article ">
            <h4 class="art-title">Op zoek naar je eerste bijbaantje?
                Hier moet je op
                letten.</h4>
            <div class="art-tag">
            </div>
            <img src="images/dummy-img4.png" alt="dummy image" class="art-img">
        </div>

        <div class="article ">
            <h4 class="art-title">Op zoek naar je eerste bijbaantje?
                Hier moet je op
                letten.</h4>
            <div class="art-tag">
            </div>
            <img src="images/dummy-img2.png" alt="dummy image" class="art-img">
        </div>
    </section>

    <!-- CREATE BUTTON -->
    <a href="#" class="new-art-btn"><img src="icons/plus_icon.png"></a>
    </div>
</body>

</html>
