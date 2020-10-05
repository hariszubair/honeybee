@extends('layouts.master')

@section('content')
<form id="main_form" method="post" action="./user-profile-update" >
    {!! csrf_field() !!}
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
                                    <label for="text-input"  class=" form-control-label">Phone Number</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type='number' class="form-control" value="" name='phone_number' >
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Company Name</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control"  name="company_name" required>
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Title</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" value="" name="position" required>
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Full Street Address</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control" name="street_address" required>
                                </div>
                            </div>
                             <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">City</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input class="form-control"  name="city" required>
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">State/Territory</label>
                                </div>
                                <div class="col-12 col-md-8">
                                   <select id='state' name='state' class="form-control" required>
                                    <option  value="">Select State</option>
                                    @foreach($states as $state)
                                    <option  value="{{$state->name}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                             <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Post Code</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="text" maxlength="4" minlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' oninvalid="this.setCustomValidity('Please enter numbers only and has to be 4 digits')"  oninput="this.setCustomValidity('')"  class="form-control"  name="postcode" required>
                                </div>
                            </div>
                            
                         </div>
                          <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Restaurant Type</label>
                                </div>
                                <div class="col-12 col-md-8">
                                   <select id='restaurant_type' name='restaurant_type' class="js-example-basic-single" >
                                    <option  value="">Select Resturant Type</option>
                                     @foreach($restaurants as $restaurant)
                                    <option  value="{{$restaurant->name}}">{{$restaurant->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                             <div class="row form-group" id='restaurant_other_div' style="display: none">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-8">
                                  <input class="form-control" value="" id='restaurant_other'  name="restaurant_other" placeholder="Please Specific Resturant Type">
                                
                                </div>
                            </div>
                     
                     <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <button type="submit" class="btn btn-success">Submit</button>
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