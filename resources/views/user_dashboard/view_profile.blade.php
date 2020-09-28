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



        <div class="card">
                <div class="card-header">Acknowledgement</div>

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
                                    <input type='number' class="form-control" value="{{$user->userinfo->phone_number}}" name='phone_number' required >
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
                                    <label for="text-input" class=" form-control-label">St. Address</label>
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
                                    <label for="text-input" class=" form-control-label">State</label>
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


@endsection()

@section('footer')
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
</script>
@endsection()