<form method="GET" action="{{route('home')}}">
    <div class="fixed top-34 bg-white w-full">

        <!-- SEARCHBAR -->
        <section>
            <div class="searchbar m-3">
                <label class="w-full">
                    <input class="block w-full p-3 ps-10 border border-orange-400 border-1 rounded-full text-xl"
                           type="text" placeholder="Zoeken naar titels en beschrijvingen..." name="search">
                </label>
            </div>
        </section>

        <!-- NAV -->
        <section>
            <div class="nav-tags">
                <div class="nav-subjects pr-4 pl-4 flex place-content-evenly">
                    @foreach($subjects as $subject)
                        <label class="inline-flex items-center">
                            <div class="p-2 m-2 text-2xl border-orange-500 hover:bg-orange-500 border-1 rounded-xl cursor-pointer
                                    transition-all duration-300 ease-in-out">
                                <input type="checkbox" name="subjects[]" value="{{$subject->id}}">
                                {{$subject->subject}}
                            </div>
                        </label>
                    @endforeach
                </div>

                <div class="nav-age pr-4 pl-4 flex place-content-evenly">
                    @foreach($ages as $age)
                        <label class="inline-flex items-center">
                            <div class="p-1 m-1 text-xl bg-orange-500 hover:bg-orange-300 rounded-2xl text-white font-bold cursor-pointer
                                    transition-all duration-300 ease-in-out">
                                <input type="checkbox" name="ages[]" value="{{$age->id}}">
                                {{$age->age}} Jaar
                            </div>
                        </label>
                    @endforeach
                </div>
                
                <div class="col-md-auto">
                    <button type="submit" class="btn btn-primary btn-sm">Filters Toevoegen</button>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">Verwijder Filters</a>
                </div>
            </div>
        </section>
    </div>
</form>
