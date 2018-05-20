<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{   
    protected $fillable = ['username', 'email', 'user_id'];
   
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function setdateofbirthAttribute( $value ) {
        $this->attributes['dateofbirth'] = (new Carbon($value))->format('d-m-Y');
    }
    
}