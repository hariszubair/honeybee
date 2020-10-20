<!DOCTYPE html>
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
       function onSubmit(token) {
         document.getElementById("registration").submit();
       }
     </script>
     <style type="text/css">
         .rc-anchor-light.rc-anchor-normal {
            width: 80%
         }
         .rc-anchor-normal {
    height: 74px;
    width: 80%;
}
     </style>
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
                        <img src="{{ asset('public/images/honey_bee.png') }}" alt="Honey Bee"  width="200" class="img-fluid" />
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
                                <li >
                                <a href="{{ route('contact') }}">{{ __('Contact Us') }}</a>
                            </li>
                            </li>
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
                        
                            <div class="button_wrapper"><a href="{{ route('register') }}" style="width: 245px;" class="blue_button">Register as Client/Candidate </a></div>

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
                    <div class="row" style="padding-top: 0px;padding-bottom: 10px">
<div class="col-md-6">
<div class="card">
<div class="card-header" style="text-align: center;">
<strong class="card-title">Register as client</strong>
</div>
<div class="card-body" style="text-align: center;    color: #238DB7 !important">
<p style="text-align: justify;">
No more posting ads, writing job descriptions and then reviewing and shortlisting hundreds of candidates. All of these are things of the past. With HoneybeeTech’s online solution, you can login and select using simple drop-downs what you are looking for in your ideal candidate. The platform allows you the flexibility to compare all relevant candidates in one screen, you can view standardised resumes for all candidates in one consistent form. View candidate details and only pay to view candidate’s personal details (email and phone number) if you are satisfied with the calibre of candidates. Payment is simple and at a fraction of a cost with a Seek ad.</p>
</div>
</div>

</div>
<div class="col-md-6">
<div class="card">
<div class="card-header" style="text-align: center;">
<strong class="card-title" >Register as Candidate</strong>
</div>
<div class="card-body" style="text-align: center;   color: #238DB7 !important">
<p  style="text-align: justify;">
As a candidate, looking for work has never been so easy. You don’t need to look for work on Seek or indeed. You don’t need to upload your resume. As long as your profile is updated on our system, let the clients find you. Your profile on our platform is what clients will look at – so the more detailed and articulate your profile is, the better chance there is, for you to stand out and for clients to select you. It takes less than 10 minutes to complete your profile and less than 30 seconds to notify the platform that you are still looking for work. Whether you are looking to relocate or work full time or part time, just let the platform know. Get in before the rest of the candidates do.
</p>
</div>

</div>

</div>
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
                 <div class="col-md-5  col-12  ">
                        <img src="{{ asset('public/images/map.png') }}"  />
                </div>
                <div class="col-md-3  col-12 " id="address_text_wrapper"  style="padding-right: 0px">
                    <p><span class="blue">Address</span><br />
                    Paradise Point<br />
                    Gold Coast, QLD Australia
                    </p>
                    <p><span class="blue">Web</span><br />
                        www.honeybeetech.com.au</p>
                    
                </div>
                <div class="col-md-4  col-12 " id="form_name_text_wrapper" style="padding-left: 0px;padding-right: 0px">
                    <form method="Post" id="contact_form">
                        @csrf

                    <div class="form-group row">
                            <label for="form_name" class="col-md-4 col-form-label text-md-right" style="padding-left: 0px;">Name</label>

                            <div class="col-md-8">
                                <input id="form_name" type="text" class="form-control" name="form_name" value="{{ old('form_name') }}" required autocomplete="form_name"  required>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="form_email" class="col-md-4 col-form-label text-md-right" style="padding-left: 0px;">{{ __('Email') }}</label>

                            <div class="col-md-8">
                                <input id="form_email" type="email" class="form-control @error('form_email') is-invalid @enderror" name="email" value="{{ old('form_email') }}" required autocomplete="form_email">
                            </div>
                        </div>
                         <div class="form-group row" >
                            <label for="form_message" class="col-md-4 col-form-label text-md-right" style="padding-left: 0px;">Message</label>

                            <div class="col-md-8">
                                <textarea id="form_message" type="text" class="form-control " name="form_message" rows="9" required autocomplete="form_message"  requiredstyle="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="form-group row" >
                                <label class="col-md-4 col-form-label text-md-right"></label>
                                <div class="g-recaptcha col-md-6" data-sitekey="6LdmZdEZAAAAAOZrXQ5XRAcMLVjJXsDj4ZvSRPuj" >
                                    
                                </div>
                                 <label class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-6">

                                @if($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" style="display: block">
                                        <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                    </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row" >
                            <label for="form_message" class="col-md-4 col-form-label text-md-right" style="padding-left: 0px;"></label>

                            <div class="col-md-8">
                                <button class="btn btn-success" type="submit" id='contact_form_button'>Contact Us</button>
                            </div>
                        </div>
                        </form>

                </div>
            </div>
    </div>
  </div>   
    </body>
</html>
            <script src="{{ asset('public/vendor/jquery-3.2.1.min.js') }}"></script>
             <script src="{{asset('public/js/sweetalert.min.js')}}"></script>

    @include('sweet::alert')
<script type="text/javascript">
   $(document).ready(function() {
if('<?php echo Session::get('success'); ?>'=='contact'){
          $("html, body").animate({ 
                    scrollTop: $( 
                      'html, body').get(0).scrollHeight 
                }, 2000); 
}
});

$('#contact_form').on('submit',function(evt) {
    evt.preventDefault();
     if(grecaptcha.getResponse() == "") {
    alert("Please verify you are not a robot");
    return false;
  }

            swal("Message Sent", "We will contact you soon", "success"); 
                var data= $('#contact_form').serialize();
                $('#contact_form')[0].reset();
                grecaptcha.reset();
    $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'./contact_us',
            data:data,
            type:'POST',
             // dataType: "json",
            success:function(data){
            }
         });
});
</script>
<style type="text/css">
 .rc-anchor-container {
    width: 80%;
}
     </style>
