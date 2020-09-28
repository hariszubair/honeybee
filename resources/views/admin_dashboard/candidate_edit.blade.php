@extends('layouts.adminapp')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Candidate Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                        
                    <form method="post" action="{{URL('/admin-candiate-update')}}" >
                        {!! csrf_field() !!}
                        <div >
                            <input type="hidden" name="user_id" value="<?php  echo isset($user_info[0]) ?  $user_info[0]->id: '';?>" />
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Name :</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="name" placeholder="Name" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->name: '';?>">
                                   
                                </div>
                            </div>


                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Email Address :</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="email" placeholder="Email" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->email: '';?>">
                                   
                                </div>
                            </div>


                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Suburb:</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="suburb" placeholder="Suburb" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->suburb:'';?>">
                                   
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
                                    <label for="text-input" class=" form-control-label">Post Code:</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="postcode" placeholder="postcode" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->postcode:'';?>">
                                   
                                </div>
                            </div>
                                

                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Residence Type : </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="residence_type" placeholder="Residence Type" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->residence_type : '';?>">
                                   
                                </div>
                            </div>
                 
                              
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Past job Experience : </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="job_experience" placeholder="Past job experience" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->job_experience : '';?>">
                                   
                                </div>
                            </div>

                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">How many years in past job : </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="yrs_experience" placeholder="how many years in past job" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->yrs_experience : '';?>">
                                   
                                </div>
                            </div>
                            
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Qualifications : </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="qualifications" placeholder="Qualifications" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->qualifications : '';?>">
                                   
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">References : </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="references" placeholder="References" class="form-control" required value="<?php  echo isset($user_info[0]) ?  $user_info[0]->references : '';?>">
                                   
                                </div>
                            </div>

                         </div>
                         <button type="submit" class="btn btn-primary ">Update</button>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>

@endsection


