@extends('layouts.app')

@section('content')
<!-- SEARCHBAR & FILTERS -->
@include('partials.search-filter')

@if ((!empty($selectedSubjects)) || (!empty($selectedAges)))
<section class="ml-20">
    <a href="{{ route('home') }}" class="filter-link">filters verwijderen</a>
</section>
@endif

<!-- ARTICLELIST -->
<section class="articlelist">
    @foreach ($articles as $article)
    @include('partials.article-list')
    @endforeach
</section>

@endsection