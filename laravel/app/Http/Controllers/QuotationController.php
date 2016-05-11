<?php
namespace App\Http\Controllers;

use App\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function postCreateQuotation(Request $request)
    {
        $quotation_date =$request['quotation_date'];
        $client_name = $request['client_name'];
        $client_email = $request['client_email'];
        $client_address = $request['client_address'];
        $client_tel = $request['client_tel'];
        //$quotation_amount = $request['quotation_amount'];
        $quotation_amount = "0000";

        $quotation = new Quotation();
        $quotation->quotation_date = $quotation_date;
        $quotation->client_name = $client_name;
        $quotation->client_address = $client_address;
        $quotation->client_email = $client_email;
        $quotation->client_tel = $client_tel;
        $quotation->quotation_amount = $quotation_amount;

        $quotation->save();

        return redirect()->back();
    }

    public function downloadQuotation(Request $request)
    {

    }

    public function emailQuotation(Request $request)
    {

    }

    public function printQuotation(Request $request)
    {

    }

}