@extends('layouts.app')

@section('content')
<!-- SEARCHBAR & FILTERS -->
@include('partials.search-filter')

@if ((!empty($selectedSubjects)) || (!empty($selectedAges)))
<section class="ml-20">
    <a href="{{ route('saved') }}" class="filter-link">filters verwijderen</a>
</section>
@endif

<!-- FAVORITE ARTICLELIST -->
<section class="articlelist">
    @foreach ($articles as $article)
        @include('partials.article-list')
    @endforeach
</section>

<!-- CREATE BUTTON -->
@hasrole('moderator')
    <a href="{{ route('article.create') }}" class="new-art-btn"><img src="icons/plus_icon.png"></a>
@endhasrole
@endsection
