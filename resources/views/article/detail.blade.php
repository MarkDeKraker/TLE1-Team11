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
            <a href="{{ route('home') }}" class="absolute top-5 left-5">
                <img src="icons/arrow_back_left_icon.png" class="w-8" alt="Back">
            </a>
            <img src="icons/share_arrow_icon.png" class="absolute top-6 right-5 w-7">
            <img src="icons/save_icon.png" class="absolute bottom-5 right-5 w-6">
        </div>
    </section>

    <section class="flex font-bold m-2">
        <h2 class="m-2">Tags:<h2>
        @foreach ($article->subjects as $article_subject)
            <h2 class="m-1 p-1 border-1 border-green-600 rounded-xl">{{ $article_subject->subject }}<h2>
        @endforeach

        @foreach ($article->ages as $article_age)
            <h2 class="m-1 p-1 bg-orange-500 rounded-xl text-white">{{ $article_age->age }} jaar<h2>
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
    </section>

    <section class="m-3 text-xl">
        <p class="font-bold">{{ $article->title }}</p>
        <p class="mt-4">{{ $article->description }}</p>
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
