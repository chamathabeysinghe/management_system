<?php
namespace App\Http\Controllers;

use App\Estimation;
use App\EstimationRecord;
use App\Quotation;
use Illuminate\Http\Request;

class EstimationController extends Controller
{
    public function postCreateEstimation(Request $request)
    {
        echo $request['client_name'];

        $estimation_date = $request['estimation_date'];
        $client_name = $request['client_name'];
        $client_email = $request['client_email'];
        $client_address = $request['client_address'];
        $client_tel = $request['client_tel'];
        //$quotation_amount = $request['quotation_amount'];
        $estimation_amount = "0000";
        //$estimation_status = $request['estimation_status'];
        $estimation_status = "not defined";

        $estimation = new Estimation();
        $estimation->estimation_date = $estimation_date;
        $estimation->client_name = $client_name;
        $estimation->client_address = $client_address;
        $estimation->client_email = $client_email;
        $estimation->client_tel = $client_tel;
        $estimation->estimation_amount = $estimation_amount;
        $estimation->estimation_status = $estimation_status;

        $fieldsList=array();
        $jfo = json_decode($request['new_data']);
        foreach($jfo as $newData){

            $reportField=new EstimationRecord();
            $reportField->itemcode=$newData->itemcode;
            $reportField->item=$newData->item;
            $reportField->unitprice=$newData->unitprice;
            $reportField->quantity=$newData->quantity;
            $reportField->totalprice=$newData->totalprice;
            $fieldsList[$newData->item]=$reportField;
        }

        $estimation->estimation_record_list=(serialize($fieldsList));
        $estimation->save();

        // return redirect()->route('newquotation');
    }

    public function getEstimationID()
    {
        $estimations = Estimation::orderBy('id','desc')->first();
        return view("quotation_management/newestimation", ['estimation'=>$estimations]);
    }

    public function getEstimationByQuotation(Request $request){
        $quotation=Quotation::where('id',55)->first();//$request['id']
        $recordList=unserialize($quotation->quotation_record_list);

        foreach($recordList as $record){
            echo 'hello';
            echo $record->totalprice;
        }

        return view("quotation_management/newestimation", ['estimation'=>$quotation,'record_list'=>$recordList]);
    }



}