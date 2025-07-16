@extends('genre.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Laravel CRUD Example</h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('genre.create') }}"><i class="fa fa-plus"></i> Create New Note</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Title</th>
                    <th>content</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($genres as $genre)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>{{ $genre->content }}</td>
                        <td>
                            <form action="{{ route('genre.destroy',$genre->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('genre.show',$genre->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('genre.edit',$genre->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
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
        
        {!! $genres->links() !!}

    </div>
</div>  

@endsection