@extends('admin.master')
@section('title', 'Services | ' . env('APP_NAME'))

@section('content')

    <div class="container">
        @if (session('msg'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('msg') }}
            </div>
        @endif
        <table class="table table-bordered table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->icon }}</td>
                        <td>{{ $service->title }}</td>
                        <td>{!! $service->description !!}</td>
                        <td>
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-success"><i
                                    class="fas fa-edit"></i></a>
                            <hr>
                            <form class="d-inline" action="{{ route('admin.services.destroy', $service->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th class="text-center" colspan="5">No Data Found</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
