<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public function project(){
        return $this->belongsTo('App\Project');
    }
    public function dealer(){

    }

}
