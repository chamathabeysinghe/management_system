<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class repairItemDetail extends Model
{
    public function returnItemDetail(){
        return $this->belongsTo('App\ReturnItemDetail','return_Item_Detail_id');
    }
}
