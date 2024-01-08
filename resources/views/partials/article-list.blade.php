<a href="{{ route('article.detail', $article->id) }}">
    <div class="article m-4 p-8 rounded-xl shadow-xl shadow-md-top flex justify-between">
        <div>
            <h4 class="art-title text-xl font-bold">{{ $article->title }}</h4>
            <p>{{ $article->description }}</p>
            @foreach($article->ages as $age)
                <ul class="inline-flex">{{$age->age}},</ul>
            @endforeach
            @foreach($article->subjects as $subject)
                <ul class="inline-flex">{{$subject->subject}},</ul>
            @endforeach
        </div>
        <div class="ml-4 mt-2">
            <button><img src="icons/delete.png" alt="delete button" class=" bg-red-600 w-8 rounded-2xl mr-3 hover:bg-red-700"></button>
            <button><img src="icons/delete.png" alt="edit button" class=" bg-blue-600 w-8 rounded-2xl hover:bg-blue-700"></button>
        </div>
        <div class="art-tag"></div>
        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }} Abeelding" class="h-12 w-12 rounded">
    </div>
</a>
