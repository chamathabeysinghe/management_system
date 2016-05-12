<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportField extends Model
{
    //
    //  protected $fillable = array('name', 'quantity', 'unitCost','totalCost','estimation');
    protected $itemcode;
    protected $itemname;
    protected $description;
    protected $unitprice;
    protected $quantity;

}
