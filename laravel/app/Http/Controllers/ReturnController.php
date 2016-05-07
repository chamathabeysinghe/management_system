<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Http\Requests;
use App\Item;
use App\ReturnItemDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ReturnController extends Controller
{
    public function getReturnInfo(Request $request){
        // echo "item View";
        $itemCode=$request['keyWords'];
        $searchType=$request['searchType'];
        $item='';
        $customer='';
        $returnData='';
        $id="";
        $cusId="";
        if($searchType=="jobNo"){
            $returnData=ReturnItemDetail::where('id',$itemCode)->get();
            foreach ($returnData as $data) {
                $id=$data->itemCode;
                $cusId=$data->customerId;
            }
            if($id != null and $cusId !=null){
                $item=Item::where('id',$id)->get();
                $customer=Customer::where('id',$cusId)->get();
            }

            //echo $id;
        }else{
            $item=Item::where('serial_number',$itemCode)->get();
            foreach ($item as $data) {
                $id=$data->id;

            }
            $returnData=ReturnItemDetail::where('itemCode',$id)->get();
            foreach ($returnData as $data) {

                $cusId=$data->customerId;
            }
            $customer=Customer::where('id',$cusId)->get();
        }

        //echo $itemCode;
       // echo $item;
       // echo $returnData;
      //  echo $customer;
        return View::make('/return_management/returnsearchresults')->with('returnDatas',$returnData)->with('items',$item)->with('customers',$customer);
    }
}
