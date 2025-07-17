@extends('films.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Films index</h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('film.create') }}"><i class="fa fa-plus"></i> Create New Film</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($films as $film)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $film->name }}</td>
                        <td>
                        @forelse ($film->genres as $genre)
                           {{ $genre->name }},
                        @endforeach
                        </td>
                        <td>
                            <form action="{{ route('film.destroy',$film->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('film.show',$film->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('film.edit',$film->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {!! $films->links() !!}

    </div>
</div>  

@endsection