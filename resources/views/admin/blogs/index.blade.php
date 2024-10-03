@extends('admin.master')
@section('title', 'Blogs | ' . env('APP_NAME'))

@section('content')

    <div class="container">
        @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
        @endif
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td><img src="{{ asset($blog->image) }}" height="100" width="100"></td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->category }}</td>
                        <td>{{ $blog->user->name }}</td>
                        <td>
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-success"><i
                                    class="fas fa-edit"></i></a>
                            <form class="d-inline" action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST">
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
        {{ $blogs->links() }}
    </div>










@endsection
