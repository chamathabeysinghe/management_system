<?php


namespace App\Http\Controllers;

use App\Bill;
use App\FinancialReport;
use App\Item;
use App\Project;
use App\ReportField;
use App\Stock;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;


class ResetPasswordController extends Controller
{

    public function resetPassword(Request $request){
        $email=$request['email'];
        $old_password = $request['old_password'];
        $new_password = $request['new_password'];
        //$re_password = $request['re_password'];

        echo $email;
        echo $old_password;
        echo $new_password;
        //echo re_password;
    }
}