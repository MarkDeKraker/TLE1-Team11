@extends('layouts.app')

@section('content')
<div class="container-home">
    @include('partials.search-filter')

    <!-- ARTICLELIST -->
    <section class="articleList">
        @foreach($articles as $article)
            @include('partials.article-list')
        @endforeach
    </section>


    <section class="articleList">
        <div class="article m-4 p-8 rounded-xl shadow-xl shadow-md-top flex">
            <h4 class="art-title text-xl font-bold">non-databse-dummyarticle</h4>
            <div class="art-tag">
            </div>
            <img src="images/dummy-img1.png" alt="dummy image" class="h-12 w-12 rounded">
        </div>
    </section>
</div>
@endsection
