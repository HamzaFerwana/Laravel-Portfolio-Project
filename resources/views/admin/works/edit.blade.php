@extends('admin.master')
@section('title', 'Edit Work | ' . env('APP_NAME'))

@section('content')

    <div class="container">
        <form action="{{ route('admin.works.update', $work->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-2">
                <label for="image">Image</label>
                <input type="file" name="image" id="image"
                    class="form-control @error('image')
                is-invalid
            @enderror">
                @error('image')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title', $work->title) }}"
                    class="form-control @error('title')
                    is-invalid
                @enderror">
                @error('title')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="category">Category</label>
                <input type="text" name="category" id="category" placeholder="Category" value="{{ old('category', $work->category) }}"
                    class="form-control @error('category')
                    is-invalid
                @enderror">
                @error('category')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="completionDate">Completion Date</label>
                <input type="date" name="completionDate" id="completionDate" placeholder="Completion Date" value="{{ old('completionDate', $work->completionDate) }}"
                    class="form-control @error('completionDate')
                    is-invalid
                @enderror">
                @error('completionDate')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-success">Submit</button>
        </form>

    </div>












@endsection
