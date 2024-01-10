@extends('layouts.app')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@section('title')
    Details
@endsection
@section('content')

    <section class="flex items-center justify-center w-3/4 h-fit z-10 mx-auto">
        <div class="w-full sm:w-1/2 relative">
            @hasrole('moderator')
                @if(auth()->user()->id === $article->user_id || auth()->user()->id === 1)
                    <div class="absolute top-0 right-0 z-10 flex justify between mt-2">
                        <a href="{{ route('article.edit', $article->id) }}">
                            <div class=" bg-blue-600 w-8 mr-3 p-2 rounded-2xl hover:bg-blue-700"><i class="text-amber-50 fa-solid fa-pencil"></i></div>
                        </a>
                        <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-red-600 w-8 rounded-2xl mr-3 p-2 hover:bg-red-700">
                                <i class="fa-solid fa-trash text-amber-50"></i>
                            </button>
                        </form>
                    </div>
                @endif
            @endhasrole
            <img class="object-cover object-center w-full h-full z-0" src="data:image/jpeg;base64,{{ $article->image }}">
            <div class="absolute top-0 left-0 w-full h-full bg-black opacity-40 z-0 rounded-t-lg"></div>
        </div>
    </section>

    <section class="flex items-center justify-center w-3/4 mx-auto">
        <div class="w-full sm:w-1/2 relative">
            <div class="flex font-bold m-2">
                <h2 class="m-2">Tags:</h2>
                <div class="pt-2">
                    @foreach($article->ages as $age)
                        <div class="rounded-full bg-orange-500 text-white text-xs px-2 py-1 inline-flex mr-2 mb-2">
                            {{ $age->age }}
                        </div>
                    @endforeach
                    @foreach($article->subjects as $subject)
                        <div class="rounded-full bg-white border  text-xs border-orange-500 px-2 py-1 inline-flex mr-2 mb-2">
                            {{ $subject->subject }}
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex font-bold m-2">
                <div class="copy-div text-xs px-2 py-1 inline-flex mr-2 mb-2">
                    <span class="copy-text" id="share-text">Copy to clipboard</span>
                    <button onclick="myFunction()" onmouseout="outFunc()">Share URL</button>
                </div>
                <input type="text" value="{{ url()->current() }}" class="copy-input" id="share-input">

                @auth
                    <form action="{{ route('article.toggle-save', $article->id) }}" class="text-xs px-2 py-1 inline-flex mr-2 mb-2" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="m-1 p-1 rounded-full {{ $article->saved ? "bg-orange-500 text-white hover:bg-orange-600" : "bg-white text-orange-500 hover:bg-orange-400" }} inline-flex">{{ $article->saved ? "Opgeslagen" : "Opslaan" }}</button>
                    </form>
                @endauth
            </div>

            <section class="m-3 text-xl">
                <p class="font-bold">{{ $article->title }}</p>
                <p class="mt-4">{!! $article->description !!}</p>
            </section>
        </div>
    </section>

    <script>
        function myFunction() {
            var shareInput = document.getElementById("share-input");
            shareInput.style.display = "inline-block";
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
