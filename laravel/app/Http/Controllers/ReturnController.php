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
    // search and find a return record by return id
    public function getAReturnInfo($id)
    {
        $returnData = ReturnItemDetail::find($id);
        $returnData->load('repairItemDetail', 'warrantyItemDetail', 'customer','items','replacement');
        $customer =$returnData->customer;
        $item=$returnData->items;
        $item=$item->first();
        $supplier=$item->Supplier;

        return View::make('/return_management/returnsearchresults')->with('data', $returnData)->with('item', $item)->with('customer', $customer)->with('supplier', $supplier);

    }

    // get return info dynamically
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

            //echo $item;
            //echo "-------------------------------------------";
            if ($returnData != null) {
                $returnDatas = new Collection();
                $returnDatas->add($returnData);
                $returnDatas->load('repairItemDetail', 'warrantyItemDetail');
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



            }

        }

        // send data to the view
        return View::make('/return_management/managereturnview')->with('returnDatas', $returnDatas)->with('items', $item)->with('customers', $customer)->with('supplier', $supplier);
    }

    public function getWarrantyDetail()
    {

    }
    public function newReturnItem(){
        //simple redirect thru controller
        return View::make('return_management/NewReturnItem');
    }
    public function manageReturnItem(){
        //simple redirect thru controller
        return View::make('return_management/ManageReturnItem');
    }
    public function returnDashboard(){
        //simple redirect thru controller
        return View::make('return_management/ReturnDashboard');
    }

    // update return record accordingly. this can happen in various ways.
    public function updateReturn(Request $request){
        $data= array();
        parse_str('controler');
        parse_str($request['data'], $data);
        $returnData=ReturnItemDetail::find($request['returnid']);
        $returnData->load('repairItemDetail', 'warrantyItemDetail','replacement','items');


        $item=$returnData->items;
        $item=$item->first();
        // if there is no replacement added already
        if($returnData->replacement == null){
            //check if replacement is added
            if($data['replacement'] != ''){
               // check if replacement is the same item
                if($data['replacement']==$item['serial_number']){
                    $item->returnItemDetail()->save($returnData);
                }else{
                    //add new replacement
                    $newitem=new Item();
                    $newitem->serial_number=$data['replacement'];
                    $newitem->item_name=$item['item_name'];
                    $newitem->unit_cost=$item['unit_cost'];
                    $newitem->sale_type=$item['sale_type'];
                    $newitem->owner_id=$item['owner_id'];
                    $newitem->warranty=$item['warranty'];
                    $newitem->supplier_id=$item['supplier_id'];
                    $newitem->save();
                    $newitem->returnItemDetail()->save($returnData);
                    echo 'end';

                }
            }
        }else{
            if($data['replacement']==$returnData->replacement['serial_number']){
                // do nothing if replacement is added
            }else{
                // add new replacement
                $newitem=new Item();
                $newitem->serial_number=$data['replacement'];
                $newitem->item_name=$item['item_name'];
                $newitem->unit_cost=$item['unit_cost'];
                $newitem->sale_type=$item['sale_type'];
                $newitem->owner_id=$item['owner_id'];
                $newitem->warranty=$item['warranty'];
                $newitem->supplier_id=$item['supplier_id'];
                $newitem->save();
                $newitem->returnItemDetail()->save($returnData);
            }

        }
        /**
         *if job type is warranty add data
         */
        if($data['job_type'] == "warranty"){
            if($data['job_type'] !=$returnData['job_type'] ){
                $returnData->job_type=$data['job_type'];
                $returnData->save();
            }
            $warranty=$returnData->warrantyItemDetail;
           // echo 'if working';
            if($warranty == null){
                //echo 'warranty if';
                $warranty=new warrantyItemDetail();
                $warranty->wcnNo=$data['wcnno'];
                $warranty->wcnIssueDate=$data['wcndate'];
                $warranty->receivedDate=$data['wrnreceived'];
                $warranty->wrnNo=$data['wrnno'];
                $returnData->warrantyItemDetail()->save($warranty);
               // echo 'warranty if end';
            }else{
                //echo 'warranty else';
                $warranty->wcnNo=$data['wcnno'];
                $warranty->wcnIssueDate=$data['wcndate'];
                $warranty->receivedDate=$data['wrnreceived'];
                $warranty->wrnNo=$data['wrnno'];
                $warranty->save();
            }
        /**
         * if job type is return add data
         */
        }elseif($data['job_type'] == "repair"){
            if($data['job_type'] !=$returnData['job_type'] ){
                $returnData->job_type=$data['job_type'];
                $returnData->save();
            }
            //echo 'repair if';
            $repair=$returnData->repairItemDetail;
            if($repair == null){
                $repair=new repairItemDetail();
                $repair->receiveDate=$data['receivedRepair'];
                $repair->repairCost=$data['repairCost'];
                $returnData->repairItemDetail()->save($repair);

            }else{
                $repair->receiveDate=$data['receivedRepair'];
                $repair->repairCost=$data['repairCost'];
                $repair->save();

            }
        }

    }

    public function getRepairDetail()
    {

    }

    /**
     * @param Request $request
     * @return mixed
     * get detail wanted for job note
     */
    public function getJobNote(Request $request){
        $returnData=ReturnItemDetail::all() -> last();
        $returnData->load('items');
        $customer =$returnData->customer;
        $item=$returnData->items;
        $item=$item->first();
        //$supplier=$item->Supplier;

        return View::make('/return_management/job_note')->with('data', $returnData)->with('item', $item)->with('customer', $customer);
    }

    /**
     * @param Request $request
     * @return mixed
     *
     * get detail wanted for WCN
     */
    public function getWCN(Request $request){
        $id=$request['id'];
        //echo $id;
        //echo 'controller';
        $returnData=ReturnItemDetail::find($id);
        $returnData->load('items','warrantyItemDetail');
       // $customer =$returnData->customer;
        $item=$returnData->items;
        $item=$item->first();
        $supplier=$item->Supplier;

        return View::make('/return_management/WCN')->with('data', $returnData)->with('item', $item)->with('supplier', $supplier);
    }

    /**
     * @param Request $request
     * add new return item to the database
     */
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
