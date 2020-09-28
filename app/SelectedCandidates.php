<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectedCandidates extends Model
{
   protected $fillable = [
        'client_id', 'candidate_id', 'interview',
    ];
    public function client()
	{
		return $this->belongsTo('App\UserInfo','user_id','client_id');
	}
	public function candidate()
	{
		return $this->belongsTo('App\UserInfo','user_id','candidate_id');
	}
}
