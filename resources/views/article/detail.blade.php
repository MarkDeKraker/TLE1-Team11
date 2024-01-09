@extends('layouts.app')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@section('title')
    Details
@endsection
@section('content')

    <section class=" flex items-center justify-center w-screen h-fit z-10">
        <div class="w-full sm:w-1/2 relative">
            <img class="object-cover object-center w-full h-full z-0" src="data:image/jpeg;base64,{{ $article->image }}">
            <div class="absolute top-0 left-0 w-full h-full bg-black opacity-40 z-10"></div>
        </div>
    </section>

    <section class="flex items-center justify-center w-screen">
        <div class="w-full sm:w-1/2 relative">
            <div class="flex font-bold m-2 ">
            <h2 class="m-2">Tags:</h2>
            @foreach ($article->subjects as $article_subject)
                <h2 class="m-1 p-1 border-1 border-green-600 rounded-xl">{{ $article_subject->subject }}</h2>
            @endforeach

            @foreach ($article->ages as $article_age)
                <h2 class="m-1 p-1 bg-orange-500 rounded-xl text-white">{{ $article_age->age }} jaar</h2>
            @endforeach

            <div class="copy-div">
                <span class="copy-text" id="share-text">Copy to clipboard</span>
                <button onclick="myFunction()" onmouseout="outFunc()">Share URL</button>
            </div>
            <input type="text" value="{{ url()->current() }}" class="copy-input" id="share-input">

            @auth
                <form action="{{ route('article.toggle-save', $article->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="m-1 p-1 rounded-xl {{ $article->saved ? "bg-orange-500 text-white" : "bg-white text-orange-500" }}">{{ $article->saved ? "Saved" : "Save" }}</button>
                </form>
            @endauth
            </div>


            <section class="m-3 text-xl">
                <p class="font-bold">{{ $article->title }}</p>
                <p class="mt-4">{{ $article->description }}</p>
            </section>
        </div>
    </section>

    <script>
        function myFunction() {
            var shareInput = document.getElementById("share-input");
            shareInput.style.visibility = "visible";
            shareInput.style.width = ((shareInput.value.length + 1) * 8) + 'px';
            shareInput.select();
            shareInput.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(shareInput.value);

            var shareText = document.getElementById("share-text");
            shareText.innerHTML = "Copied: " + shareInput.value;
        }

        function outFunc() {
            var shareText = document.getElementById("share-text");
            shareText.innerHTML = "Copy to clipboard";
        }
    </script>

@endsection
