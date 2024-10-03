@extends('admin.master')
@section('title', 'Edit Skills | ' . env('APP_NAME'))

@section('content')

<div class="container">
    <form action="{{ route('admin.edit-skill-data', $skill->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name', $skill->name) }}" class="form-control @error('name')
                is-invalid
            @enderror">
            @error('name')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-2">
            <label for="percentage">percentage</label>
            <input type="text" name="percentage" id="percentage" placeholder="percentage" value="{{ old('percentage', $skill->percentage) }}" class="form-control @error('percentage')
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
