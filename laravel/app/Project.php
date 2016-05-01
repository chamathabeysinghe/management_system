<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public function feedback(){
        return $this->hasOne('App\Feedback');
    }
    public function technicianAllocations(){
        return $this->hasMany('App\TechnicianAllocation');
    }
    public function items(){
        return $this->hasMany('App\Item');
    }
}
