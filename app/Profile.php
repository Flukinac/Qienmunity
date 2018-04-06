<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    public function gebruiker(){
        return $this->belongsTo('App\User','id');
    }
    
    
}
