<?php


/**
 * Created by PhpStorm.
 * User: Chamath Abeysinghe
 * Date: 5/8/2016
 * Time: 9:44 PM
 */


namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;


use App\Http\Requests;
use Illuminate\Support\Facades\View;

class ItemController extends Controller
{

    public function getItemInfo(Request $request)
    {
        // echo "item View";
        $itemCode = $request['keyWords'];
        $item = Item::where('serial_number', $itemCode)->first();
        $supplier = Item::find($item['id'])->supplier;
        //echo $itemCode;
        //echo $item;
        //echo $supplier;
        return View::make('/return_management/itemsearchresults')->with('item', $item)->with('supplier', $supplier);
    }

    public function postDeallocateItem(Request $request)
    {
        $item_id = $request['item_id'];
        $item = Item::where('id', $item_id)->first();
        $item->delete();
    }

    public function postChangeItem(Request $request)
    {
        $item_id = $request['item_id'];
        $item = Item::where('id', $item_id)->first();
        $item->item_name = $request['itemName'];
        $item->serial_number = $request['serialNumber'];
        $item->unit_cost = $request['unitCost'];
        $item->update();
    }

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

