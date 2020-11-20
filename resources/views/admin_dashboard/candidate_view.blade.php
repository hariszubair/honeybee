@extends('layouts.master')

@section('content')
<style type="text/css">
    .select2-selection__rendered{
        padding-bottom: 5px !important; 
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">



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
                                    <input type="text" name="user_id" value="{{$user_info[0]->user_id}}" style="display: none">
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
                                    <input  id="yr_experience" name="yr_experience"  class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->yr_experience: '';?>">
                                   
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Previous Cuisine Experience :</label>
                                    </div>
                                    
                                    <div class="col-12 col-md-9">
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" id="allCousine" name="cousine" value="Italian">Italian</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" name="cousine"  value="Mediterranean">Mediterranean</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" name="cousine"  value="Asian">Asian</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" name="cousine"  value="Greek">Greek</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" name="cousine"  value="Take away shop">Take away shop</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" name="cousine"  value="Cafe">Cafe</label>
                                        </div>
                                        <div class="checkbox">
                                        <label><input class="cousine" type="checkbox" name="cousine"  value="Mexican">Mexican</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" name="cousine"  value="Tavern">Tavern</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input class="cousine" type="checkbox" name="cousine" id="cousineChecked"  value="Other">Other</label>
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


                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Phone Number :</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type='number' id="text-input" name="phone_number" placeholder="Phone Number" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->phone_number: '';?>">
                                   
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
                                    <input type="date" id="date_birth" name="date_birth" placeholder="Date of birth" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->date_birth: '';?>">
                                   
                                </div>
                            </div>
                            

                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Full Street Address:</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="street_address" placeholder="Street Address" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->street_address:'';?>">
                                   
                                </div>
                            </div>
                               

                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">City:</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="city" placeholder="City" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->city:'';?>">
                                   
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
                                    <input type="text" id="text-input" name="suburb" placeholder="Suburb" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->suburb: '';?>">
                                   
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
                             <textarea type="text" rows=4 required id="personal_summary" name="personal_summary" placeholder="Briefly describe yourself outside work, e.g. your hobbies" class="form-control" required><?php  echo isset($user_info[0]) ?  $user_info[0]->personal_summary:'';?></textarea>
                         </div>
                     </div>
                     <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"> Work Experience Summary:</label>
                                </div>
                                <div class="col-12 col-md-9">
                             <textarea type="text" rows=4 required id="work_experience" name="work_experience" placeholder="Briefly describe your career in one to two lines" class="form-control" required><?php  echo isset($user_info[0]) ?  $user_info[0]->work_experience:'';?></textarea>
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
                                  {{$user_info[0]->relocate  == 1 ? '(to '. $user_info[0]->relocate_state.')' : ''}}
                                   
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
                                    {{$user_info[0]->travel  == 1 ? '( '. $user_info[0]->travel_distance.' km)' : ''}}
                                  
                            </div>

                            
                         </div>
                     
                   

                    
                </div>
            </div>

        </div>




            <div class="card">
                <div class="card-header">Your Experience</div>

                <div id="experience_form_wrapper">
                     <div class="card-body" >
                   
                        </div>
                <?php 
                $experience_counter = 0 ;
                 
                if(!empty($user_experiences) && count($user_experiences) !=0) :

                    foreach ($user_experiences as $user_experience)
                    { 
                            $experience_counter++;
                    ?>
                    
                        <div class="card-body" id="<?php echo $experience_counter ?>">
                         
                        

                            <div class="row form-group">
                                <div class="col col-md-12">
                                        @if($experience_counter <= 1)
                                            <h4  style="float: left;"> Most Recent Experience</h4>
                                        @endif
                                        @if($experience_counter > 1)
                                            <h4  style="float: left;"> Most Recent Experience (more)</h4>
                                           
                                        @endif
                                    </div>
                                
                                </div>
                            
                    
                                <div class="row form-group">
                                <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Job Title :</label>
                                    </div>
                                    @if($experience_counter <= 1)
                                        <div class="col-12 col-md-9">
                                            <input type="text" required id="text-input" name="experience[<?php echo $experience_counter ?>][job_title]" placeholder="Job Title " class="form-control"  value="<?php echo $user_experience->job_title; ?>">
                                        </div>
                                    @endif
                                    @if($experience_counter > 1)
                                        <div class="col-12 col-md-9">
                                            <input type="text" required id="text-input" name="experience[<?php echo $experience_counter ?>][job_title]" placeholder="Job Title " class="form-control"  value="<?php echo $user_experience->job_title; ?>">
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="row form-group">
                                <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label"> Period of Employment : </label>
                                    </div>
                                    <div class="col col-md-9">
                                        <input  required id="text-input" name="" placeholder="From" class="form-control"  value="{{$user_experience->yr_experience}}">
                                    </div>
                                   
                                </div>
                                
                                <div class="row form-group">
                                <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Name of Company :</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" required id="text-input" name="experience[<?php echo $experience_counter ?>][previous_company]" placeholder="Name of Company" class="form-control"  value="<?php echo $user_experience->previous_company; ?>">
                                    </div>
                                </div> 

                               
                                <div class="row form-group">
                                <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label"> Responsibilities :</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea type="text" rows=4 required id="text-input" name="experience[<?php echo $experience_counter ?>][ex_responsibilities]" placeholder="Enter upto 4 Major Responsibilities. Each Responsibility should be entered in a new line." class="form-control" ><?php echo $user_experience->ex_responsibilities; ?></textarea>
                                        
                                    </div>
                                </div>
                                

                                

                            </div>
                    
                    <?php
                    }
                else: 
                ?>
                <div class="card-body">
                      
                    

                        <div class="row form-group">
                               <div class="col col-md-12">
                                    <h4>  Most Recent Experience</h4>
                                </div>
                             
                            </div>
                        
                            
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Job Title :</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" required id="text-input" name="experience[0][job_title]" placeholder="Job Title " class="form-control" >
                                </div>
                            </div>
                            
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class="form-control-label"> Period of Employment : </label>
                                </div>
                                <div class="col col-md-4">
                                    <input type="date" required id="text-input" name="experience[0][job_from]" placeholder="From" class="form-control"  value="">
                                </div>
                                <div class="col col-md-4">
                                    <input type="date" id="text-input" name="experience[0][job_to]" placeholder="To" class="form-control"  value="">
                                </div>
                               
                            </div>
                             
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Name of Company :</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" required id="text-input" name="experience[0][previous_company]" placeholder="Name of Company" class="form-control"  value="">
                                </div>
                            </div>  
                             
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">No. of Employees in Company :</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select  class="form-control" required name="experience[<?php echo $experience_counter ?>][no_of_employees]">
                                        <option value=""> Please Select</option>
                                        <option value="Less than 10" <?php  echo isset($user_experience) &&  $user_experience->no_of_employees == 'Less than 10' ? 'selected': '';?>>Less than 10</option>
                                        <option value="11-20" <?php  echo isset($user_experience) &&  $user_experience->no_of_employees == '11-20' ? 'selected': '';?>>11-20</option>
                                        <option value="21-50" <?php  echo isset($user_experience) &&  $user_experience->no_of_employees == '21-50' ? 'selected': '';?>>21-50</option>
                                        <option value="More than 50" <?php  echo isset($user_experience) &&  $user_experience->no_of_employees == 'More than 50' ? 'selected': '';?>>More than 50</option>
                                    </select>   
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"> Responsibilities :</label>
                                </div>
                                <div class="col-12 col-md-9">
                                     <textarea type="text" rows=4 required id="text-input" name="experience[<?php echo $experience_counter ?>][ex_responsibilities]" placeholder="Enter upto 4 Major Responsibilities. Each Responsibility should be entered in a new line." class="form-control" ></textarea>
                                </div>
                            </div>
                               

                            

                         </div>
                        <?php
                        
                         endif;  
                     ?>
                    
                </div>

                <div class="row form-group">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-3">
                   
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
                                        <input type="date" id="text-input" name="qualifications[<?php echo $certificate_counter ?>][qualification_date]" placeholder="Date of Qualification" class="form-control"  value="<?php echo  date("Y-m-d", strtotime($user_qualification->qualification_date)); ?>">
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                            
                        
                          

                    <?php
                        
                    }

                else: ?>

                <div class="card-body">
                      
                        <div class="row form-group">
                               <div class="col col-md-12">
                                    <h4 style="float: left;"> Qualifications</h4>
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
                                    <input type="date" id="text-input" name="qualifications[0][qualification_date]" placeholder="Date of Qualification" class="form-control"  value="">
                                </div>
                               
                               
                            </div>
                             
                         </div>
                         
                    
               

                <?php endif; ?>
                </div>
                <div class="row form-group">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-3">
                    
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




        </div>
        
    </div>
  <script type="text/javascript">
    var all_user_info = <?php echo $user_info ?>;

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
        $(":input").prop("disabled", true);
       
  </script>
@endsection
