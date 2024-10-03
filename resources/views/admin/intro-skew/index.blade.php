@extends('admin.master')
@section('title', 'Intro Skew | ' . env('APP_NAME'))

@section('content')
<div class="container">
@if (session('msg'))
<div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
</div>
@endif

        <form action="{{ route('admin.intro-skew-data') }}" method="POST" enctype="multipart/form-data">
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
                <label for="title"><b>Title</b></label>
                <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title', settings()->get('title')) }}" class="form-control @error('title')
                    is-invalid
                @enderror">
                @error('title')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="subtitle">Subtitle</label>
                <input type="text" name="subtitle" id="subtitle" placeholder="Subtitle" value="{{ old('subtitle', settings()->get('subtitle')) }}" class="form-control @error('subtitle')
                    is-invalid
                @enderror">
                @error('subtitle')
                <small class="invalid-feedback">The subtitle may only contain alphabetic character,  spaces and commas.</small>
                @enderror
            </div>
            <div class="mb-2">
                <small>Note: Your subtitle must be in this format to function correctly in website: `sentence,sentence,...`.

                </small>
            </div>
            <button class="btn btn-success">Submit</button>





        </form>
    </div>

@endsection
