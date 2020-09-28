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
}
