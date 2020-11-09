@extends('layouts.master')

@section('content')
@if (\Session::has('success'))
          <div class="alert alert-success" >
          {!! \Session::get('success') !!}
          </div>
          @endif
<form id="main_form" method="post" action="./user-profile-update" >
    {!! csrf_field() !!}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
@if (Auth::user()->email_verified_at== null)
@php
$date = Auth::user()->created_at;
$date = strtotime($date);
$date = strtotime("+7 day", $date);
$new_date= date('M d, Y', $date);

@endphp
                        <div class="alert alert-success" role="alert">
                           Please verify your email address before {{$new_date}}. After this time if you have not verified your email address your profile will get deactivated. 
                        </div>
                    @endif


        <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                 
                        <div >
                          
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" value="{{$user->name}}" name='name' required readonly>
                                    
                                </div>
                            </div>
                             <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" value="{{$user->email}}" name='email' required readonly>
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Phone Number</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type='number' class="form-control" value="{{$user->userinfo->phone_number}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='phone_number' required >
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Company Name</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" value="{{$user->userinfo->company_name}}"  name="company_name" required>
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Title</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" value="{{$user->userinfo->position}}" name="position" required>
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Full Street Address</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" value="{{$user->userinfo->street_address}}" name="street_address" required>
                                </div>
                            </div>
                             <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">City</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" value="{{$user->userinfo->city}}" name="city" required>
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">State/Territory</label>
                                </div>
                                <div class="col-12 col-md-8">
                                   <select id='state' name='state' class="js-example-basic-single" required>
                                    <option value="">Select State</option>
                                     @foreach($states as $state)
                                    <option {{$user->userinfo->state == $state->name ? 'selected' : ''}}  value="{{$state->name}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            
                             <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Post Code</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="text" maxlength="4" minlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' oninvalid="this.setCustomValidity('Please enter numbers only and has to be 4 digits')"  oninput="this.setCustomValidity('')" class="form-control" value="{{$user->userinfo->postcode}}" name="postcode" required>
                                </div>
                            </div>
                            
                         </div>
                          <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Restaurant Type</label>
                                </div>
                                <div class="col-12 col-md-8">
                                   <select id='restaurant_type' name='restaurant_type' class="js-example-basic-single" required>
                                    <option  value="">Select Resturant Type</option>
                                    @foreach($restaurants as $restaurant)
                                     <option {{$user->userinfo->restaurant_type == $restaurant->name ? 'selected' : ''}} value="{{$restaurant->name}}">{{$restaurant->name}}</option>
                                    @endforeach

                                   
                                </select>
                                </div>
                                
                            </div>
                             <div class="row form-group" id='restaurant_other_div' style="display: none">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-8">
                                  <input class="form-control" value="{{$user->userinfo->restaurant_other}}" id='restaurant_other'  name="restaurant_other" placeholder="Please Specify Resturant Type" >
                                
                                </div>
                            </div>
                     
                     <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <button type="submit" class="btn btn-success" style="background-color: #238db7">Submit</button>
                                </div>
                            </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@if(isset($user))
 <form action="{{ url('/delete_profile', ['id' => $user->id]) }}" method="post" name='delete_profile' style="margin-bottom: 0">
 <div class="card" style="margin-left: 10px;margin-right: 10px;">
                <div class="card-header">Delete Profile</div>

                <div class="card-body">
                 <div>
                            <div class="row form-group">
    
                            
                            @csrf
                            @method('delete')
                              I agree to delete my profile.
                              <button style="margin-left: 5px" type="button" class="btn btn-danger delete_profile" name="delete_profile"><i class="fas fa-trash"></i></button>
                      </div>
                  </div>
                  </div>
                </div>
                          </form>
                      @endif

@endsection()

@section('footer')
<script type="text/javascript">
    setInterval(function() {
         $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'./login_time',
            type:'POST',
           
         });

}, 120 * 1000); 
  window.onbeforeunload = function (e) {
    
    $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'./close_browser',
            type:'POST',
           
         });
   
    e = e || window.event;
    // // For IE and Firefox prior to version 4
    if (e) {
        e.returnValue = 'Sure?';
    }

    // For Safari
    return 'Sure?';
};
    </script>
<script type="text/javascript">
    
    $(document).ready(function() {

        

    $('.js-example-basic-single').select2({});
    if('<?php echo $user->userinfo->restaurant_type; ?>' == 'Other')
    {
        $('#restaurant_other_div').show();
        $("#restaurant_other").prop('required',true);
    }
    });
    $("#restaurant_type").change(function(){
    if($("#restaurant_type").val() == 'Other'){
        $('#restaurant_other_div').show();
        $("#restaurant_other").prop('required',true);
    }
    else{
        $('#restaurant_other_div').hide();
        $('#restaurant_other').val(null);
        $("#restaurant_other").prop('required',false);
    }   
    });
     $(".delete_profile").click(function(){
  var temp =$(this);
    swal({
      title: "Are you sure?",
      text: 'This will delete your profile permanently!!!',
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
      $('form[name="delete_profile"]').submit();      
    }
      else{
      return false;
      } 
    })

});
</script>
@endsection()