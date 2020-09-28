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
    protected $fillable = [ 
 	    'qualification_name','qualification_date'
    ];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
}
