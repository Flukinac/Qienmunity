<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resourcepost extends Model
{
    public function gebruiker(){
        return $this->belongsTo('gebruikerModel','id');
    }
    
    public function comments(){
      return  $this->hasMany('Comment', 'rs_id');
    }
}
