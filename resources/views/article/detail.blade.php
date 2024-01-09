@extends('layouts.app')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@section('title')
    Details
@endsection
@section('content')

    <section class="relative flex items-center justify-center w-screen h-fit z-10">
        <div class="w-full sm:w-1/2 relative">
            <img class="object-cover object-center w-full h-full z-0" src="data:image/jpeg;base64,{{ $article->image }}">
            <div class="absolute top-0 left-0 w-full h-full bg-black opacity-40 z-10"></div>
        </div>
    </section>



@endsection
