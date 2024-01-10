@extends('layouts.app')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@section('title')
    Edit Article
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-orange-500">
                <div class="card-header bg-orange-200 border-orange-500 text-2xl font-bold p-3">{{ __('Bewerk artikel') }}</div>

                <div class="card-body bg-orange-100">
                    <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-bold text-xl" for="title">Titel</label>
                            <input type="text" name="title" id="title" class="form-control border-orange-500 @error('title') is-invalid @enderror" value="{{ old('title', $article->title) }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <br>

                        <div class="form-group">
                            <label class="font-bold text-xl" for="description">Tekst</label>
                            {{-- <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $article->description) }}</textarea> --}}
                            <input name="description" id="description" type="hidden" value="{{ $article->description }}">
                            <div id="editor" class="form-control border-orange-500 @error('description') is-invalid @enderror"></div>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <br>

                        <div class="form-group">
                            <label class="font-bold text-xl">Leeftijden</label>
                            @foreach ($ages as $age)
                                <div class="form-check">
                                    <input
                                        class="form-check-input border-orange-500"
                                        type="checkbox"
                                        name="ages[]"
                                        value="{{ $age->id }}"
                                        id="age_{{ $age->id }}"
                                        {{ in_array($age->id, $article->ages->pluck('id')->toArray()) ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="age_{{ $age->id }}">
                                        {{ $age->age }}
                                    </label>
                                </div>
                            @endforeach
                            @error('ages')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <br>

                        <div class="form-group">
                            <label class="font-bold text-xl">Onderwerpen</label>
                            @foreach ($subjects as $subject)
                                <div class="form-check">
                                    <input
                                        class="form-check-input border-orange-500"
                                        type="checkbox"
                                        name="subjects[]"
                                        value="{{ $subject->id }}"
                                        id="subject_{{ $subject->id }}"
                                        {{ in_array($subject->id, $article->subjects->pluck('id')->toArray()) ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="subject_{{ $subject->id }}">
                                        {{ $subject->subject }}
                                    </label>
                                </div>
                            @endforeach
                            @error('subjects')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <br>

                        <div class="form-group">
                            <label  class="font-bold text-xl" for="image">Omslagfoto</label>
                            <input type="file" name="image" id="image" class="form-control border-orange-500 @error('image') is-invalid @enderror">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include the Quill library WYSIWYG library-->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<!-- Initialize Quill editor -->
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    quill.clipboard.dangerouslyPasteHTML(document.getElementById('description').value);

    quill.on('text-change', function() {
        var justHtml = quill.root.innerHTML;
        document.getElementById('description').value = justHtml;
    });
</script>
@endsection
