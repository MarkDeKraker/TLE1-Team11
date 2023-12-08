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

</body>

</html>
<div class="container-home">
    <div class="filters sticky top-0 bg-white w-full">

        <section class="navbar flex p-8 ">
            <div class="flex absolute left-5">
                <img class="menu-nav w-7 h-7" src="icons/menu.png" />
                <div class="title-nav font-ranchers text-orange-600 text-3xl ml-8">Young Choices</div>
            </div>
            <div class="login-register flex absolute right-5 font-medium  ">
                <a class="login-nav m-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="nav-link m-3" href="{{ route('register') }}">{{ __('Register') }}</a>
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

        <!-- NAV -->


        <a href="#" class="new-art-btn">+new article
        </a>


        <button id="openModalButton" class="art-btn-filter"> Filters
        </button>


        <!-- Modal -->
        <div id="overlay" class="overlay"></div>
        <div id="userModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <form action="#" method="get">
                    <div class="nav-tags-subject">
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
                    <input type="submit" value="Pas filter toe">
                </form>

                <form action="#" method="get">
                    <div class="nav-tags-age">
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
                    <input type="submit" value="Pas filter toe">
                </form>
            </div>
        </div>
    </div>
    <!-- CREATE BUTTON -->

    <!-- ARTICLELIST -->

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
            <div class="art-tag"></div>
            <img src="images/dummy-img2.png" alt="dummy image" class="art-img">
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
            <img src="images/dummy-img4.png" alt="dummy image" class="art-img">
        </div>

        <div class="article ">
            <h4 class="art-title">Op zoek naar je eerste bijbaantje?
                Hier moet je op
                letten.</h4>
            <div class="art-tag">
            </div>
            <img src="images/dummy-img1.png" alt="dummy image" class="art-img">
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
    </section>
</div>
@include('modal.filter')