<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href={{ asset('assets/img/mmis.png') }} rel="icon">
    <link href={{ asset('assets/img/mmis.png') }} rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href={{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/icofont/icofont.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/boxicons/css/boxicons.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/venobox/venobox.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/remixicon/remixicon.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/vendor/aos/aos.css') }} rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href={{ asset('assets/css/style.css') }} rel="stylesheet">

    <!-- =======================================================
  * Template Name: Bootslander - v2.2.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container-fluid d-flex align-items-center">

            <div class="logo mr-auto">
                {{-- <h1 class="text-light"><a href={{ url('/') }}><span>Myanmar IT Service</span></a></h1> --}}
                <!-- Uncomment below if you prefer to use an image logo -->
            <a href="{{url('/')}}"><img src={{ asset('assets/img/mmitslogo.png') }} alt="" class="img-fluid"></a>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                
                <ul>
                    {{-- <li class="active"><a href={{ url('/') }}>{{ __('lang.Home') }}</a></li> --}}
                    <li><a href={{ url('/#about') }}>{{ __('lang.About') }}</a></li>
                    <li><a href={{ url('/#features') }}>{{ __('lang.Categories') }}</a></li>
                    <li><a href={{ url('/#gallery') }}>{{ __('lang.Gallery') }}</a></li>
                    <li><a href={{ url('/#team') }}>{{ __('lang.Team') }}</a></li>
                    <li><a href={{ url('/#pricing') }}>{{ __('lang.Pricing') }}</a></li>
                    <li class="drop-down"><a href={{ url('/posts') }}>{{ __('lang.Posts') }}</a></li>
                    <li><a href= {{ url('/#contact') }}>{{ __('lang.Contact') }}</a></li>
                    @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('lang.Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('lang.Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="text-info text-center px-0" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('lang.Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest                  
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"> 
                                {{ __('lang.ChangeLanguage') }}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-info text-center px-0" href="{{ url('localization/en') }}"> {{ __('English') }} </a>
                                <a class="dropdown-item text-info text-center px-0" href="{{ url('localization/my') }}"> {{ __('မြန်မာ') }} </a>
                            </div>
                        </li>
                        <li>
                            <a class="text-center text-center" data-toggle="modal" data-target="#SearchModal">
                                <i class="ri-search-line btn btn-info py-1 px-3" style="font:bold;" ></i>
                            </a>
                        </li>
                </ul>
                
            </nav><!-- .nav-menu -->
        </div>        
    </header><!-- End Header -->
    <div class="modal fade" id="SearchModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">                
            <div class="modal-body p-1">
              <form action="/posts">
                  <input type="text" class="form-control" name="search" placeholder="Search Post">
              </form>
            </div>
          </div>
        </div>
      </div>