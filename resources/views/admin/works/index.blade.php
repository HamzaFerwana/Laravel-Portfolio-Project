@extends('admin.master')
@section('title', 'Works | ' . env('APP_NAME'))

@section('content')
    <div class="container">
        @if (session('msg'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('msg') }}
            </div>
        @endif
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Completion Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($works as $work)
                    <tr>
                        <td>{{ $work->id }}</td>
                        <td><img src="{{ asset($work->image) }}" height="100px" width="100px"></td>
                        <td>{{ $work->title }}</td>
                        <td>{{ $work->category }}</td>
                        <td>{{ $work->completionDate }}</td>
                        <td>
                            <a href="{{ route('admin.works.edit', $work->id) }}" class="btn btn-sm btn-success"><i
                                    class="fas fa-edit"></i></a>
                            <form class="d-inline" action="{{ route('admin.works.destroy', $work->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="6" class="text-center">No Data Found.</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $works->links() }}














    </div>
@endsection
