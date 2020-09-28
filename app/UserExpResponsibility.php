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
 	    'user_id','responsibility'
    ];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
}
