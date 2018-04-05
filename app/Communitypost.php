<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class communitypost extends Model
{
    public function gebruiker(){
        return $this->belongsTo('gebruikerModel','id');
    }
    
    public function comments(){
       return $this->hasMany('Comment', 'commu_id');
    }
}
