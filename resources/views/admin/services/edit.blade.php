@extends('admin.master')
@section('title', 'Edit Service | ' . env('APP_NAME'))

@section('content')


    <div class="container">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="row">
                <div class="mb-2 col-md-6">
                    <label for="icon"><b>Icon</b></label>
                    <input type="text" name="icon" id="icon" placeholder="Icon" value="{{ old('icon', $service->icon) }}"
                        class="form-control @error('icon')
                        is-invalid
                    @enderror">
                    @error('icon')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-2 col-md-6">
                    <label for="title"><b>Title</b></label>
                    <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title', $service->title) }}"
                        class="form-control @error('title')
                        is-invalid
                    @enderror">
                    @error('title')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="mb-2 col-md-12">
                    <label for="description"><b>Description</b></label>
                    <textarea name="description" id="description"
                        class="form-control @error('description')
                    is-invalid
                @enderror"
                        placeholder="Description">{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.0.1/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: ['code']
        });
    </script>

@endsection
