@extends('layouts.master')

@section('content')
@if (\Session::has('success'))
          <div class="alert alert-success" >
          {!! \Session::get('success') !!}
          </div>
          @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">



        <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                 
                        <div >
                          
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" value="{{$user_info->name}}" name='name' required readonly>
                                    
                                </div>
                            </div>
                             <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" value="{{$user_info->email}}" name='email' required readonly>
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Phone Number</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type='number' class="form-control" value="{{$user_info->phone_number}}" name='phone_number' required >
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Company Name</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" value="{{$user_info->company_name}}"  name="company_name" required>
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Title</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" value="{{$user_info->position}}" name="position" required>
                                </div>
                            </div>
                           <!--  <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Full Street Address</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" value="{{$user_info->street_address}}" name="street_address" required>
                                </div>
                            </div> -->
                             <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">City</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" value="{{$user_info->city}}" name="city" required>
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">State/Territory</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="" name="" class="form-control" value="{{$user_info->state}}">
                                </div>
                            </div>
                            
                             <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Post Code</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="text" maxlength="4" minlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' oninvalid="this.setCustomValidity('Please enter numbers only and has to be 4 digits')"  oninput="this.setCustomValidity('')" class="form-control" value="{{$user_info->postcode}}" name="postcode" required>
                                </div>
                            </div>
                            
                         </div>
                          <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Restaurant Type</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="" name="" class="form-control" value="{{$user_info->restaurant_type}}">
                                </div>
                                
                            </div>
                             <div class="row form-group" id='restaurant_other_div' style="display: none">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-8">
                                  <input class="form-control" value="{{$user_info->restaurant_other}}" id='restaurant_other'  name="restaurant_other" placeholder="Please Specify Resturant Type" >
                                
                                </div>
                            </div>
               
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection()

@section('footer')
<script type="text/javascript">
    
    $(document).ready(function() {
         $(":input").prop("disabled", true);
        $("#dropdownMenuButton").prop("disabled", false);

    });
</script>
@endsection()