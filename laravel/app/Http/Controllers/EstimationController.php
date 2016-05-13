<?php
namespace App\Http\Controllers;

use App\Estimation;
use Illuminate\Http\Request;

class EstimationController extends Controller
{
    public function getEstimationView()
    {
        return view("quotation_management/create_estimation");
    }

}