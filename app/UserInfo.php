<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
     'user_id', 	
     'name', 
     'phone_number', 
     'email', 
     'date_birth', 
     'street_address', 
     'city', 
     'state',
     'postcode' , 
     'basic_correct', 
     'looking_job', 
     'job_changed',
     'continuous_contact',
     'role_apply',
     'previous_cousine_experience',
     'references',
     'have_car',
     'visa_type',
     'position',
     'company_name',
     'restaurant_type',
     'role_id',
     'member_ship'
     ,'travel',
     'relocate',
     'suburb','yr_experience','proceed','restaurant_other','travel_distance','relocate_state','personal_summary','work_experience','availability'
    ];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
     public function  availabilities()
    {
        return $this->hasMany('App\UserAvailability','user_id','user_id');
    }
    public function  selected_candidates()
    {
        return $this->hasMany('App\SelectedCandidates','candidate_id','user_id');
    }
    public function  user_experience()
    {
        return $this->hasMany('App\UserExperience','user_id','user_id');
    }
    public function  recent_experience()
    {
        return $this->hasOne('App\UserExperience','user_id','user_id')->orderBy('id','asc');
    }
}
