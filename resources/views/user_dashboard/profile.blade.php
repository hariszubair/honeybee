@extends('layouts.master')

@section('content')
    <link rel="stylesheet" href="{{asset('public/css/datepicker.min.css')}}">

<style type="text/css">
    .select2-selection__rendered{
        padding-bottom: 5px !important; 
    }
    .select2-selection--multiple:before {
    content: "";
    position: absolute;
    right: 7px;
    top: 42%;
    border-top: 5px solid #888;
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
}
.select2-search__field::placeholder{
    color: #495057;
}
.select2-search__field:-ms-input-placeholder {
    color: #495057;
}
.select2-search__field::-ms-input-placeholder {
    color: #495057;
}
</style>
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
                <div class="card-header">Acknowledgement</div>

                <div class="card-body">
                 
                        <div >
                          
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Are your basic details correct?</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="radio" id="basic_correct_yes" name="basic_correct" value="1" checked>
                                    <label for="male">Yes</label>
                                    <input type="radio" id="basic_correct_no" name="basic_correct" value="0" <?php  echo isset($user_info[0]) &&  $user_info[0]->basic_correct ? '': 'checked';?> >
                                    <label for="female">No</label>
                                </div>
                            </div>


                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Are you still looking for a job?</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="radio" id="looking_job_yes" name="looking_job" value="1" checked>
                                    <label for="male">Yes</label>
                                    <input type="radio" id="looking_job_no" name="looking_job" value="0" <?php  echo isset($user_info[0]) &&  $user_info[0]->looking_job ? '': 'checked';?>>
                                    <label for="female">No</label>
                                </div>
                            </div>
                         

                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Have you changed any job as below?</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="radio" id="job_changed_yes" name="job_changed" value="1" checked> 
                                    <label for="male">Yes</label>
                                    <input type="radio" id="job_changed_no" name="job_changed" value="0" <?php  echo isset($user_info[0]) &&  $user_info[0]->job_changed ? '': 'checked';?>>
                                    <label for="female">No</label>
                                </div>
                            </div>


                            <div class="row form-group">
                           
                                <div class="col-12 col-md-12">
                                    <input type="checkbox" name="continuous_contact"  
                                    @if(isset($user_info[0])){{$user_info[0]->continuous_contact ? 'checked' : ''}} @else checked @endif > I consent to being listed on HB's live candidate database, and allowing potential employers to contact me directly
                                </div>
                            </div>


                         </div>
                     
                   

                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">Basic Information</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div >
                            <div class="row form-group">
                                <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Role applying to:</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select required class="form-control" name="role_apply">
                                            <option value=""> Please Select</option>
                                            <option value="Chef" <?php  echo isset($user_info[0]) &&  $user_info[0]->role_apply == 'Chef' ? 'selected': '';?>>Chef</option>
                                            <option value="Front of House" <?php  echo isset($user_info[0]) &&  $user_info[0]->role_apply == 'Front of House' ? 'selected': '';?>>Front of House</option>
                                            <option value="bartender" <?php  echo isset($user_info[0]) &&  $user_info[0]->role_apply == 'bartender' ? 'selected': '';?>>Bartender</option>
                                            <option value="waiter" <?php  echo isset($user_info[0]) &&  $user_info[0]->role_apply == 'waiter' ? 'selected': '';?>>Waiter</option>
                                        </select>   
                                    </div>
                            </div>
<div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Total years of experience in the industry:</label>
                                </div>
                                <div class="col-12 col-md-9">

                                    <select type="number" id="yr_experience" name="yr_experience"  class="form-control" required value="">
                                        <option value="">Please select the following</option>
                                        <option {{isset($user_info[0]) && $user_info[0]->yr_experience=='Less than 1 year' ?  'selected': ''}} value="Less than 1 year">Less than 1 year</option>
                                        <option  {{isset($user_info[0]) && $user_info[0]->yr_experience=='1 - 3 years' ?  'selected': ''}} value="1 - 3 years">1 - 3 years</option>
                                        <option {{isset($user_info[0]) && $user_info[0]->yr_experience=='3 - 5 years' ?  'selected': ''}} value="3 - 5 years">3 - 5 years</option>
                                        <option {{isset($user_info[0]) && $user_info[0]->yr_experience=='5 - 10 years' ?  'selected': ''}}  value="5 - 10 years">5 - 10 years</option>
                                        <option {{isset($user_info[0]) && $user_info[0]->yr_experience=='More than 10 years' ?  'selected': ''}}  value="More than 10 years">More than 10 years</option>
                                    </select>
                                   
                                </div>
                            </div>  
                            <div class="row form-group">
                                <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Previous Cuisine Experience :</label>
                                    </div>
                                    
                                    <div class="col-12 col-md-9">
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" id="allCousine" name="cousine" value="Italian"> Italian</label>
                                            <input style="display: none" type="test" name="previous_cousine_experience" class="form-control" value="<?php  echo isset($user_info[0]) ?  $user_info[0]->previous_cousine_experience: '' ;?>">
                                        </div> 
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" name="cousine"  value="Mediterranean"> Mediterranean</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" name="cousine"  value="Asian"> Asian</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" name="cousine"  value="Greek"> Greek</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" name="cousine"  value="Take away shop"> Take away shop</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" name="cousine"  value="Cafe"> Cafe</label>
                                        </div>
                                        <div class="checkbox">
                                        <label><input class="cousine" type="checkbox" name="cousine"  value="Mexican"> Mexican</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" name="cousine"  value="Tavern"> Tavern</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" name="cousine" id="cousineChecked"  value="Other"> Other</label>
                                        </div>
                                        <input style="margin-top: 15px;" id="otherCousine" type="text" placeholder="Enter other cousine experience" class="form-control" value="">  
                                    </div>
                            </div>
                                
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Name :</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input readonly type="text" id="text-input" name="name" placeholder="Name" class="form-control notAllow" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->name: Auth::user()->name;?>">
                                </div>
                            </div>


                            <div class="row form-group" style="display: none">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Phone Number :</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type='number' id="text-input" name='phone_number' onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Phone Number" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->phone_number: Auth::user()->phone_number;?>" readonly>
                                   
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Email Address :</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input readonly type="text" id="text-input" name="email" placeholder="Email" class="form-control notAllow" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->email: Auth::user()->email;?>">
                                   
                                </div>
                            </div>

                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Date of birth</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <!-- input type="date" id="date_birth" name="date_birth"  class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->date_birth: '';?>"> -->

                                    <input data-toggle="datepicker"  name="date_birth" id='date_birth' class="form-control" autocomplete="off" value="<?php  echo isset($user_info[0]) ?  date_format(date_create($user_info[0]->date_birth),"d-m-Y")  : '';?>" placeholder="dd-mm-yyyy" autocomplete="off" readonly='true'>
                                   
                                </div>
                            </div>
                            
