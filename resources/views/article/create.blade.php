@extends('layouts.app')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@section('title')
    Create
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Maak een nieuw artikel') }}</div>

                    <div class="card-body">
                        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title" >Titel</label>
                                <input type="text" name="title" id="title"  class="form-control @error('title') is-invalid @enderror"  value="{{ old('title') }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Tekst</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"  >{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ages" >Leeftijden</label>
                                <p>Hold 'CTRL' to select multiple</p>
                                <select name="ages[]" id="ages" class="form-control @error('ages') is-invalid @enderror"  multiple>
                                    @foreach ($ages as $age)
                                        <option value="{{ $age->id }}">{{ $age->age }}</option>
                                    @endforeach
                                </select>
                                @error('ages')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subjects" >Onderwerpen</label>
                                <p>Hold 'CTRL' to select multiple</p>
                                <select name="subjects[]" id="subjects" class="form-control @error('subjects') is-invalid @enderror"  multiple>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                    @endforeach
                                </select>
                                @error('subjects')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image" >Image</label>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror"  >
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
@endsection
