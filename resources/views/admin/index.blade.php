@extends('admin.master')
@section('title', 'Dashboard | ' . env('APP_NAME'))

@section('content')
    <div class="container">
        <form action="{{ route('admin.notify') }}" method="POST" class="my-5">
            @csrf
            <h1>Notify!</h1>
            <button class="btn btn-primary">Notify</button>
        </form>
        <h1>Notifications ({{ Auth::user()->unreadnotifications->count() }})</h1>
        <div class="list-group my-5">
           @foreach (Auth::user()->notifications as $noti)
           <a href="{{ route('admin.read-notification', $noti->id) }}" class="list-group-item list-group-item-action {{ $noti->read_at == null ? 'active' : '' }}" aria-current="true">
            {{ $noti->data['title'] }} | {{ $noti->data['content'] }}
        </a>
           @endforeach
        </div>

    </div>


@endsection
