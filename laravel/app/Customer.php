<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function repairItemDetail(){
        return $this->belongsTo('App\repairItemDetail', 'return_Item_Detail_id');
    }
}
