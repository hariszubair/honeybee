<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAvailability extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
 	    'user_id','day','available_from','available_to'
    ];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
}