<!-- 
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Full Street Address:</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="street_address" placeholder="Street Address" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->street_address:'';?>">
                                   
                                </div>
                            </div> -->
                               

                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">City:</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="city" placeholder="City" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->city:'';?>" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');">
                                   
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">State/Territory:</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select class="custom-select form-control" id="text-input" name="state" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->state:'';?>">
                                        <option value="" selected>Please Select</option>
                                        @foreach($states as $state)
                                          <option value="{{$state->name}}" <?php  echo isset($user_info[0]) &&  $user_info[0]->state == $state->name ? 'selected': '';?>>{{$state->name}}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Suburb:</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="suburb" placeholder="Suburb" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->suburb: '';?>" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');">
                                   
                                </div>
                            </div>     
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Post Code:</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" maxlength="4" minlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' oninvalid="this.setCustomValidity('Please enter numbers only and has to be 4 digits')"  oninput="this.setCustomValidity('')" id="text-input" name="postcode" placeholder="postcode" class="form-control postcode" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->postcode:'';?>">
                                </div>
                            </div>

                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"> Work Authorisation:</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <select required id="visaType" class="form-control">
                                    <option value=""> Please Select</option>
                                    <option value="Working Visa" <?php  echo isset($user_info[0]) &&  $user_info[0]->visa_type == 'Working Visa' ? 'selected': '';?>>Working Visa</option>
                                    <option value="Student Visa" <?php  echo isset($user_info[0]) &&  $user_info[0]->visa_type == 'Student Visa' ? 'selected': '';?>>Student Visa</option>
                                    <option value="Permanent Residence" <?php  echo isset($user_info[0]) &&  $user_info[0]->visa_type == 'Permanent Residence' ? 'selected': '';?>>Permanent Residence</option>
                                    <option value="Citizen" <?php  echo isset($user_info[0]) &&  $user_info[0]->visa_type == 'Citizen' ? 'selected': '';?>>Citizen</option>
                                    <option value="Other">Other</option>
                                </select> 
                                <input style="margin-top: 15px;" id="otherVisaType" type="text" placeholder="Enter other residence type" class="form-control" value="<?php  echo isset($user_info[0]) ?  $user_info[0]->visa_type:'';?>">
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"> Personal Summary:</label>
                                </div>
                                <div class="col-12 col-md-9">
                             <textarea type="text" rows=4 id="personal_summary" name="personal_summary" placeholder="Briefly describe yourself outside work, e.g. your hobbies" class="form-control"><?php  echo isset($user_info[0]) ?  $user_info[0]->personal_summary:'';?></textarea>
                         </div>
                     </div>
                     <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"> Work Experience Summary:</label>
                                </div>
                                <div class="col-12 col-md-9">
                             <textarea type="text" rows=4  id="work_experience" name="work_experience" placeholder="Briefly describe your career in one to two lines" class="form-control" ><?php  echo isset($user_info[0]) ?  $user_info[0]->work_experience:'';?></textarea>
                         </div>
                     </div>
                     <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"> Availability:</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <select required id="availability" name='availability' class="form-control">
                                    <option value=""> Please Select Availability</option>
                                    <option value="Full Time" <?php  echo isset($user_info[0]) &&  $user_info[0]->availability == 'Full Time' ? 'selected': '';?>>Full Time</option>
                                    <option value="Part Time" <?php  echo isset($user_info[0]) &&  $user_info[0]->availability == 'Part Time' ? 'selected': '';?>>Part Time</option>
                                </select> 
                                    
                            </div>
                        </div>
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Do you have a car?</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="radio" id="have_car_yes" name="have_car" value="1" checked> 
                                    <label for="male">Yes</label>
                                    <input type="radio" id="have_car_no" name="have_car" value="0" <?php  echo isset($user_info[0]) &&  $user_info[0]->have_car ? '': 'checked';?>>
                                    <label for="female">No</label>
                                   
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Are you willing to relocate?</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="radio" id="relocate_yes" name="relocate" value="1" checked> 
                                    <label for="Yes">Yes</label>
                                    <input type="radio" id="relocate_no" name="relocate" value="0" <?php  echo isset($user_info[0]) &&  $user_info[0]->relocate ? '': 'checked';?>>
                                    <label for="No">No</label>
                                   <div style="width: 70%; display: inline-block;vertical-align: middle; padding-left: 20px">
                                   <select class="js-example-basic-multiple js-example-responsive" id="relocate_state" name="relocate_state[]" multiple="multiple"  style="width: 90%;display: none" autocomplete="off">
                                        @foreach($states as $state)
                                          <option value="{{$state->name}}" >{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <textarea name="relocate_state_array" style="display: none"  id='relocate_state_array' ><?php  echo isset($user_info[0]) ?  $user_info[0]->relocate_state: '';?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Are you willing to travel?</label>
                                </div>
                                <div class="col-12 col-md-9"  >
                                    <input type="radio" id="travel_yes" name="travel" value="1" checked> 
                                    <label for="Yes">Yes</label>
                                    <input type="radio" id="travel_no" name="travel" value="0" <?php  echo isset($user_info[0]) &&  $user_info[0]->travel ? '': 'checked';?>>
                                    <label for="No">No</label>
                                   <div style="width: 70%; display: inline-block;vertical-align: middle;padding-left: 20px">

                                    <select style="display: none;" name="travel_distance" id='travel_distance' class="form-control"  >
                                        <option  value="">Select distance</option>
                                        <option {{isset($user_info[0]) && $user_info[0]->travel_distance=='10' ?  'selected': ''}} value="10">10 km</option>
                                        <option {{isset($user_info[0]) && $user_info[0]->travel_distance=='20' ?  'selected': ''}} value="20">20 km</option>
                                        <option {{isset($user_info[0]) && $user_info[0]->travel_distance=='50' ?  'selected': ''}} value="50">50 km</option>
                                        <option {{isset($user_info[0]) && $user_info[0]->travel_distance=='100' ?  'selected': ''}} value="100">100 km</option>
                                    </select>
                                   
                                </div>
                            </div>

                            
                         </div>
                     
                   

                    
                </div>
            </div>

        </div>




            <div class="card">
                <div class="card-header">Your Experience (Please click on plus button to add experience)</div>

                <div id="experience_form_wrapper">
                     <div class="card-body" >
                 
                        </div>
                <?php 
                $experience_counter = 0 ;
                 
                if(!empty($user_experiences) && count($user_experiences) !=0) :

                    foreach ($user_experiences as $user_experience)
                    { 
                    
                            
                    ?>
                    
                        <div class="card-body" id="<?php echo $experience_counter ?>">
                         
                        

                            <div class="row form-group">
                                <div class="col col-md-12">
                                        @if($experience_counter == 0)
                                            <h4  style="float: left;"> Most Recent Experience</h4>
                                        @endif
                                        @if($experience_counter >= 1)
                                            <h4  style="float: left;"> Experience</h4>
                                            
                                        @endif
                                        <button type="button" onclick="delete_experience(<?php echo $experience_counter ?>)" style="float: right;" class="btn btn-danger"><i class="fas fa-minus"></i></button>
                                    </div>
                                
                                </div>
                            
                    
                                <div class="row form-group">
                                <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Job Title :</label>
                                    </div>
                                    @if($experience_counter <= 1)
                                        <div class="col-12 col-md-9">
                                            <input type="text"  id="text-input" name="experience[<?php echo $experience_counter ?>][job_title]" placeholder="Job title is mandatory, without this your experience will not be saved." class="form-control"  value="<?php echo $user_experience->job_title; ?>">
                                        </div>
                                    @endif
                                    @if($experience_counter > 1)
                                        <div class="col-12 col-md-9">
                                            <input type="text"  id="text-input" name="experience[<?php echo $experience_counter ?>][job_title]" placeholder="Job title is mandatory, without this your experience will not be saved." class="form-control"  value="<?php echo $user_experience->job_title; ?>">
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="row form-group">
                                <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label"> Period of Employment : </label>
                                    </div>
                                    <div class="col col-md-9">

                                        <select  name="experience[<?php echo $experience_counter ?>][yr_experience]" name="yr_experience"  class="form-control" required value="">
                                        <option value="">Please select the following</option>
                                        <option {{$user_experience->yr_experience=='Less than 1 year' ?  'selected': ''}} value="Less than 1 year">Less than 1 year</option>
                                        <option  {{$user_experience->yr_experience=='1 - 3 years' ?  'selected': ''}} value="1 - 3 years">1 - 3 years</option>
                                        <option {{$user_experience->yr_experience=='3 - 5 years' ?  'selected': ''}} value="3 - 5 years">3 - 5 years</option>
                                        <option {{$user_experience->yr_experience=='5 - 10 years' ?  'selected': ''}}  value="5 - 10 years">5 - 10 years</option>
                                        <option {{$user_experience->yr_experience=='More than 10 years' ?  'selected': ''}}  value="More than 10 years">More than 10 years</option>
                                    </select>


                                      

                                    </div>
                                   
                                
                                </div>
                                
                                <div class="row form-group">
                                <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Name of Company :</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text"  id="text-input" name="experience[<?php echo $experience_counter ?>][previous_company]" placeholder="Name of Company" class="form-control"  value="<?php echo $user_experience->previous_company; ?>">
                                    </div>
                                </div> 

                            

                                <div class="row form-group">
                                <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label"> Responsibilities :</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea type="text" rows=4  id="text-input" name="experience[<?php echo $experience_counter ?>][ex_responsibilities]" placeholder="Enter upto 4 Major Responsibilities. Each Responsibility should be entered in a new line." class="form-control" ><?php echo $user_experience->ex_responsibilities; ?></textarea>
                                        
                                    </div>
                                </div>
                                

                                

                            </div>
                    
                    <?php
                    $experience_counter++;
                    }
                    $experience_counter--;
                ?>
               
                        <?php
                        
                         endif;  
                     ?>
                    
                </div>

                <div class="row form-group">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-3">
                     <button id="add_more" style="width: 45px; font-weight: bold; border-color: #238DB7 !important" class="btn btn-success" type='button'><i class="fas fa-plus"></i><button>
                    </div>
                </div>

                </div>


                <div class="card certificate">
                <div class="card-header">Your qualifications</div>

                <div id="Certificates_form_wrapper">
                
                <?php 
                    $certificate_counter = 0 ;
                if(!empty($user_qualifications) && count($user_qualifications) !=0) :

                    foreach ($user_qualifications as $user_qualification)
                    { 
                            $certificate_counter++;
                        
                        ?>
                            <div class="card-body" id="qualification<?php echo $certificate_counter ?>">
                            
                                 <div class="row form-group">
                                    <div class="col col-md-12">
                                        <!-- <h4> Qualifications <?php echo $certificate_counter ?></h4> -->
                                        @if($certificate_counter <= 1)
                                            <h4 style="float: left;"> Qualifications</h4>
                                        @endif    
                                        @if($certificate_counter > 1)
                                            <h4 style="float: left;"> Qualifications (more)</h4>
                                            
                                        @endif
                                        <button type="button" onclick="delete_qualification(<?php echo $certificate_counter ?>)" style="float: right;" class="btn btn-danger"><i class="fas fa-minus"></i></button>
                                    </div>
                                
                                </div>
                            
                        
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Name of Qualification :</label>
                                    </div>
                                    @if($certificate_counter <= 1)
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="qualifications[<?php echo $certificate_counter ?>][qualification_name]" placeholder="Name of Qualification" class="form-control"  value="<?php echo $user_qualification->qualification_name ?>">
                                        </div>
                                    @endif  
                                    @if($certificate_counter > 1)
                                        <div class="col-12 col-md-9">
                                            <input type="text" required id="text-input" name="qualifications[<?php echo $certificate_counter ?>][qualification_name]" placeholder="Name of Qualification" class="form-control"  value="<?php echo $user_qualification->qualification_name ?>">
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label"> Date of certificate : </label>
                                    </div>
                                    <div class="col col-md-9">
                                         <input data-toggle="datepicker"  name="qualifications[<?php echo $certificate_counter ?>][qualification_date]" id='text-input' class="form-control" placeholder="Date of Qualification" autocomplete="off"  readonly='true'  value="<?php echo  date_format(date_create($user_qualification->qualification_date),"d-m-Y"); ?>" required>
                                       
                                    
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                            
                        
                          

                    <?php
                        
                    }

                else: ?>

                <div class="card-body" id="qualification0">
                      
                        <div class="row form-group">
                               <div class="col col-md-12">
                                    <h4 style="float: left;"> Qualifications</h4>
                                    <button type="button" onclick="delete_qualification(0)" style="float: right;" class="btn btn-danger"><i class="fas fa-minus"></i></button>
                                </div>
                             
                            </div>
                        
                   
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Name of Qualification :</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="qualifications[0][qualification_name]" placeholder="Name of Qualification" class="form-control"  value="">
                                </div>
                            </div>
                            
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"> Date of certificate : </label>
                                </div>
                                <div class="col col-md-9">
                                     <input data-toggle="datepicker"  name="qualifications[0][qualification_date]" id='text-input' class="form-control" placeholder="Date of Qualification" autocomplete="off"  readonly='true'  value="" required>
<!-- 

                                    <input type="date" id="text-input" name="qualifications[0][qualification_date]" placeholder="Date of Qualification" class="form-control"  value="" required> -->
                                </div>
                               
                               
                            </div>
                             
                         </div>
                         
                    
               

                <?php endif; ?>
                </div>
                <div class="row form-group" style="padding-top: 10px">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-3">
                     <button id="add_more_certificate" style="width: 45px; font-weight: bold;  border-color: #238DB7 !important" type='button' class="btn btn-success"><i class="fas fa-plus"></i></button>
                    </div>
                </div>

                </div>
            </div>






            </div>

            
<!-- 
            <div class="card">
                <div class="card-header">Availability</div>
                <div class="card-body">
                    <div >
                        <div class="row form-group">
                            <div class="col-sm-6 col-md-4">
                                <input type="checkbox" id="monday" name="monday">
                                <label for="monday">Monday</label>
                            </div>
                            <select class="col-sm-6 col-md-3 form-control" name="monday_available_from">
                                <option> Please Select</option>
                                <option value="Morning only">Morning only</option>
                                <option value="Afternoon only">Afternoon only</option>
                                <option value="All day">All day</option>
                            </select> 
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-6 col-md-4">
                                <div class="checkbox">
                                <input type="checkbox" id="tuesday" name="tuesday">
                                <label for="tuesday">Tuesday</label>
                                </div>
                            </div>
                            <select class="col-sm-6 col-md-3 form-control" name="tuesday_available_from">
                                <option> Please Select</option>
                                <option value="Morning only">Morning only</option>
                                <option value="Afternoon only">Afternoon only</option>
                                <option value="All day">All day</option>
                            </select> 
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-6 col-md-4">
                                <div class="checkbox">
                                    <input type="checkbox" id="wednesday" name="wednesday">
                                    <label for="wednesday">Wednesday</label>
                                </div>
                            </div>
                            <select class="col-sm-6 col-md-3 form-control" name="wednesday_available_from">
                                <option> Please Select</option>
                                <option value="Morning only">Morning only</option>
                                <option value="Afternoon only">Afternoon only</option>
                                <option value="All day">All day</option>
                            </select> 
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-6 col-md-4">
                                <div class="checkbox">
                                    <input type="checkbox" id="thursday" name="thursday">
                                    <label for="thursday">Thursday</label>
                                </div>
                            </div>
                            <select class="col-sm-6 col-md-3 form-control" name="thursday_available_from">
                                <option> Please Select</option>
                                <option value="Morning only">Morning only</option>
                                <option value="Afternoon only">Afternoon only</option>
                                <option value="All day">All day</option>
                            </select> 
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-6 col-md-4">
                                <div class="checkbox">
                                    <input type="checkbox" id="friday" name="friday">
                                    <label for="friday">Friday</label>
                                </div>
                            </div>
                            <select class="col-sm-6 col-md-3 form-control" name="friday_available_from">
                                <option> Please Select</option>
                                <option value="Morning only">Morning only</option>
                                <option value="Afternoon only">Afternoon only</option>
                                <option value="All day">All day</option>
                            </select> 
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-6 col-md-4">
                                <div class="checkbox">
                                    <input type="checkbox" id="saturday" name="saturday">
                                    <label for="saturday">Saturday</label>
                                </div>
                            </div>
                            <select class="col-sm-6 col-md-3 form-control" name="saturday_available_from">
                                <option> Please Select</option>
                                <option value="Morning only">Morning only</option>
                                <option value="Afternoon only">Afternoon only</option>
                                <option value="All day">All day</option>
                            </select> 
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-6 col-md-4">
                                <div class="checkbox">
                                    <input type="checkbox" id="sunday" name="sunday">
                                    <label for="sunday">Sunday</label>
                                </div>
                            </div>
                            <select class="col-sm-6 col-md-3 form-control" name="sunday_available_from">
                                <option> Please Select</option>
                                <option value="Morning only">Morning only</option>
                                <option value="Afternoon only">Afternoon only</option>
                                <option value="All day">All day</option>
                            </select> 
                        </div>


                    </div>
                </div>
            </div> -->


            <div class="row form-group" style="padding-bottom: 15px">
                <div class="col col-md-4"></div>
               <div class="col col-md-3">
                    <!-- <button onclick="submits()" class="btn btn-primary ">Update</button> -->
                    <button type="button" id='main_form_button' class="btn btn-primary ">Update</button>
                    <button type="submit" style="display: none" id='main_form_submit' class="btn btn-primary ">Submit</button>
                </div>
            </div>


        </div>
        
    </div>
    </form>
     @if(isset($user_info[0]))
        <div class="card" style="margin-left: 40px;margin-right: 40px;">
                <div class="card-header">Delete Profile</div>

                <div class="card-body">
                 <div>
                            <div class="row form-group">
     <form action="{{ url('/delete_profile', ['id' => $user_info[0]->user_id]) }}" method="post" name='delete_profile' style="margin-bottom: 0">
                            
                            @csrf
                            @method('delete')
                              I agree to delete my profile.
                              <button style="margin-left: 5px" type="button" class="btn btn-danger delete_profile" name="delete_profile"><i class="fas fa-trash"></i></button>
                          </form>
                      </div>
                  </div>
                  </div>
                </div>
                @endif
    <script src="{{asset('public/js/select2.multi-checkboxes.js')}}"></script>
       <script src="{{asset('public/js/datepicker.min.js')}}"></script>
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


    
//   window.onbeforeunload = function (e) {
    
//     $.ajax({
//           headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           },
//             url:'./close_browser',
//             type:'POST',
           
//          });
   
//     e = e || window.event;
//     // // For IE and Firefox prior to version 4
//     if (e) {
//         e.returnValue = 'Sure?';
//     }

//     // For Safari
//     return 'Sure?';
// };
    </script>
<script type="text/javascript">
    var all_user_info = <?php echo $user_info ?>;
    // console.log("all_user_info");
    // console.log(all_user_info);
    $("#otherVisaType").css("display","none");
    $("#otherCousine").css("display","none");
    jQuery(document).ready(function($){
          $('[data-toggle="datepicker"]').datepicker({
        autoHide:'true',
        format: 'dd-mm-yyyy'
       });
         if('<?php echo Session::get('success'); ?>'=='Profile Update'){
            swal({
      title: "Profile Updated",
      text: 'Please keep updating your profile notifying you are looking for a job. F&B owners (cafes, restaurants, hotels) will contact you if their requirement matches your profile. Do you want to logout?',
      icon: "success",
      showConfirmButton: true,
      confirmButtonColor: '#8CD4F5',
      buttons: [
        'No, Proceed!',
        'Yes, Logout!'
      ],
      dangerMode: false,
    }).then(function(isConfirm) {
      if (isConfirm) {
      location.href='./logout';
      }
      
    })

    }
    else if('<?php echo Session::get('success'); ?>'=='Fil Form'){
         swal("Please fill this form", "Please enter all relevant details so that your profile is complete. All sections of this page is important for you to fill in otherwise your profile will not be displayed to the company.", "info"); 
    }
        if(all_user_info.length > 0) {
            if(all_user_info[0].visa_type) {
                if($("#visaType").val() == 'Working Visa' || $("#visaType").val() == 'Student Visa' || $("#visaType").val() == 'Permanent Residence' || $("#visaType").val() == 'Citizen') {
                    $("#otherVisaType").css("display","none");
                } else {
                    $("#visaType").val('Other');
                    $("#otherVisaType").css("display","block");
                }
            }
        }
        
        $("#visaType").change(function () {
            if ($(this).val() == "Other") {
                $("#otherVisaType").css("display","block");
                $("#otherVisaType").val('');
                $("#otherVisaType").prop('required',true);
            } else {
                $("#otherVisaType").prop('required',false);
                $("#otherVisaType").css("display","none");
            }
        });
        $("#cousineChecked").change(function() {
            if(this.checked) {
                $("#otherCousine").css("display","block");
                $("#otherCousine").val('');
                $("#otherCousine").prop('required',true);
            } else {
                $("#otherCousine").prop('required',false);
                $("#otherCousine").css("display","none");
            }
        });

        // Previous Cousine Experience
        if(all_user_info.length > 0) {
            try {
                var cousineExperience = all_user_info[0].previous_cousine_experience.split(",");
                var tempCousine = $('.cousine');
                var tempFlag = null;
                for(c in tempCousine){
                    for(d in cousineExperience) {
                        if(tempCousine[c].value == cousineExperience[d]) {
                            tempCousine[c].checked = true;
                            if(tempCousine[c].value == 'Other') {
                                $('#otherCousine').val(cousineExperience[cousineExperience.length-1]);
                                $("#otherCousine").css("display","block");
                            }
                            break;
                        }
                    }
                }
            } catch (e) {
                // console.log
            }
            
        }
       
    })
   
</script>

<script type="text/javascript">
    jQuery(document).ready(function($){
    $('.js-example-basic-multiple').select2();
 $('#relocate_state').select2({
          placeholder: "    Select state",
    allowClear: true
  })



 if($('input[name="relocate"]:checked').val()==1){
  var values=$("textarea#relocate_state_array").val().split(",");;
    $("#relocate_state").val(values).change();
 }
 if($('input[name="relocate"]:checked').val()==1){
            $('#relocate_state').next(".select2-container").show();
        }
        else{
            $('#relocate_state').next(".select2-container").hide();
            $('#relocate_state').val(null).change();
        }

        $( "#password" ).keyup(function() {
            if ($(this).val() != "") {
                $("#confirmpassword").prop('required',true);
                // console.log('$("#password"): ', $("#password").val());
            } else {
                $('#confirmpassword').removeAttr('required');
            }
        });
    })
</script>

<script type="text/javascript">
    jQuery(document).ready(function($){
        // var user_availabilities = <?php echo $user_availabilities ?>;
        // for(var i=0; i<user_availabilities.length; i++) {
        //     if(user_availabilities[i].day == 'monday') {
        //         $("#monday").prop("checked", true);
        //         document.getElementsByName('monday_available_from')[0].value = user_availabilities[i].available_from;
        //     }
        //     if(user_availabilities[i].day == 'tuesday') {
        //         $("#tuesday").prop("checked", true);
        //         document.getElementsByName('tuesday_available_from')[0].value = user_availabilities[i].available_from;
        //     }
        //     if(user_availabilities[i].day == 'wednesday') {
        //         $("#wednesday").prop("checked", true);
        //         document.getElementsByName('wednesday_available_from')[0].value = user_availabilities[i].available_from;
        //     }
        //     if(user_availabilities[i].day == 'thursday') {
        //         $("#thursday").prop("checked", true);
        //         document.getElementsByName('thursday_available_from')[0].value = user_availabilities[i].available_from;
        //     }
        //     if(user_availabilities[i].day == 'friday') {
        //         $("#friday").prop("checked", true);
        //         document.getElementsByName('friday_available_from')[0].value = user_availabilities[i].available_from;
        //     }
        //     if(user_availabilities[i].day == 'saturday') {
        //         $("#saturday").prop("checked", true);
        //         document.getElementsByName('saturday_available_from')[0].value = user_availabilities[i].available_from;
        //     }
        //     if(user_availabilities[i].day == 'sunday') {
        //         $("#sunday").prop("checked", true);
        //         document.getElementsByName('sunday_available_from')[0].value = user_availabilities[i].available_from;
        //     }
        // }
        // console.log("user_availabilities: ", user_availabilities);
    })
</script>

<!-- <script type="text/javascript">
    jQuery(document).ready(function($){
        alert("Ailo");
        console.log("EXPPP: ", exp);
        
        var user_availabilities = <?php echo $user_availabilities ?>;
        for(var i=0; i<user_availabilities.length; i++) {
            if(user_availabilities[i].day == 'monday') {
                $("#monday").prop("checked", true);
                document.getElementsByName('monday_available_from')[0].value = user_availabilities[i].available_from;
                document.getElementsByName('monday_available_to')[0].value = user_availabilities[i].available_to;
            }
            
        }
        
    })
</script> -->

<script type="text/javascript">

    jQuery(document).ready(function($){

        $("#main_form_button").click(function(event) {
            // Availability



            // var availabilityFlag = false;
            // if($('#monday').prop("checked") == true){
            //     availabilityFlag = true;
            //     document.getElementsByName('monday')[0].value = 'monday';
            //     // console.log(document.getElementsByName('monday_available_from')[0].value);
            // } else {
            //     document.getElementsByName('monday')[0].value = '';
            // }
            // if($('#tuesday').prop("checked") == true){
            //     availabilityFlag = true;
            //     document.getElementsByName('tuesday')[0].value = 'tuesday'
            //     // console.log(document.getElementsByName('tuesday_available_from')[0].value);
            // } else {
            //     document.getElementsByName('tuesday')[0].value = '';
            // }
            // if($('#wednesday').prop("checked") == true){
            //     availabilityFlag = true;
            //     document.getElementsByName('wednesday')[0].value = 'wednesday';
            //     // console.log(document.getElementsByName('wednesday_available_from')[0].value);
            // } else {
            //     document.getElementsByName('wednesday')[0].value = '';
            // }
            // if($('#thursday').prop("checked") == true){
            //     availabilityFlag = true;
            //     document.getElementsByName('thursday')[0].value = 'thursday';
            //     // console.log(document.getElementsByName('thursday_available_from')[0].value);
            // } else {
            //     document.getElementsByName('thursday')[0].value = '';
            // }
            // if($('#friday').prop("checked") == true){
            //     availabilityFlag = true;
            //     document.getElementsByName('friday')[0].value = 'friday';
            //     // console.log(document.getElementsByName('friday_available_from')[0].value);
            // } else {
            //     document.getElementsByName('friday')[0].value = '';
            // }
            // if($('#saturday').prop("checked") == true){
            //     availabilityFlag = true;
            //     document.getElementsByName('saturday')[0].value = 'saturday';
            //     // console.log(document.getElementsByName('saturday_available_from')[0].value);
            // } else {
            //     document.getElementsByName('saturday')[0].value = '';
            // }
            // if($('#sunday').prop("checked") == true){
            //     availabilityFlag = true;
            //     document.getElementsByName('sunday')[0].value = 'sunday';
            //     // console.log(document.getElementsByName('sunday_available_from')[0].value);
            // } else {
            //     document.getElementsByName('sunday')[0].value = '';
            // }
            

            if($("#visaType").val() == 'Other' || $("#visaType").val() == 'Please Select') {
                $('#otherVisaType').attr("name", "visa_type");
                document.getElementsByName('visa_type')[0].value = $("#otherVisaType").val();
            }
            else {
                $('#visaType').attr("name", "visa_type");
                document.getElementsByName('visa_type')[0].value = $("#visaType").val();
            }
                    if($('input[name=cousine]:checked').length ==0){
                         alert('Please select Previous Cuisine Experience')
                                return false;
                    }

                    // Cousine Experience
                    var cousineExperienceChecked = [];
                    var falseChecker = false;
                    $('input[type=checkbox][name=cousine]').each(function(index){
                        // if(index == 0 && this.checked == false) {
                        //     this.checked = true;
                        //     falseChecker = true;
                        // }
                        if(this.checked) {
                            if(this.value=='Other' && $('#otherCousine').val() !=""){
                            cousineExperienceChecked.push(this.value);
                            cousineExperienceChecked.push($('#otherCousine').val());
                            }
                            else{
                            cousineExperienceChecked.push(this.value);
                            }

                        }
                    });
                    $("input[name='previous_cousine_experience']").val(cousineExperienceChecked);
                    // console.log(cousineExperienceChecked)
                    // $('#allCousine').attr("name", "previous_cousine_experience");
                    // document.getElementsByName('previous_cousine_experience')[0].value = cousineExperienceChecked;
                    // if(falseChecker == true) {
                    //     cousineExperienceChecked.splice(0, 1); 
                    //     document.getElementsByName('previous_cousine_experience')[0].value = cousineExperienceChecked;
                    // }
                    // if(document.getElementById('cousineChecked').checked) {
                    //     cousineExperienceChecked.push($('#otherCousine').val());
                    //     document.getElementsByName('previous_cousine_experience')[0].value = cousineExperienceChecked;
                    // }
                    var expected_exp=0; 
                    var temp_counter=0;
                    var test_responsibilities=0;
                    var min_exp=0;
                    for (var i = 0 ; i <= counterr; i++) {

                          if($("input[name='experience["+counterr+"][job_title]']").val() == '' || $("input[name='experience["+counterr+"][job_from]']").val() == '' || $("input[name='experience["+counterr+"][job_to]']").val() == ''  || $("input[name='experience["+counterr+"][previous_company]']").val() == ''  || $("input[name='experience["+counterr+"][no_of_employees]']").val() == ''  || $("textarea[name='experience["+counterr+"][ex_responsibilities]']").val() == '')
                        {
                            alert('Please complete job experience first');
                            return false;
                        }


                       
                         if($("input[name='experience["+i+"][job_to]']").val()){
                             var job_to=$("input[name='experience["+i+"][job_to]']").val().split("-");
                        var job_from=$("input[name='experience["+i+"][job_from]']").val().split("-");
                        if( new Date(job_to[2], job_to[1] - 1, job_to[0]) <= new Date(job_from[2], job_from[1] - 1, job_from[0]))
                        {
                            alert('Job starting date '+ $("input[name='experience["+i+"][job_to]']").val()+ ' cant be less than '+ $("input[name='experience["+i+"][job_from]']").val());
                            temp_counter++;
                        }
                   
                       expected_exp += Math.ceil((new Date(job_to[2], job_to[1] - 1, job_to[0]) - new Date(job_from[2], job_from[1] - 1, job_from[0]))/ (1000 * 60 * 60 * 24));
                   
                  const regex = /\../gm;
                   $.each($("textarea[name='experience["+i+"][ex_responsibilities]']").val().split('\n'), function( index, value ) {
                            if (regex.test(value)) {
                            test_responsibilities++;
                            }
                    });
                   }
                   if($("input[name='experience["+i+"][job_title]']").val() && $("input[name='experience["+i+"][job_title]']").val() != ''){
                    min_exp ++;
                   }
                    }



                    if(test_responsibilities >0){
                        swal({
                          title: "Responsibilities are in incorrect format!!!",
                          text: "Each responsibility should be on a new line. Do you still want to continue?",
                          icon: "warning",
                          buttons: [
                            'No, verify it!',
                            'Yes, continue!'
                          ],
                          dangerMode: true,
                        }).then(function(isConfirm) {
                          if (!isConfirm) {
                        return false
                          }
                          else{
                            $('#main_form_submit').click();

                          }
                        })
                        return false
                    }
                    var temp_dob=$('#date_birth').val().split('-');

                     var dob= new Date(temp_dob[2], temp_dob[1]-1, temp_dob[0]);
                    var ageDifMs = Date.now() - dob.getTime();
                    var ageDate = new Date(ageDifMs); // miliseconds from epoch
                     if(Math.abs(ageDate.getUTCFullYear() - 1970) < 16){
                         swal("Under Age!!!", "You must be at least 16 years old.", "error"); 
                                return false;
                     }
                     var exp_verification=0;
                    switch($('#yr_experience').val()) {
                      case "Less than 1 year":
                        if(parseInt(expected_exp/365) < 1){
                            exp_verification=1;
                        }
                        break;
                      case "1 - 3 years":
                        if(1 <= parseInt(expected_exp/365) && parseInt(expected_exp/365) < 3){
                            exp_verification=1;
                        }
                        break;
                        case "3 - 5 years":
                        if(3 <= parseInt(expected_exp/365) && parseInt(expected_exp/365) < 5){
                            exp_verification=1;
                        }
                        break;
                        case "5 - 10 years":
                        if(5 <= parseInt(expected_exp/365) && parseInt(expected_exp/365) < 10){
                            exp_verification=1;
                        }
                        break;
                      case "More than 10 years":
                        if(parseInt(expected_exp/365) >= 10){
                            exp_verification=1;
                        }
                        break;
                    }
                    if($('#date_birth').val() == ""){
                        alert ('Please add age.');
                        return false;
                    }

                     if(min_exp == 0){
                        swal({
                          title: "Please enter experience",
                          text: "Please enter your work experience details so that your profile is complete. All sections of this page is important for you to fill in. Do you still want to continue?",
                          icon: "warning",
                          buttons: [
                            'No, verify it!',
                            'Yes, continue!'
                          ],
                          dangerMode: true,
                        }).then(function(isConfirm) {
                          if (!isConfirm) {
                        return false
                          }
                          else{
                            $('#main_form_submit').click();

                          }
                        }) 
                    }
                    else{
                          $('#main_form_submit').click();
                    $('.notAllow').prop("disabled", false);
                    }



                    // if(exp_verification == 0){
                    //     swal({
                    //       title: "Experience Mismatch!!!",
                    //       text: $('#yr_experience').val()+" year(s) of total experience dont match with the experience you enter in indiviual experience. Do you still want to continue?",
                    //       icon: "warning",
                    //       buttons: [
                    //         'No, verify it!',
                    //         'Yes, continue!'
                    //       ],
                    //       dangerMode: true,
                    //     }).then(function(isConfirm) {
                    //       if (!isConfirm) {
                    //     return false
                    //       }
                    //       else{
                    //         $('#main_form_submit').click();

                    //       }
                    //     })

                    // }
                    // else{
                    //     if(temp_counter >0){
                    //     return false
                    // }
                    // else{
                    //       $('#main_form_submit').click();
                    // $('.notAllow').prop("disabled", false);
                    // }
                    // }
                    
        });
        
    
        
    });
    // function submits(e) {
    //     e.preventDefault();
    //     // Availability
    //     var availabilityFlag = false;
    //     if($('#monday').prop("checked") == true){
    //         availabilityFlag = true;
    //         document.getElementsByName('monday')[0].value = 'monday';
    //         console.log(document.getElementsByName('monday_available_from')[0].value);
    //     } else {
    //         document.getElementsByName('monday')[0].value = '';
    //     }
    //     if($('#tuesday').prop("checked") == true){
    //         availabilityFlag = true;
    //         document.getElementsByName('tuesday')[0].value = 'tuesday'
    //         console.log(document.getElementsByName('tuesday_available_from')[0].value);
    //     } else {
    //         document.getElementsByName('tuesday')[0].value = '';
    //     }
    //     if($('#wednesday').prop("checked") == true){
    //         availabilityFlag = true;
    //         document.getElementsByName('wednesday')[0].value = 'wednesday';
    //         console.log(document.getElementsByName('wednesday_available_from')[0].value);
    //     } else {
    //         document.getElementsByName('wednesday')[0].value = '';
    //     }
    //     if($('#thursday').prop("checked") == true){
    //         availabilityFlag = true;
    //         document.getElementsByName('thursday')[0].value = 'thursday';
    //         console.log(document.getElementsByName('thursday_available_from')[0].value);
    //     } else {
    //         document.getElementsByName('thursday')[0].value = '';
    //     }
    //     if($('#friday').prop("checked") == true){
    //         availabilityFlag = true;
    //         document.getElementsByName('friday')[0].value = 'friday';
    //         console.log(document.getElementsByName('friday_available_from')[0].value);
    //     } else {
    //         document.getElementsByName('friday')[0].value = '';
    //     }
    //     if($('#saturday').prop("checked") == true){
    //         availabilityFlag = true;
    //         document.getElementsByName('saturday')[0].value = 'saturday';
    //         console.log(document.getElementsByName('saturday_available_from')[0].value);
    //     } else {
    //         document.getElementsByName('saturday')[0].value = '';
    //     }
    //     if($('#sunday').prop("checked") == true){
    //         availabilityFlag = true;
    //         document.getElementsByName('sunday')[0].value = 'sunday';
    //         console.log(document.getElementsByName('sunday_available_from')[0].value);
    //     } else {
    //         document.getElementsByName('sunday')[0].value = '';
    //     }
        

    //     if($("#visaType").val() == 'Other' || $("#visaType").val() == 'Please Select') {
    //         $('#otherVisaType').attr("name", "visa_type");
    //         document.getElementsByName('visa_type')[0].value = $("#otherVisaType").val();
    //     }
    //     else {
    //         $('#visaType').attr("name", "visa_type");
    //         document.getElementsByName('visa_type')[0].value = $("#visaType").val();
    //     }
        
    //     // Cousine Experience
    //     var cousineExperienceChecked = [];
    //     $.each($("input[name='cousine']:checked"), function(){
    //         cousineExperienceChecked.push($(this).val());
    //     });

        
    //     $('#allCousine').attr("name", "previous_cousine_experience");
    //     document.getElementsByName('previous_cousine_experience')[0].value = cousineExperienceChecked;

    //     if(document.getElementById('cousineChecked').checked) {
    //         cousineExperienceChecked.push($('#otherCousine').val());
    //         document.getElementsByName('previous_cousine_experience')[0].value = cousineExperienceChecked;
    //     }
        
    //     if($("#password").val() != '') {
    //         if($("#password").val() != $("#confirmpassword").val()) {
    //             alert('Password should match with Confirm Password!');
    //         } else {
    //             alert("Your profile has been updated!");
    //             $("#main_form").submit();
    //         }
    //     } else {
    //         if($("#main_form").valid()) {
    //             alert("Your profile has been updated!");
    //         }
    //         $("#main_form").submit();
    //     }
    // }
</script>

<script type="text/javascript">
    var counterr = 0;
    function checkCounter(count) {
        return count;
    }
    
    function delete_experience(cc) {
        // alert(cc);
        // alert(counterr);
        for(var i=0; i<document.getElementById("experience_form_wrapper").children.length; i++) {
            if(document.getElementById("experience_form_wrapper").children[i] == document.getElementById(cc)) {
                document.getElementById("experience_form_wrapper").children[i].remove();
            }
        }
    }
    function delete_qualification(cc) {
        for(var i=0; i<document.getElementById("Certificates_form_wrapper").children.length; i++) {
            if(document.getElementById("Certificates_form_wrapper").children[i] == document.getElementById('qualification'+cc)) {
                document.getElementById("Certificates_form_wrapper").children[i].remove();
            }
        }
        for(var i=0; i<document.getElementById("Certificates_form_wrapper").children.length; i++) {
            console.log(document.getElementById("Certificates_form_wrapper").children[i]);
        }
    }
    jQuery(document).ready(function($){
        var experience_counter = <?php echo $experience_counter ?>;
        counterr = experience_counter;
        $('#add_more').click(function(e){
            e.preventDefault();
            if($("input[name='experience["+counterr+"][job_title]']").val()){
                     if($("input[name='experience["+counterr+"][job_title]']").val() == '' || $("input[name='experience["+counterr+"][yr_experience]']").val() == ''  || $("input[name='experience["+counterr+"][previous_company]']").val() == ''  || $("textarea[name='experience["+counterr+"][ex_responsibilities]']").val() == '')
                        {
                            alert('Please complete job experience first');
                            return false;
                        }

                        //  var job_to=$("input[name='experience["+counterr+"][job_to]']").val().split("-");
                        // var job_from=$("input[name='experience["+counterr+"][job_from]']").val().split("-");
                        // if( new Date(job_to[2], job_to[1] - 1, job_to[0]) <= new Date(job_from[2], job_from[1] - 1, job_from[0]))
                        // {
                        //          alert('Job starting date '+ $("input[name='experience["+counterr+"][job_to]']").val()+ ' cant be less than '+ $("input[name='experience["+counterr+"][job_from]']").val())
                        //     return false;

                        // }

                    }
                        // if($("input[name='experience["+counterr+"][job_to]']").val() <= $("input[name='experience["+counterr+"][job_from]']").val())
                        // {
                        //     alert('Job starting date '+ $("input[name='experience["+counterr+"][job_to]']").val()+ ' cant be less than '+ $("input[name='experience["+counterr+"][job_from]']").val())
                        //     return false;

                        // }
            experience_counter++;

            counterr++;
            let html =`
                        <div id="${counterr}" class="card-body">
                            <div class="row form-group">
                               <div class="col col-md-12">
                                    <h4 style="float: left;"> Experience</h4>
                                    <button type="button" onclick="delete_experience(${experience_counter})" style="float: right;" class="btn btn-danger"><i class="fas fa-minus"></i></button>
                                </div>
                             
                            </div>
                        
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Job Title :</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="experience[${experience_counter}][job_title]" placeholder="Job title is mandatory, without this your experience will not be saved. " class="form-control"  value="">
                                </div>
                            </div>
                            
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"> Period of Employment : </label>
                                </div>
                                <div class="col col-md-9">
                                <select  name="experience[${experience_counter}][yr_experience]" class="form-control" required >
                                        <option value="">Please select the following</option>
                                        <option value="Less than 1 year">Less than 1 year</option>
                                        <option  value="1 - 3 years">1 - 3 years</option>
                                        <option value="3 - 5 years">3 - 5 years</option>
                                        <option value="5 - 10 years">5 - 10 years</option>
                                        <option value="More than 10 years">More than 10 years</option>
                                    </select>
                                
                                    </div>
                               
                            </div>

                            <div class="row form-group">
                            <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Name of Company :</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text"  id="text-input" name="experience[${experience_counter}][previous_company]" placeholder="Name of Company" class="form-control"  value="">
                                </div>
                            </div> 

                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"> Responsibilities :</label>
                                </div>
                                <div class="col-12 col-md-9"> 
                                    <textarea type="text" rows=4  id="text-input" name="experience[${experience_counter}][ex_responsibilities]" placeholder="Enter upto 4 Major Responsibilities" class="form-control" ></textarea>
                                </div>
                            </div>
                               

                            </div>

                         </div>
                         
             
            
                `;
            $('#experience_form_wrapper').append(html);
            $('[data-toggle="datepicker"]').datepicker({
        autoHide:'true',
        format: 'dd-mm-yyyy'
       });
        });
    })
</script>


<script type="text/javascript">
    jQuery(document).ready(function($){
        var certificate_counter = <?php echo $certificate_counter ?>;
        $('#add_more_certificate').click(function(e){
            e.preventDefault();
            certificate_counter++;
            let html =`
            <div class="card-body" id="qualification${certificate_counter}">
                      
                      <div class="row form-group">
                             <div class="col col-md-12">
                                  <h4 style="float: left;"> Qualifications (more)</h4>
                                  <button type="button" onclick="delete_qualification(${certificate_counter})" style="float: right; " class="btn btn-danger"><i class="fas fa-minus"></i></button>
                              </div>
                           
                          </div>
                      
                 
                          <div class="row form-group">
                             <div class="col col-md-3">
                                  <label for="text-input" class=" form-control-label">Name of Qualification :</label>
                              </div>
                              <div class="col-12 col-md-9">
                                  <input type="text" id="text-input" required name="qualifications[${certificate_counter}][qualification_name]" placeholder="Name of Qualification" class="form-control"  value="">
                              </div>
                          </div>
                          
                          <div class="row form-group">
                             <div class="col col-md-3">
                                  <label for="text-input" class=" form-control-label"> Date of certificate : </label>
                              </div>
                              <div class="col col-md-9">

                                 <input data-toggle="datepicker"  name="qualifications[${certificate_counter}][qualification_date]" id='text-input' class="form-control" placeholder="Date of Qualification" autocomplete="off"  readonly='true'  value="" required>
                                
                              </div>
                             
                             
                          </div>
                           
                       </div>
                       
                  
              </div>
                         
             
            
                `;
            $('#Certificates_form_wrapper').append(html);
        });
         if($('input[name="travel"]:checked').val()==1){
            $('#travel_distance').show();
        }
        else{
            $('#travel_distance').hide();
            $('#travel_distance').val(null);
        }
    })
    $('input[name="travel"]').on('change', function(){
        if($('input[name="travel"]:checked').val()==1){
            $('#travel_distance').show();
        }
        else{
            $('#travel_distance').hide();
            $('#travel_distance').val(null);
        }
    });
    $('input[name="relocate"]').on('change', function(){
        if($('input[name="relocate"]:checked').val()==1){
            $('#relocate_state').next(".select2-container").show();
        }
        else{
            $('#relocate_state').next(".select2-container").hide();
            $('#relocate_state').val(null).change();
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
    function clear_date(clicked){
        console.log(clicked)
         $('input[name="'+clicked.attr('id')+'[job_to]"]').val(null);
        $('input[name="'+clicked.attr('id')+'[job_from]"]').val(null);
    }
    //  $('.reset_dates').on('click',function(){
       
    // });
</script>
@endsection

<style>

.notAllow:hover {
    cursor:not-allowed;
 }
</style>
