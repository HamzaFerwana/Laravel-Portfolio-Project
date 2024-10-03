@extends('admin.master')
@section('title', 'About Me | ' . env('APP_NAME'))

@section('content')

    <div class="container">
        @if (session('msg'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('msg') }}
            </div>
        @endif
        <form action="{{ route('admin.about-me-data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="image"><b>Image</b></label>
                <input type="file" name="image" id="image"
                    class="form-control @error('image')
                is-invalid
            @enderror">
                @error('image')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="name"><b>Name</b></label>
                <input type="text" name="name" id="name" placeholder="Name"
                    value="{{ old('name', settings()->get('name')) }}"
                    class="form-control @error('name')
            is-invalid
            @enderror">
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="profile"><b>Profile</b></label>
                <input type="text" name="profile" id="profile" placeholder="Profile"
                    value="{{ old('profile', settings()->get('profile')) }}"
                    class="form-control @error('profile')
            is-invalid
            @enderror">
                @error('profile')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="email"><b>Email</b></label>
                <input type="text" name="email" id="email" placeholder="Email"
                    value="{{ old('email', settings()->get('email')) }}"
                    class="form-control @error('email')
            is-invalid
            @enderror">
                @error('email')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="phone"><b>Phone</b></label>
                <input type="text" name="phone" id="phone" placeholder="Phone"
                    value="{{ old('phone', settings()->get('phone')) }}"
                    class="form-control @error('phone')
            is-invalid
            @enderror">
                @error('phone')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="description"><b>Description</b></label>
                <textarea name="description" id="description" placeholder="Description"
                    class="form-control @error('description')
                    is-invalid
                @enderror">{{ old('description', settings()->get('description')) }}</textarea>
                @error('description')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-success">Submit</button>
        </form>
        <hr>
        <h2>Skills</h2>
        <form action="{{ route('admin.skills-data') }}" method="POST">
            @csrf
            <div class="mb-2">
                <label for="skillName">Skill Name</label>
                <input type="text" name="skillName" id="skillName" placeholder="Skill Name"
                    value="{{ old('skillName') }}"
                    class="form-control @error('skillName')
                is-invalid
                @enderror">
                @error('skillName')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="percentage">Percentage</label>
                <input type="text" name="percentage" id="percentage" value="{{ old('percentage') }}"
                    placeholder="Percentage"
                    class="form-control @error('percentage')
                is-invalid
                @enderror">
                @error('percentage')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
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
