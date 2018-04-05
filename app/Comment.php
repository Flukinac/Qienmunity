<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function gebruiker(){
        return $this->belongsTo('gebruikerModel','id');
    }
    
    public function nieuwsPost(){
        return $this->belongsTo('Nieuwspost','nieuws_id');
    }
    
    public function communityPost(){
        return $this->belongsTo('Communitypost','commu_id');
    }
    
    public function resourcePost(){
        return $this->belongsTo('Resourcepost','rs_id');
    }
    
}
