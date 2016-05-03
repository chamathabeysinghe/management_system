<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    //
    public function technicianAllocations(){
        return $this->hasMany('App\TechnicianAllocation');
    }

}
