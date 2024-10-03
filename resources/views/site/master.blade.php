<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title', env('APP_NAME'))</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="@yield('keywords')" name="keywords">
  <meta content="@yield('description')" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('siteassets/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('siteassets/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('siteassets/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('siteassets/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('siteassets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('siteassets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('siteassets/css/style.css') }}" rel="stylesheet">
  @yield('styles')
  <!-- =======================================================
    Theme Name: DevFolio
    Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="page-top">

  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">

       @if (request()->routeIs('devfolio.index'))
       <a class="navbar-brand js-scroll" href="#page-top">DevFolio</a>
       @endif
      <a class="navbar-brand js-scroll" href="{{ route('devfolio.index') }}">Home</a>

      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">

@if (request()->routeIs('devfolio.index'))
<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link js-scroll active" href="#home">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link js-scroll" href="#about">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link js-scroll" href="#service">Services</a>
    </li>
    <li class="nav-item">
      <a class="nav-link js-scroll" href="#work">Work</a>
    </li>
    <li class="nav-item">
      <a class="nav-link js-scroll" href="#blog">Blog</a>
    </li>

  </ul>
@endif

      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

        @yield('content')



  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('siteassets/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('siteassets/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('siteassets/lib/popper/popper.min.js') }}"></script>
  <script src="{{ asset('siteassets/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('siteassets/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('siteassets/lib/counterup/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('siteassets/lib/counterup/jquery.counterup.js') }}"></script>
  <script src="{{ asset('siteassets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('siteassets/lib/lightbox/js/lightbox.min.js') }}"></script>
  <script src="{{ asset('siteassets/lib/typed/typed.min.js') }}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('siteassets/contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('siteassets/js/main.js') }}"></script>
  @yield('scripts')
</body>
</html>
