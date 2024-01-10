
    <!-- SEARCHBAR -->
    <section class="flex justify-center">
        <div class="searchbar m-3">
            <form method="GET" action="">
                <label class="w-full">
                    <input id="search-input" class="search-input" type="text" name="search" placeholder="Zoeken naar titels en beschrijvingen..." value="{{ !empty($searchInput) ? $searchInput : null }}">
                </label>
            </form>
        </div>
    </section>

    <section class="flex">
        <h2 class="ml-20 m-1 font-semibold">Artikelen</h2>
        <button id="openModalButton" class="art-btn-filter">Filters</button>
        <a href="{{ route('article.create') }}" class="new-art-btn">Nieuw artikel</a>
    </section>

    <!-- Modal -->
    <div id="overlay" class="overlay"></div>

    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal"><img src="icons/close.png" /></span>
            <form class="filter-form" action="" method="get">
                <div class="filter-col">
                    <div class="filter-row">
                        <div class="filter-col">
                            <div class="filter-title">Categorie</div>
                            @foreach($subjects as $subject)
                                <label>
                                    <input class="sub-btn" type="checkbox" name="subjects[]" value="{{$subject->id}}" {{ in_array($subject->id, $selectedSubjects) ? "checked" : "" }}> {{$subject->subject}}
                                </label>
                            @endforeach
                        </div>

                        <div class="filter-col">
                            <div class="filter-title">Leeftijd</div>
                            @foreach($ages as $age)
                                <label>
                                    <input type="checkbox" name="ages[]" value="{{$age->id}}" {{ in_array($age->id, $selectedAges) ? "checked" : "" }}> {{$age->age}} Jaar
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="filter-col">
                        <button type="submit" class="filter-btn">filters toepassen</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
