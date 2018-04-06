<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function gebruiker(){
        return $this->belongsTo('App\User','id');
    }
    
    public function nieuwsPost(){
        return $this->belongsTo('App\Nieuwspost','nieuws_id');
    }
    
    public function communityPost(){
        return $this->belongsTo('App\Communitypost','commu_id');
    }
    
    public function resourcePost(){
        return $this->belongsTo('App\Resourcepost','rs_id');
    }
    
}
