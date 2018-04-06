<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class communitypost extends Model
{
    public $primaryKey ='commu_id';
    public $timestamps = true;
    
    public function gebruiker(){
        return $this->belongsTo('App\User','id');
    }
    
    public function comments(){
       return $this->hasMany('App\Comment', 'id');
    }
}
