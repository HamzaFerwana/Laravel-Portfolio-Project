@extends('site.master')
@section('title', 'Home | ' . env('APP_NAME'))

@section('content')
  <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image" style="background-image: url({{ asset(settings()->get('image')) }})">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="intro-title mb-4">I am {{ settings()->get('title') }}</h1>
          <p class="intro-subtitle"><span class="text-slider-items">{{ settings()->get('subtitle') }}</span><strong class="text-slider"></strong></p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-sm-6 col-md-5">
                    <div class="about-img">
                      <img src="{{ asset(settings()->get('aboutMeImage')) }}" class="img-fluid rounded b-shadow-a" alt="">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-7">
                    <div class="about-info">
                      <p><span class="title-s">Name: </span> <span>{{ settings()->get('name') }}</span></p>
                      <p><span class="title-s">Profile: </span> <span>{{ settings()->get('profile') }}</span></p>
                      <p><span class="title-s">Email: </span> <span>{{ settings()->get('email') }}</span></p>
                      <p><span class="title-s">Phone: </span> <span>{{ settings()->get('phone') }}</span></p>
                    </div>
                  </div>
                </div>
                <div class="skill-mf">
                  <p class="title-s">Skill</p>
             @foreach ($skills as $skill)
             <span>{{ $skill->name }}</span> <span class="pull-right">{{ $skill->percentage }}%</span>
             <div class="progress">
               <div class="progress-bar" role="progressbar" style="width: {{ $skill->percentage }}%;" aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0"
                 aria-valuemax="100"></div>
             </div>
             @endforeach

                </div>
              </div>
              <div class="col-md-6">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      About me
                    </h5>
                  </div>
                  <p class="lead">
                    {!! settings()->get('description') !!}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--/ Section Services Star /-->
  <section id="service" class="services-mf route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Services
            </h3>
            <p class="subtitle-a">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">

       @foreach ($services as $service)
       <div class="col-md-4">
        <div class="service-box">
          <div class="service-ico">
            <span class="ico-circle"><?= $service->icon ?></span>
            {{-- @dd($service->icon) --}}
          </div>
          <div class="service-content">
            <h2 class="s-title">{{ $service->title }}</h2>
            <p class="s-description text-center">
                {!! $service->description !!}
            </p>
          </div>
        </div>
      </div>
       @endforeach

      </div>
    </div>
  </section>
  <!--/ Section Services End /-->

  <div class="section-counter paralax-mf bg-image" style="background-image: url({{ asset('siteassets/img/counters-bg.jpg') }})">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-checkmark-round"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">{{ settings()->get('worksCompleted') }}</p>
              <span class="counter-text">WORKS COMPLETED</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-calendar-outline"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">{{ settings()->get('yearsOfExperience') }}</p>
              <span class="counter-text">YEARS OF EXPERIENCE</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-people"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">{{ settings()->get('totalClients') }}</p>
              <span class="counter-text">TOTAL CLIENTS</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ribbon-a"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">{{ settings()->get('awardsWon') }}</p>
              <span class="counter-text">AWARD WON</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Section Portfolio Star /-->
  <section id="work" class="portfolio-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Portfolio
            </h3>
            <p class="subtitle-a">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
      @foreach ($works as $work)
      <div class="col-md-4">
        <div class="work-box">
          <a href="{{ asset($work->image) }}" data-lightbox="gallery-mf">
            <div class="work-img">
              <img src="{{ asset($work->image) }}" alt="" class="img-fluid">
            </div>
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">{{ $work->title }}</h2>
                  <div class="w-more">
                    <span class="w-ctegory">{{ $work->category }}</span> / <span class="w-date">
                        {{ $work->completionDate }}
                    </span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                    <span class="ion-ios-plus-outline"></span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      @endforeach


      </div>
    </div>
  </section>
  <!--/ Section Portfolio End /-->



  <!--/ Section Blog Star /-->
  <section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Blog
            </h3>
            <p class="subtitle-a">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-md-4">
            <div class="card card-blog">
              <div class="card-img">
                <a href="{{ route('devfolio.blog', $blog->id) }}"><img src="{{ asset($blog->image) }}" alt="" class="img-fluid"></a>
              </div>
              <div class="card-body">
                <div class="card-category-box">
                  <div class="card-category">
                    <h6 class="category">{{ $blog->category }}</h6>
                  </div>
                </div>
                <h3 class="card-title"><a href="{{ route('devfolio.blog', $blog->id) }}">{{ $blog->title }}</a></h3>
                <p class="card-description">
                    <b>Comments ({{ $blog->comments->count() }})</b>
                </p>
              </div>
              <div class="card-footer">
                <div class="post-author">
                  <a href="#">
                    <img src="https://ui-avatars.com/api/?name={{ $blog->user->name }}" alt="" class="avatar rounded-circle">
                    <span class="author">{{ $blog->user->name }}</span>
                  </a>
                </div>
                <div class="post-date">
                  <span class="ion-ios-clock-outline"></span> {{ $blog->created_at->diffForHumans() }}
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <!--/ Section Blog End /-->
  @endsection
@section('scripts')
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection


