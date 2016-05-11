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
    public function getAReturnInfo($id)
    {
        $returnData = ReturnItemDetail::find($id);
        $returnData->load('repairItemDetail', 'warrantyItemDetail', 'customer','items');
        $customer =$returnData->customer;
        $item=$returnData->items;
        $item=$item->first();
        $supplier=$item->Supplier;



        //echo $returnData;
//        echo $customer;
//        echo $item;
//        echo $supplier;
        return View::make('/return_management/returnsearchresults')->with('data', $returnData)->with('item', $item)->with('customer', $customer)->with('supplier', $supplier);

    }
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
                echo $returnDatas;


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
        return View::make('/return_management/managereturnview')->with('returnDatas', $returnDatas)->with('items', $item)->with('customers', $customer)->with('supplier', $supplier);
    }

    public function getWarrantyDetail()
    {

    }

    public function updateReturn(Request $request){
        echo "dfdsgsg";
        //echo $request['data'];
        $returnData=$request['data'];
        //print_r($returnData['id']);
        print_r($returnData);
        echo $returnData;
    }

    public function getRepairDetail()
    {

    }

    public function addNewReturn(Request $request)
    {
       // echo $request;
        $data= array();
        parse_str($request['data'], $data);
        //echo $request['data'];
        $this->validate($request, [
            'customer' => 'required',
            'contact' => 'required',
            'email' => 'email',
            'address' => 'required',
        ]);
        $customer = new Customer();
        $returnDetail = new ReturnItemDetail();
        //echo  $item;


        //echo $data['item_id'];
        //echo "working";
        //echo $item['id'];
        $returnDetail->date = date("Ymd");
        $returnDetail->remarks = $data['remarks'];
        $returnDetail->job_type = $request['option'];
        $customer->customerName = $data['customer'];
        $customer->contactNo = $data['contact'];
        $customer->email = $data['email'];
        $customer->address = $data['address'];
        //echo $request['option'];
        $item = Item::where("serial_number", $data['item_id'])->first();
        $returnDetail->save();
        $returnDetail->items()->attach($item['id']);
        $returnDetail->customer()->save($customer);
        //return view('return_management\newreturnitem');
    }
}
