@extends('genre.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Edit Genre</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('film.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('film.update',$film->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Title:</strong></label>
                <input 
                    type="text" 
                    Title="name" 
                     name="name"
                    value="{{ $film->name }}"
                    class="form-control @error('Name') is-invalid @enderror" 
                    id="inputName" 
                    placeholder="Title">
                @error('Name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputGenre" class="form-label"><strong>Genres:</strong></label>
                <input 
                    type="text" 
                    Title="genres" 
                     name="genres"
                    value="{{ $film->genres()->pluck('genre_id') }}"
                    class="form-control @error('genres') is-invalid @enderror" 
                    id="inputGenre" 
                    placeholder="Title">
                @error('Name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputPublished" class="form-label"><strong>Genres:</strong></label>
                <input 
                    type="text" 
                    Title="genres" 
                     name="published"
                    value="{{ $film->published }}"
                    class="form-control @error('genres') is-invalid @enderror" 
                    id="inputPublished" 
                    placeholder="Title">
                @error('Name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </form>

    </div>
</div>

@if ($errors->any())

    <div class="alert alert-danger">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif
@endsection