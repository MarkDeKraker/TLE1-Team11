@extends('layouts.app')

@section('content')
<div class="container-home">
    <div class="fixed top-34 bg-white w-full">

        <!-- SEARCHBAR -->
        <section class="flex justify-center">
            <div class="searchbar m-3">
                <form action="#">
                    <input class="block w-full p-3 md:p border border-1 rounded-full text-xl" type="text"
                        placeholder="Search..." name="search">
                    <button type="submit"></button>
                </form>
            </div>
        </section>

        <!-- NAV -->
        <section>
            <div class="nav-tags">
                <div class="pr-4 pl-4 flex place-content-evenly">
                    <button
                        class="p-2 m-2 text-2xl md:text-4xl border-orange-500 hover:bg-orange-500  border-1 rounded-xl">Werk</button>
                    <button
                        class="p-2 m-2 text-2xl md:text-4xl border-orange-500 hover:bg-orange-500 border-1 rounded-xl">Gezondheid</button>
                    <button
                        class="p-2 m-2 text-2xl md:text-4xl border-orange-500 hover:bg-orange-500  border-1 rounded-xl">Sociaal</button>
                </div>

                <div class="pr-4 pl-4 flex place-content-evenly">
                    <button
                        class="p-1 m-1 text-xl md:text-2xl bg-orange-500 hover:bg-orange-300 rounded-2xl text-white font-bold">14-16
                        jaar</button>
                    <button
                        class="p-1 m-1 text-xl md:text-2xl bg-orange-500 hover:bg-orange-300 rounded-2xl text-white font-bold">12-14
                        jaar</button>
                    <button
                        class="p-1 m-1 text-xl md:text-2xl bg-orange-500 hover:bg-orange-300  rounded-2xl text-white font-bold">16-18
                        jaar</button>
                    <button
                        class="p-1 m-1 text-xl md:text-2xl bg-orange-500 hover:bg-orange-300  rounded-2xl text-white font-bold">18+</button>
                </div>
            </div>
        </section>
    </div>

    <!-- CREATE BUTTON -->
    <!-- <section>
        <div class="fixed bottom-6 right-5 p-3 md:p-5 rounded-full bg-blue-500 text-white font-bold text-2xl">
            <img src="icons/plus_icon.png">
        </div>
    </section> -->

    <!-- ARTICLELIST -->
    <section class="articlelist">
<!-- 
        <div class="article m-4 lg:w-72 lg:h-80 rounded-xl shadow-xl shadow-md-top flex lg:flex-wrap-reverse">
            <h4 class="art-title text-xl md:text-4xl lg:text-2xl font-medium lg:m-4">Op zoek naar je eerste bijbaantje?
                Hier moet je op
                letten.</h4>
            <div class="art-tag">
            </div>
            <img src="images/dummy-img1.png" alt="dummy image" class="art-img h-full w-full lg:max-h-48 rounded">
        </div> -->
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
            <img src="images/dummy-img1.png" alt="dummy image" class="art-img">
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
            <img src="images/dummy-img1.png" alt="dummy image" class="art-img">
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
            <img src="images/dummy-img1.png" alt="dummy image" class="art-img">
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
            <img src="images/dummy-img1.png" alt="dummy image" class="art-img">
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
            <img src="images/dummy-img1.png" alt="dummy image" class="art-img">
        </div>
    </section>
</div>
@endsection