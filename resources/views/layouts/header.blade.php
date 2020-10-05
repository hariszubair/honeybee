<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Honeybeetech.com.au</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/  css?family=Nunito" rel="stylesheet"> -->


 <!-- Fontfaces CSS-->
    <link href="{{ asset('public/css/cool/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('public/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('public/css/cool/theme.min.css') }}" rel="stylesheet" media="all">

    <!-- Styles -->
    <link href="{{ asset('public/css/user.css') }}" rel="stylesheet">

     <!-- Jquery JS-->
     <script src="{{ asset('public/vendor/jquery-3.2.1.min.js') }}"></script>
      <link href="{{asset('public/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('css/responsive.bootstrap4.min.css')}}" rel="stylesheet"> -->
    <link href="{{asset('public/css/buttons.dataTables.min.css')}}" rel="stylesheet">
  

</head>
<body class="animsition">
<div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="/">
                            <img style="height:50px" src="{{ asset('public/images/honey_bee.jpeg') }}" alt="Honey Bee" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                     
                            
                    @if(Auth::user()->hasRole(['Client', 'Candidate']))
                        <li class="active ">
                            <a style="color: #238DB7 !important" href="{{ URL('/profile') }}">
                                <i style="color: #238DB7 !important" class="fas fa-table"></i>Profile</a>
                        </li>
                        @endif
                    @if(Auth::user()->hasRole(['Client']) && Auth::user()->userinfo)
                   
                         <li >
                            <a style="color: #238DB7 !important" href="{{ URL('/candidate_search_view') }}">
                                <i style="color: #238DB7 !important" class="fas fa-users"></i>Candidate Search</a>
                        </li>
                      
                        <li >
                            <a style="color: #238DB7 !important" href="{{ URL('/selected_candidates') }}">
                                <i style="color: #238DB7 !important" class="fas fa-user"></i>Short Listed</a>
                        </li>
                      
                        @endif
                        <li >
                            <a style="color: #238DB7 !important" href="{{ URL('/change_password') }}">
                                <i style="color: #238DB7 !important" class="fas fa-user"></i>Change Password</a>
                        </li>
                        <li>
                            <a  href="{{ URL('/logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>{{ __('Logout') }}
                             </a>

                        </li>
                      
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->