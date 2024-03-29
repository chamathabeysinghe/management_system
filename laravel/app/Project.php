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
    public function gpforecast(){
        return $this->hasOne('App\GPForecast');
    }
    public function financialReport(){
        return $this->hasOne('App\FinancialReport');
    }
    public function bills(){
        return $this->hasMany('App\Bill');
    }
}
