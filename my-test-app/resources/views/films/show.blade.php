@extends('genre.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Show Film</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('film.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong> <br/>
                    {{ $film->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>genres:</strong> <br/>
                    @foreach ($film->genres as $genre)
                        {{ $genre->name }},
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>published:</strong> <br/>
                        {{ $film->published ? 'published' : 'hiden' }},
                
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>poster:</strong> <br/>
                        <img src="{{ $film->posterlink  }}">
                
                </div>
            </div>
        </div>

    </div>
</div>
@endsection