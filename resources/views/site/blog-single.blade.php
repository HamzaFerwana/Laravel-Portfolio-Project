@extends('site.master')
@section('title', 'Blog Single | ' . env('APP_NAME'))

@section('content')
    <!--/ Intro Skew Star /-->
    <div class="intro intro-single route bg-image"
        style="background-image: url({{ asset('siteassets/img/overlay-bg.jpg') }})">
        <div class="overlay-mf"></div>
        <div class="intro-content display-table">
            <div class="table-cell">
                <div class="container">
                    <h2 class="intro-title mb-4">Blog Details</h2>

                </div>
            </div>
        </div>
    </div>
    <!--/ Intro Skew End /-->

    <!--/ Section Blog-Single Star /-->
    <section class="blog-wrapper sect-pt4" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-box">
                        <div class="post-thumb">
                            <img src="{{ asset($blog->image) }}" class="img-fluid" alt="">
                        </div>
                        <div class="post-meta">
                            <h1 class="article-title">{{ $blog->title }}</h1>
                            <ul>
                                <li>
                                    <span class="ion-ios-person"></span>
                                    <a href="#">{{ $blog->user->name }}</a>
                                </li>
                                <li>
                                    <span class="ion-pricetag"></span>
                                    <a href="#">{{ $blog->category }}</a>
                                </li>
                                <li>
                                    <span class="ion-chatbox"></span>
                                    <a href="#">{{ $commentsCount }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="article-content">
                            <p>
                                {!! $blog->content !!}
                            </p>

                        </div>
                    </div>
                    <div class="box-comments">
                        <div class="title-box-2">
                            <h4 class="title-comments title-left">Comments ({{ $commentsCount }})</h4>
                        </div>
                        <ul class="list-comments">

                            @foreach ($comments as $comment)
                                <li>
                                    <div class="comment-avatar">
                                        <img src="{{ asset($comment->image) }}" alt="">
                                    </div>
                                    <div class="comment-details">
                                        <h4 class="comment-author">{{ $comment->name }}</h4>
                                        <span>{{ $comment->created_at->diffForHumans() }}</span>
                                        <p>
                                            {{ $comment->message }}
                                        </p>
                                        <a href="{{ route('devfolio.reply', [$blog->id, $comment->id]) }}">Reply</a>
                                    </div>
                                </li>
                                @foreach ($comment->replies as $reply)
                                <li class="comment-children">
                                    <div class="comment-avatar">
                                        <img src="{{ asset($reply->image) }}" alt="">
                                    </div>
                                    <div class="comment-details">
                                        <h4 class="comment-author">{{ $reply->name }}</h4>
                                        <span>{{ $reply->created_at->diffForHumans() }}</span>
                                        <p>
                                           {{ $reply->message }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                            @endforeach

                        </ul>
                    </div>
                    <div class="form-comments">
                        <div class="title-box-2">
                            <h3 class="title-left">
                                Leave a Comment
                            </h3>
                        </div>


                        <form class="form-mf" action="{{ route('devfolio.blog-comment-data', $blog->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control input-mf @error('name')
                        is-invalid
                    @enderror"
                                            id="inputName" placeholder="Name *" name="name" value="{{ old('name') }}">
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
                                        <textarea id="textMessage"
                                            class="form-control input-mf @error('message')
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
                <div class="col-md-4">
                    <div class="widget-sidebar">
                        <h5 class="sidebar-title">Other Posts From This Author</h5>
                        <div class="sidebar-content">
                            <ul class="list-sidebar">
                                @foreach ($otherBlogs as $blog)
                                    <li>
                                        <a href="{{ route('devfolio.blog', $blog->id) }}">{{ $blog->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Section Blog-Single End /-->
@endsection
