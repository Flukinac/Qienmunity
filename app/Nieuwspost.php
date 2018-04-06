<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nieuwspost extends Model
{
    public $primaryKey ='nieuws_id';
    public $timestamps = true;
    
    public function gebruiker(){
        return $this->belongsTo('App\User','id');
    }
    
    public function comments(){
       return $this->hasMany('App\Comment', 'nieuws_id');
    }
    
}
