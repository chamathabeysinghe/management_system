<?php


/**
 * Created by PhpStorm.
 * User: Chamath Abeysinghe
 * Date: 5/8/2016
 * Time: 9:44 PM
 */


namespace App\Http\Controllers;


use App\Dealer;
use App\DeallocatedItem;
use App\Item;
use App\Project;
use Illuminate\Http\Request;


use App\Http\Requests;
use Illuminate\Support\Facades\View;

class ItemController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     *
     * get item info wanted for return new item
     */
    public function getItemInfo(Request $request)
    {
        // echo "item View";
        $project=null;
        $dealer=null;



        $itemCode = $request['keyWords'];
        $item = Item::where('serial_number', $itemCode)->first();
        $supplier=null;
        if($item !=null){
            $item->load('returnItemDetail');
            $supplier = Item::find($item['id'])->supplier;

            if($item['sale_type']== 1){
                $project=Project::find($item['owner_id']);
            }else{
                $dealer=Dealer::find($item['owner_id']);
            }
        }

        //echo $itemCode;
        //echo $item;
        //echo $supplier;
        return View::make('/return_management/itemsearchresults')->with('item', $item)->with('supplier', $supplier)->with('dealer', $dealer)->with('project', $project);
    }

    /**
     * get deallocated items
     * @param Request $request
     */
    public function postDeallocateItem(Request $request)
    {
        $item_id = $request['item_id'];
        $item = Item::where('id', $item_id)->first();
        $deallocated_item=new DeallocatedItem();
        $deallocated_item->serial_number=$item->serial_number;
        $deallocated_item->item_name=$item->item_name;
        $deallocated_item->return_state=1;
        $item->delete();
        $deallocated_item->save();
    }

    /**
     * change a item
     * @param Request $request
     */
    public function postChangeItem(Request $request)
    {
        $item_id = $request['item_id'];
        $item = Item::where('id', $item_id)->first();
        $item->item_name = $request['itemName'];
        $item->serial_number = $request['serialNumber'];
        $item->unit_cost = $request['unitCost'];
        $item->warranty = $request['warranty'];
        $item->supplier_id = $request['supplier_id'];
        $item->update();
    }

    /**
     * allocate a singhle item
     * @param Request $request
     * @return mixed
     */
    public function postAllocateSingleItem(Request $request)
    {

        $item = new Item();
        $item->item_name = $request['itemName'];
        $item->serial_number = $request['serialNumber'];
        $item->unit_cost = $request['unitCost'];
        $item->sale_type = 1;
        $item->owner_id = $request['project_id'];
        $item->save();
        $id = $item->id;
        return $id;
    }
}

