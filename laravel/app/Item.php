<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public function project(){
        return $this->belongsTo('App\Project');
    }
    public function returnItemDetails(){
        return $this->belongsToMany('App\ReturnItemDetail','item_return_item_details');
    }
    public function returnItemDetail(){
        return $this->hasOne('App\ReturnItemDetail','replacement_id');
    }
    public function Supplier(){
        return $this->belongsTo('App\Supplier');
    }
    public function dealer(){

    }

}
