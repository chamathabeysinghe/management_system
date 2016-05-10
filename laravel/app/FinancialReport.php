<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialReport extends Model
{
    //
    public function project(){
        return $this->belongsTo('App\Project');
    }
}
