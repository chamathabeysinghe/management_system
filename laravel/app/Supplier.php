<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function Item(){
        return $this->hasMany('App\Item');
    }
}
