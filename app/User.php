<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'rol', 'password', 'employee_number', 'company_id', 'role', 'image_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function communityposts() {
        return $this->hasMany('App\Communitypost');
    }
    
    public function nieuwsposts() {
        return $this->hasMany('App\Nieuwspost');
    }
    
    public function resourceposts() {
        return $this->hasMany('App\Resourcepost');
    }
    public function comments() {
        return $this->hasMany('App\Comment');
    }
    public function profile() {
        return $this->hasOne('App\Profile');
    }
    public function companies() {
        return $this->hasOne('App\Company', 'company_id');
    }
}
