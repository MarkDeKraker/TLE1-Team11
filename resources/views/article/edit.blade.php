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
            <div class="card">
                <div class="card-header">{{ __('Edit Article') }}</div>

                <div class="card-body">
                    <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $article->title) }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Text</label>
                            {{-- <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $article->description) }}</textarea> --}}
                            <input name="description" id="description" type="hidden" value="{{ $article->description }}">
                            <div id="editor" class="form-control @error('description') is-invalid @enderror"></div>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ages">Ages</label>
                            <p>Hold 'CTRL' to select multiple</p>
                            <select name="ages[]" id="ages" class="form-control @error('ages') is-invalid @enderror" multiple>
                                @foreach ($ages as $age)
                                    <option value="{{ $age->id }}" {{ in_array($age->id, $article->ages->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $age->age }}</option>
                                @endforeach
                            </select>
                            @error('ages')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subjects">Subjects</label>
                            <p>Hold 'CTRL' to select multiple</p>
                            <select name="subjects[]" id="subjects" class="form-control @error('subjects') is-invalid @enderror" multiple>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ in_array($subject->id, $article->subjects->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $subject->subject }}</option>
                                @endforeach
                            </select>
                            @error('subjects')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
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
