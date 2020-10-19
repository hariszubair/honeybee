<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQualification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    
    public function user()
	{
		return $this->belongsTo('App\User');
	}
   
    public function getQualificationDateAttribute($value)
    {
        $date=date_create($value);
        return date_format($date,"d-M-Y");
    }

  
}
