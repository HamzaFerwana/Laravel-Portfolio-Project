@extends('admin.master')
@section('title', 'Skills | ' . env('APP_NAME'))

@section('content')

    <div class="container">
        @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
        @endif
        <h1>Skills</h1>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Percentage</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skills as $skill)
                <tr>
                    <td>{{ $skill->id }}</td>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->percentage }}</td>
                    <td>
                        <a href="{{ route('admin.edit-skill', $skill->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.delete-skill', $skill->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>






    </div>

@endsection
