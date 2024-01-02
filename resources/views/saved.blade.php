@extends('layouts.app')

@section('content')
    <!-- SEARCHBAR -->
    <section class="flex justify-center">
        @include('partials.search-filter')
    </section>

    <section class="flex">
        <h2 class="ml-20 m-1 font-semibold">Populaire artikelen</h2>
        <button id="openModalButton" class="art-btn-filter"> Filters
            <!-- <img class="w-4" src="icons/chevron-down.png" /> -->
        </button>
    </section>

    <!-- Modal -->
    <div id="overlay" class="overlay"></div>
    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal"><img src="icons/close.png" /></span>
            <form class="filter-form" action="#" method="get">
                <div class="filter-subject">
                    <div class="filter-title">Categorie</div>
                    <label>
                        <input class="sub-btn" type="checkbox" name="category[]" value="Werk"> Werk
                    </label>
                    <label>
                        <input class="sub-btn" type="checkbox" name="category[]" value="Gezondheid"> Gezondheid
                    </label>
                    <label>
                        <input class="sub-btn" type="checkbox" name="category[]" value="Sociaal"> Sociaal
                    </label>
                </div>

                <div class="filter-age">
                    <div class="filter-title">Leeftijd</div>
                    <label>
                        <input type="checkbox" name="age[]" value="14-16"> 14-16 jaar
                    </label>
                    <label>
                        <input type="checkbox" name="age[]" value="12-14"> 12-14 jaar
                    </label>
                    <label>
                        <input type="checkbox" name="age[]" value="16-18"> 16-18 jaar
                    </label>
                    <label>
                        <input type="checkbox" name="age[]" value="18+"> 18+
                    </label>
                </div>
                <div class="filter-btn">
                    <input type="submit" value="filters toepassen" src="icons/close.png">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- FAVORITE ARTICLELIST -->
<section class="articlelist">
    @foreach ($articles as $article)
        @include('partials.article-list')
    @endforeach
</section>

<!-- CREATE BUTTON -->
<a href="{{ route('article.create') }}" class="new-art-btn"><img src="icons/plus_icon.png"></a>
</div>
@endsection
