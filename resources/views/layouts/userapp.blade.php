<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Honeybeetech.com.au</title>

    <!-- Scripts -->
   <!--<script src="{{ asset('public/js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


 <!-- Fontfaces CSS-->
    <link href="{{ asset('public/css/cool/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('public/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('public/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('public/css/cool/theme.css') }}" rel="stylesheet" media="all">

    <!-- Styles -->
    <link href="{{ asset('public/css/user.css') }}" rel="stylesheet">

     <!-- Jquery JS-->
     <script src="{{ asset('public/vendor/jquery-3.2.1.min.js') }}"></script>

</head>
<body class="animsition">
<div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="/">
                            <img src="{{ asset('public/images/honey_bee.jpeg') }}" alt="Honey Bee" />
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
                     
                        <li>
                            <a href="{{ URL('/user-profile') }}">
                                <i style="color: #238DB7 !important" class="fas fa-table"></i>Profile</a>
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

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
               <a href="#">
                    <img src="{{ asset('public/images/honey_bee.jpeg') }}" alt="Honey Bee" />
                </a>
               
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                     
                    
                        <li class="active ">
                            <a style="color: #238DB7 !important" href="{{ URL('/user-profile') }}">
                                <i style="color: #238DB7 !important" class="fas fa-table"></i>Profile</a>
                        </li>
                    
                       
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

      <!-- PAGE CONTAINER-->
      <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                         
                            <div class="header-button">
                               
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo Auth::user()->name; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">   
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo Auth::user()->name; ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo Auth::user()->email; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                              
                                              <a  href="{{ URL('/logout') }}"                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>{{ __('Logout') }}
                                             </a>

                                                <form id="logout-form" action="{{ URL('/logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

        <div class="main-content">
            <div class="section__content section__content--p30">
                    @yield('content')
            </div>
        </div>

           
            <!-- Bootstrap JS-->
            <script src="{{ asset('public/vendor/bootstrap-4.1/popper.min.js') }}"></script>
            <script src="{{ asset('public/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
            <!-- Vendor JS       -->
            <script src="{{ asset('public/vendor/slick/slick.min.js') }}"></script>
            <script src="{{ asset('public/vendor/wow/wow.min.js') }}"></script>
            <script src="{{ asset('public/vendor/animsition/animsition.min.js') }}"></script>
            <script src="{{ asset('public/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
            <script src="{{ asset('public/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
            <script src="{{ asset('public/vendor/counter-up/jquery.counterup.min.js') }}"></script>
            <script src="{{ asset('public/vendor/circle-progress/circle-progress.min.js') }}"></script>
            <script src="{{ asset('public/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
            <script src="{{ asset('public/vendor/chartjs/Chart.bundle.min.js') }}"></script>
            <script src="{{ asset('public/vendor/select2/select2.min.js') }}">
            </script>

            <!-- Main JS-->
            <script src="{{ asset('public/js/cool/main.js') }}"></script>
             <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        

    </div>
    </div>
</body>
</html>
