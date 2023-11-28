@extends('layouts.app')

@section('content')

@foreach ($articles as $article)
    <div>
        <h2>{{ $article->title }}</h2>
        <p>{{ $article->description }}</p>
    </div>
@endforeach

@endsection
