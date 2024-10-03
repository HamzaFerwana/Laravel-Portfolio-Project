@extends('site.master')
@section('title', 'Reply | ' . env('APP_NAME'))
@section('content')
    <div class="container my-5">

            <div class="comment-avatar">
                <img src="{{ asset($comment->image) }}" height="200">
            </div>
            <div class="comment-details">
                <h4 class="comment-author">{{ $comment->name }}</h4>
                <span>{{ $comment->created_at->diffForHumans() }}</span>
                <p>
                {{ $comment->message }}
                </p>
            </div>

        <hr>

        <div class="form-comments">
            <div class="title-box-2">
                <h3 class="title-left">
                    Leave a Reply
                </h3>
            </div>


            <form class="form-mf" action="{{ route('devfolio.reply-data', [$blog->id, $comment->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input type="text"
                                class="form-control input-mf @error('name')
        is-invalid
    @enderror" id="inputName"
                                placeholder="Name *" name="name" value="{{ old('name') }}">
                            @error('name')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input type="email"
                                class="form-control input-mf
                          @error('email')
        is-invalid
    @enderror"
                                placeholder="Email *" name="email" value="{{ old('email') }}">
                            @error('email')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <input type="file"
                                class="form-control input-mf
                             @error('image')
          is-invalid
      @enderror"
                                placeholder="image *" name="image">
                            @error('image')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <textarea id="textMessage" class="form-control input-mf @error('message')
    is-invalid
    @enderror"
                                placeholder="Comment *" name="message" cols="45" rows="8">{{ old('message') }}</textarea>
                            @error('message')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="button button-a button-big button-rouded">Send
                            Message</button>
                    </div>
                </div>
            </form>


        </div>
    </div>












@endsection
