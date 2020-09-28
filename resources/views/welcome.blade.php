<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>honeybeetech.com.au</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

         <!-- Bootstrap CSS-->
    <link href="{{ asset('public/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/css/frontend.css') }}" rel="stylesheet" media="all">

  </head>
    <body>
        <div class="container">
            <div class="row header clearfix">
                <div class="col-md-6 col-12"> 
                     <a class="logo" href="/">
                        <img src="{{ asset('public/images/honey_bee.jpeg') }}" alt="Honey Bee"  width="200" class="img-fluid" />
                     </a>
                </div>
                <div class="col-md-6 col-12">
                    
                    @if (Route::has('login'))
                        <nav>
                            <ul class="nav nav-pills float-right">
                                @auth
                                <li><a href="{{ url('/profile') }}">Profile</a></li>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                        @if (Route::has('register'))
                                        <li>  <a href="{{ route('register') }}">Register</a></li>
                                        @endif
                                    
                                @endauth
                            </ul>
                        </nav>
                    @endif
                
                </div>
            </div>
        
            <div class="row" id="home_top_banner">
                <div class="col-md-6 col-12 bannner_box">
                    <img src="{{ asset('public/images/home_left.jpeg') }}"  />
                </div>
                <div class="col-md-6  col-12  bannner_box">
                    <div class="registration_box">See for yourself the candidates on<br /> 
                        our platform by a press of a button
                        
                            <div class="button_wrapper"><a href="/register" style="width: 145px;" class="blue_button">Register Now </a></div>

                    </div>
                </div>
            </div>



            <div class="row" id="home_about">
            
            </div>


    
        </div>


        <div class="container-fluid gray_bg">
            <div class="container " id="about_us_wrapper" >
                <div class="col-md-12  col-12  ">
                    <h2>About us</h2>
                    <p> Honeybee Tech is a recruitment technology platform which is built <br>
                    to provide organisations real-time access to quality candidates who <br />
                    are “currently” looking for work.  We are your live recruitment partner.</p>

                    <p>You simply register and select which role you need filling in and get access<br />
                    to candidates who are currently looking for a change or are unemployed.</p>

                    <p>
                    The best part is - it is free to search for candidates. Any time you need a <br>
                    backfill, someone to help you in busy times, or maybe to help you grow, <br>
                    simply login and see who is available.
                    </p>
                    <p>
                    You can decide to interview pre-selected candidates yourself or ask our <br>
                    team of specialised recruiters to interview for you. 
                    </p>
                    <p>
                    Gone are the days of writing an ad on Seek, sifting through hundreds of <br>
                    resumes or spending hours on interviewing the candidate.
                    </p>
                </div>
            </div>
        </div>







<div class="container-fluid white_bg">
    <div class="container " >
    
    <div class="row" id="home_contact_text">
                 <div class="col-md-12  col-12  ">
                    <h2>Contact Us</h2>
                    <p>For further information or in depth understanding of what Honeybee Tech are about, please contact them to discuss your 
        particular experience query and situation to determine how they can assist.</p>
                     <p>We cover the below cities all from our Gold Coast office. </p>
                </div>
            </div>

        <div class="row" id="home_contact_map">
                 <div class="col-md-6  col-12  ">
                        <img src="{{ asset('public/images/map.png') }}"  />
                </div>
                <div class="col-md-6  col-12 " id="address_text_wrapper">
                    <p><span class="blue">Address</span><br />
                    Paradise Point<br />
                    Gold Coast, QLD Australia
                    </p>
                    <p><span class="blue">Web</span><br />
                        www.honeybeetech.com.au</p>
                    <p><span class="blue">Phone</span><br />
                    Indy - 0424 853 384<br />
                    Dan - 0499 204 775</p>
                    <p><span class="blue">Email</span><br />
                    admin@honeybeerecruiting.com.au </p>
                </div>
            </div>
    </div>
  </div>   
    </body>
</html>
