@extends('admin.master')
@section('title' . 'Accomplishments | ' . env('APP_NAME'))

@section('content')

    <div class="container">
        @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
        @endif
        <form action="{{ route('admin.accomplishments-data') }}" method="POST">
            @csrf
            <div class="mb-2">
                <label for="worksCompleted">Works Completed</label>
                <input type="text" name="worksCompleted" id="worksCompleted" placeholder="Works Completed"
                    value="{{ old('worksCompleted', settings()->get('worksCompleted')) }}"
                    class="form-control @error('worksCompleted')
                is-invalid
            @enderror">
                @error('worksCompleted')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="yearsOfExperience">Years of Experience</label>
                <input type="text" name="yearsOfExperience" id="yearsOfExperience" placeholder="Years of Experience"
                    value="{{ old('yearsOfExperience', settings()->get('yearsOfExperience')) }}"
                    class="form-control @error('yearsOfExperience')
                is-invalid
            @enderror">
                @error('yearsOfExperience')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="totalClients">Total Clients</label>
                <input type="text" name="totalClients" id="totalClients" placeholder="Total Clients"
                    value="{{ old('totalClients', settings()->get('totalClients')) }}"
                    class="form-control @error('totalClients')
                is-invalid
            @enderror">
                @error('totalClients')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="awardsWon">Awards Won</label>
                <input type="text" name="awardsWon" id="awardsWon" placeholder="Awards Won"
                    value="{{ old('awardsWon', settings()->get('awardsWon')) }}"
                    class="form-control @error('awardsWon')
                is-invalid
            @enderror">
                @error('awardsWon')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-success">Submit</button>

        </form>
    </div>












@endsection
