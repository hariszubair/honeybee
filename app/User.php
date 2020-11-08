<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable  implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','phone_number','device','close_browser','login_time'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function userinfo()
    {
        return $this->hasOne('App\UserInfo');
    }
    public function  availabilities()
    {
        return $this->hasMany('App\UserAvailability')->orderBy('id','asc');
    }
    public function  experiences()
    {
        return $this->hasMany('App\UserExperience')->orderBy('id','asc');
    }
    public function  qualifications()
    {
        return $this->hasMany('App\UserQualification')->orderBy('id','asc');
    }
   public function role(){

        return $this->belongsTo('App\Role', 'role_id')->orderBy('id','asc');

    }
    public function  selected_candidates()
    {
        return $this->hasMany('App\SelectedCandidates','client_id','id');
    }
    public function  confirmed_selected_candidates()
    {
        return $this->hasMany('App\SelectedCandidates','client_id','id')->where('confirmed','!=',null);
    }
    public function  unconfirmed_selected_candidates()
    {
        return $this->hasMany('App\SelectedCandidates','client_id','id')->where('confirmed','=',null);
    }
    public function  selected_candidates_with_user()
    {
        return $this->hasMany('App\SelectedCandidates','client_id','id')->with('candidate');
    }
}
