<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function gebruiker(){
        return $this->belongsTo('App\User','id');
    }
    
    public function nieuwsPost(){
        return $this->belongsTo('App\Nieuwspost','id');
    }
    
    public function communityPost(){
        return $this->belongsTo('App\Communitypost','id');
    }
    
    public function resourcePost(){
        return $this->belongsTo('App\Resourcepost','id');
    }
    
}
