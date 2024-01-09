<a href="{{ route('article.detail', $article->id) }}">
    <div class="article m-4 p-8 rounded-xl shadow-xl shadow-md-top flex justify-between">
        <div>
            <div class="w-full relative">
                <img src="data:image/jpeg;base64,{{ $article->image }}" class="object-cover object-center w-full h-full z-0" alt="{{ $article->title }} Abeelding">
                <div class="absolute top-0 left-0 w-full h-full z-10"></div>
            </div>
            <h4 class="art-title text-xl font-bold">{{ $article->title }}</h4>
            <p>{{ $article->description }}</p>
            @foreach($article->ages as $age)
                <ul class="inline-flex">{{$age->age}},</ul>
            @endforeach
            @foreach($article->subjects as $subject)
                <ul class="inline-flex">{{$subject->subject}},</ul>
            @endforeach
        </div>
        @hasrole('moderator')
            @if(auth()->user()->id === $article->user_id || auth()->user()->id === 1)
                <div class="ml-4 mt-2 flex">
                    <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="bg-red-600 w-8 rounded-2xl mr-3 p-2 hover:bg-red-700">
                            <i class="fa-solid fa-trash text-amber-50"></i>
                        </button>
                    </form>
                    <a href="{{ route('article.edit', $article->id) }}">
                        <div class=" bg-blue-600 w-8 mr-3 p-2 rounded-2xl hover:bg-blue-700"><i class="text-amber-50 fa-solid fa-pencil"></i></div>
                    </a>
                </div>
            @endif
        @endhasrole
    </div>
</a>
