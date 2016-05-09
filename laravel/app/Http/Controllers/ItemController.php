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


class ItemController extends Controller
{
    public function postDeallocateItem(Request $request){
        $item_id= $request['item_id'];
        $item=Item::where('id',$item_id)->first();
        $item->delete();
    }
    public function postChangeItem(Request $request){
        $item_id= $request['item_id'];
        $item=Item::where('id',$item_id)->first();
        $item->item_name=$request['itemName'];
        $item->serial_number=$request['serialNumber'];
        $item->unit_cost=$request['unitCost'];
        $item->update();
    }
    public function postAllocateSingleItem(Request $request){

        $item=new Item();
        $item->item_name=$request['itemName'];
        $item->serial_number=$request['serialNumber'];
        $item->unit_cost=$request['unitCost'];
        $item->sale_type=1;
        $item->owner_id=$request['project_id'];
        $item->save();
        $id=$item->id;
        return $id;
    }
}