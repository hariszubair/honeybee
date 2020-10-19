<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
 	    'job_title','job_from','job_to','previous_company','ex_role','ex_responsibilities'
    ];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
    public function getJobToAttribute($value)
    {
        $date=date_create($value);
        return date_format($date,"d-M-Y");
    }
    public function getJobFromAttribute($value)
    {
        $date=date_create($value);
        return date_format($date,"d-M-Y");
    }
     public function setJobToAttribute($value)
    {
      $date=date_create($value);   
        $this->attributes['job_to'] = date_format($date,"Y-m-d");
    }
     public function setJobFromAttribute($value)
    {
      $date=date_create($value);   
        $this->attributes['job_from'] = date_format($date,"Y-m-d");
    }

}
