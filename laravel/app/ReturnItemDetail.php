<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnItemDetail extends Model
{
    public function customer(){
        return $this->hasOne('App\Customer');
    }
    public function items(){
        return $this->belongsToMany('App\Item','item_return_item_details');
    }
    public function repairItemDetail(){
        return $this->hasOne('App\RepairItemDetail','return_Item_Detail_id');
    }
    public function warrantyItemDetail(){
        return $this->hasOne('App\WarrantyItemDetail','return_Item_Detail_id');
    }
}