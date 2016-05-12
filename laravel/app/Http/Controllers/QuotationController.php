<?php
namespace App\Http\Controllers;

use App\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function postCreateQuotation(Request $request)
    {
        echo $request['client_name'];
        $jfo = json_decode($request['new_data']);
        echo $jfo;
//        $quotation_date = $request['quotation_date'];
//        $client_name = $request['client_name'];
//        $client_email = $request['client_email'];
//        $client_address = $request['client_address'];
//        $client_tel = $request['client_tel'];
//        //$quotation_amount = $request['quotation_amount'];
//        $quotation_amount = "0000";
//
//        $quotation = new Quotation();
//        $quotation->quotation_date = $quotation_date;
//        $quotation->client_name = $client_name;
//        $quotation->client_address = $client_address;
//        $quotation->client_email = $client_email;
//        $quotation->client_tel = $client_tel;
//        $quotation->quotation_amount = $quotation_amount;
//
//
//
//        $fieldsList=array();
//        $jfo = json_decode($request['new_data']);
//        foreach($jfo as $newData){
//
//            $reportField=new QuotationRecord();
//            $reportField->name=$newData->item;
//            $reportField->unitCost=$newData->unitprice;
//            $reportField->quantity=$newData->quantity;
//            $reportField->totalCost=$newData->totalcost;
//            $fieldsList[$newData->item]=$reportField;
//        }
//
//        $quotation->fieldList=(serialize($fieldsList));
//        $quotation->save();
//
//        return redirect()->route('newquotation');
    }

    public function getQuotationSummary()
    {
        $quotations = Quotation::orderBy('id', 'desc')->get();
        return view("quotation_management/quotation_summary", ['quotations'=> $quotations]);
    }

}