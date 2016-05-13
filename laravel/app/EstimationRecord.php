<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstimationRecord extends Model
{
    protected $itemcode;
    protected $itemname;
    protected $description;
    protected $unitprice;
    protected $quantity;
}
