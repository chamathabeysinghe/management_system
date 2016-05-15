<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstimationRecord extends Model
{
    protected $itemcode;
    protected $item;
    protected $description;
    protected $unitprice;
    protected $quantity;
    protected $totalprice;
}
