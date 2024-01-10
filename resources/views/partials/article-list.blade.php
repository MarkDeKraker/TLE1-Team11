<a  href="{{ route('article.detail', $article->id) }}">
    <div class="article m-4 rounded-xl drop-shadow-2xl flex justify-between">
        <div>
            <img src="data:image/jpeg;base64,{{ $article->image }}" class="object-cover object-center w-full max-h-fit" alt="{{ $article->title }} Abeelding">
            <div class="p-2">
                <div class="pt-2">
                    @foreach($article->ages as $age)
                        <div class="rounded-full bg-orange-500 text-white text-xs px-2 py-1 inline-flex mr-2 mb-2">
                            {{ $age->age }}
                        </div>
                    @endforeach
                </div>
                <div>
                    @foreach($article->subjects as $subject)
                        <div class="rounded-full bg-white border  text-xs border-orange-500 px-2 py-1 inline-flex mr-2 mb-2">
                            {{ $subject->subject }}
                        </div>
                    @endforeach
                </div>

                <h4 class="art-title text-xl font-bold">{{ $article->title }}</h4>

                @hasrole('moderator')
                    @if(auth()->user()->id === $article->user_id || auth()->user()->id === 1)
                        <div class="mt-2 flex justify-end">
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
            </div>
        </div>
    </div>
</a>
