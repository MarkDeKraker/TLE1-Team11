@extends('layouts.app')

@section('content')
<div class="container-home">
    <div class="header fixed top-34 bg-white w-full">

        <!-- SEARCHBAR -->
        <section>
            <div class="searchbar m-3">
                <form action="#">
                    <input class="block w-full p-3 ps-10 border border-orange-400 border-1 rounded-full text-xl"
                        type="text" placeholder="Search..." name="search">
                    <button type="submit"></button>
                </form>
            </div>
        </section>

        <!-- NAV -->
        <section>
            <div class="nav-tags">
                <div class="nav-subjects pr-4 pl-4 flex place-content-evenly">
                    <button
                        class="p-2 m-2 text-2xl md:text-4xl border-orange-500 hover:bg-orange-500 border-1 rounded-xl">Werk</button>
                    <button
                        class="p-2 m-2 text-2xl border-orange-500 hover:bg-orange-500 border-1 rounded-xl">Gezondheid</button>
                    <button
                        class="p-2 m-2 text-2xl border-orange-500 hover:bg-orange-500  border-1 rounded-xl">Sociaal</button>
                </div>
                <div class="nav-age pr-4 pl-4 flex place-content-evenly">
                    <button
                        class="p-1 m-1 text-xl bg-orange-500 hover:bg-orange-300 rounded-2xl text-white font-bold">14-16
                        jaar</button>
                    <button
                        class="p-1 m-1 text-xl bg-orange-500 hover:bg-orange-300 rounded-2xl text-white font-bold">12-14
                        jaar</button>
                    <button
                        class="p-1 m-1 text-xl bg-orange-500 hover:bg-orange-300  rounded-2xl text-white font-bold">16-18
                        jaar</button>
                    <button
                        class="p-1 m-1 text-xl bg-orange-500 hover:bg-orange-300  rounded-2xl text-white font-bold">18+</button>
                </div>
            </div>
        </section>
    </div>




    <!-- ARTICLELIST -->
    <section class="articleList">
        <div class="article m-4 p-8 rounded-xl shadow-xl shadow-md-top flex">
            <h4 class="art-title text-xl font-bold">Op zoek naar je eerste bijbaantje? Hier moet je op letten.</h4>
            <div class="art-tag">
            </div>
            <img src="images/dummy-img1.png" alt="dummy image" class="h-12 w-12 rounded">
        </div>




        <div class="article m-4 p-8 rounded-xl shadow-xl shadow-md-top flex">
            <h4 class="art-title text-xl font-bold">Op zoek naar je eerste bijbaantje? Hier moet je op letten.</h4>
            <div class="art-tag">
            </div>
            <img src="images/dummy-img1.png" alt="dummy image" class="h-12 w-12 rounded">
        </div>




        <div class="article m-4 p-8 rounded-xl shadow-xl shadow-md-top flex">
            <h4 class="art-title text-xl font-bold">Op zoek naar je eerste bijbaantje? Hier moet je op letten.</h4>
            <div class="art-tag">
            </div>
            <img src="images/dummy-img1.png" alt="dummy image" class="h-12 w-12 rounded">
        </div>




        <div class="article m-4 p-8 rounded-xl shadow-xl shadow-md-top flex">
            <h4 class="art-title text-xl font-bold">Op zoek naar je eerste bijbaantje? Hier moet je op letten.</h4>
            <div class="art-tag">
            </div>
            <img src="images/dummy-img1.png" alt="dummy image" class="h-12 w-12 rounded">
        </div>




        <div class="article m-4 p-8 md:p-24 rounded-xl shadow-xl shadow-md-top flex">
            <h4 class="art-title text-xl font-bold">Op zoek naar je eerste bijbaantje? Hier moet je op letten.</h4>
            <div class="art-tag">
            </div>
            <img src="images/dummy-img1.png" alt="dummy image" class="h-12 w-12 rounded">
        </div>


        <div class="article m-4 p-8 rounded-xl shadow-xl shadow-md-top flex">
            <h4 class="art-title text-xl font-bold">Op zoek naar je eerste bijbaantje? Hier moet je op letten.</h4>
            <div class="art-tag">
            </div>
            <img src="images/dummy-img1.png" alt="dummy image" class="h-12 w-12 rounded">
        </div>




        <div class="article m-4 p-8 rounded-xl shadow-xl shadow-md-top flex">
            <h4 class="art-title text-xl font-bold">Op zoek naar je eerste bijbaantje? Hier moet je op letten.</h4>
            <div class="art-tag">
            </div>
            <img src="images/dummy-img1.png" alt="dummy image" class="h-12 w-12 rounded">
        </div>
    </section>
</div>
@endsection