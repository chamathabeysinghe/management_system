<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests;
use App\Item;
use App\repairItemDetail;
use App\ReturnItemDetail;
use App\warrantyItemDetail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ReturnController extends Controller
{
    public function getReturnInfo(Request $request)
    {
        // echo "item View";
        $itemCode = $request['keyWords'];
        $searchType = $request['searchType'];
        $item = '';
        $customer = '';
        $returnDatas = '';
        $supplier = '';

        if ($searchType == "jobNo") {
            $returnData = ReturnItemDetail::find($itemCode);
            $returnDatas = new Collection();
            $returnDatas->add($returnData);
            $returnDatas->load('repairItemDetail', 'warrantyItemDetail');
            //echo $item;
            //echo "-------------------------------------------";
            if ($returnData != null) {
                foreach ($returnData->items as $item) {
                    $item = $item;
                }
                if ($item != null) {
                    $supplier = Item::find($item['id'])->supplier;
                    $customer = ReturnItemDetail::find($itemCode)->customer;
                }


            }
//            foreach ($returnData as $data) {
//                $id=$data->itemCode;
//                $cusId=$data->customerId;
//            }
//            if($id != null and $cusId !=null){
//                $item=Item::where('id',$id)->get();
//                $customer=Customer::where('id',$cusId)->get();
//            }


            //echo $id;
        } else {
            $item = Item::where('serial_number', $itemCode)->first();
            //echo $item;

            //echo $item;

            if ($item != null) {
                $returnDatas = Item::find($item['id'])->returnItemDetails;
                //$returnDatas=Item::with('returnItemDetails.repairItemDetail','returnItemDetails.warrantyItemDetail')->find($item['id']);
                $returnDatas->load('repairItemDetail', 'warrantyItemDetail');
                //echo $returnDatas;


                $supplier = Item::find($item['id'])->supplier;

                if (!$returnDatas->isEmpty()) {
                    $returnData = $returnDatas->last();
                    $id = $returnData['id'];
                    $customer = ReturnItemDetail::find($id)->customer;
                }
//                $allData=$repairs->merge($warrantys);
//                $allData=$allData->merge($returnDatas);


            }

        }

        //echo $itemCode;
//        echo $item;
//       echo $returnDatas;
//        echo $customer;
//        echo  $supplier;
//        echo "----------------------------------------------------------------";
//        echo $allData;
//        echo "----------------------------------------------------------------";
//        echo $returnDatas;
        return View::make('/return_management/returnsearchresults')->with('returnDatas', $returnDatas)->with('items', $item)->with('customers', $customer)->with('supplier', $supplier);
    }

    public function getWarrantyDetail()
    {

    }

    public function getRepairDetail()
    {

    }

    public function addNewReturn(Request $request)
    {


        $this->validate($request, [
            'customer' => 'required',
            'contact' => 'required',
            'email' => 'email',
            'address' => 'required',
        ]);
        $customer = new Customer();
        $returnDetail = new ReturnItemDetail();
        //echo  $item;
        echo $request['item_id'];
        echo "working";
        //echo $item['id'];
        $returnDetail->date = date("Ymd");
        $returnDetail->remarks = $request['remarks'];
        $returnDetail->job_type = $request['option'];
        $customer->customerName = $request['customer'];
        $customer->contactNo = $request['contact'];
        $customer->email = $request['email'];
        $customer->address = $request['address'];
        //echo $request['option'];
        $item = Item::where("serial_number", $request['item_id'])->first();
        $returnDetail->save();
        $returnDetail->items()->attach($item['id']);
        $returnDetail->customer()->save($customer);
        //return view('return_management\newreturnitem');
    }
}
