<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnicianAllocation extends Model
{

    public function technician(){
        return $this->belongsTo('App\Technician');
    }
    public function project(){
        return $this->belongsTo('App\Project');
    }

}
