@extends('layouts.app')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@section('title')
    Details
@endsection
@section('content')

    <section class="relative">
        <img class="h-full w-full" src="images/dummy-img.png">
        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-40"></div>

        <div class="text-white">
            <a href="{{ url('/') }}" class="absolute top-5 left-5">
                <img src="icons/arrow_back_left_icon.png" class="w-8" alt="Back">
            </a>
            <img src="icons/share_arrow_icon.png" class="absolute top-6 right-5 w-7">
            <img src="icons/save_icon.png" class="absolute bottom-5 right-5 w-6">
        </div>
    </section>

    <section class="flex font-bold m-2">
        <h2 class="m-2">Tags:<h2>
                <h2 class="m-1 p-1 border-1 border-green-600 rounded-xl">Werk<h2>
                        <h2 class="m-1 p-1 bg-orange-500 rounded-xl text-white">14-16 jaar<h2>
    </section>

    <section class="m-3 text-xl">
        <p class="font-bold">{{ $article->title }}</p>
        <p class="mt-4">{{ $article->description }}</p>
    </section>

@endsection