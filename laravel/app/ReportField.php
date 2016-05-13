<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportField extends Model
{
    //
    //  protected $fillable = array('name', 'quantity', 'unitCost','totalCost','estimation');
    protected $name;
    protected $quantity;
    protected $unitCost;
    protected $totalCost;
    protected $estimation;
}
