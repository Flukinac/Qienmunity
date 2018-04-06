<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resourcepost extends Model
{
    public $primaryKey ='rs_id';
    public $timestamps = true;
    
    public function gebruiker(){
        return $this->belongsTo('App\User','id');
    }
    
    public function comments(){
      return  $this->hasMany('App\Comment', 'id');
    }
}
