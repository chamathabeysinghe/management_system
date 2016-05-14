<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnItemDetail extends Model
{
    public function customer(){
        return $this->hasOne('App\Customer', 'return_Item_Detail_id');
    }
    public function items(){
        return $this->belongsToMany('App\Item','item_return_item_details');
    }
    public function replacement(){
        return $this->belongsTo('App\Item','replacement_id');
    }
    public function repairItemDetail(){
        return $this->hasOne('App\RepairItemDetail','return_Item_Detail_id');
    }
    public function warrantyItemDetail(){
        return $this->hasOne('App\WarrantyItemDetail','return_Item_Detail_id');
    }
}
