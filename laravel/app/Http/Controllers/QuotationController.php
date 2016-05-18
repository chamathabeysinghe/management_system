<?php
namespace App\Http\Controllers;

use App\Quotation;
use App\QuotationRecord;
use App\SellingItem;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function postCreateQuotation(Request $request)
    {
        echo $request['client_name'];


        $quotation_date = $request['quotation_date'];
        $client_name = $request['client_name'];
        $client_email = $request['client_email'];
        $client_address = $request['client_address'];
        $client_tel = $request['client_tel'];
        $quotation_amount = $request['quotation_amount'];

        echo 'client';
        echo $client_name;
        $quotation = new Quotation();
        $quotation->quotation_date = $quotation_date;
        $quotation->client_name = $client_name;
        $quotation->client_address = $client_address;
        $quotation->client_email = $client_email;
        $quotation->client_tel = $client_tel;
        $quotation->quotation_amount = $quotation_amount;



        $fieldsList=array();
        $jfo = json_decode($request['new_data']);
        foreach($jfo as $newData){

            $reportField=new QuotationRecord();
            $reportField->itemcode=$newData->itemcode;
            $reportField->itemname=$newData->item;
            $reportField->description=$newData->description;
            $reportField->unitprice=$newData->unitprice;
            $reportField->quantity=$newData->quantity;
            $reportField->totalprice=$newData->totalprice;
            array_push($fieldsList,$reportField);
//            $fieldsList[$newData->item]=$reportField;
        }

        $quotation->quotation_record_list=(serialize($fieldsList));
        $quotation->save();

      // return redirect()->route('newquotation');
    }

    public function getQuotationSummary()
    {
        $quotations = Quotation::orderBy('id', 'desc')->get();
        return view("quotation_management/quotation_summary", ['quotations'=> $quotations]);
    }

    public function getQuotationID()
    {
        $quotations = Quotation::orderBy('id', 'desc')->first();
        $sellingitems = SellingItem::all();
        return view("quotation_management/newquotation", ['quotation'=> $quotations],['sellingitems'=> $sellingitems] );
    }

}