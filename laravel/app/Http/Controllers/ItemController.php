<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\View;

class ItemController extends Controller
{
    //

    public function getItemInfo(Request $request){
           // echo "item View";
        $itemCode=$request['keyWords'];
        $item=Item::where('serial_number',$itemCode)->first();
        $supplier=Item::find($item['id'])->supplier;
        //echo $itemCode;
        echo $item;
        echo $supplier;
        return View::make('/return_management/itemsearchresults')->with('item',$item)->with('supplier',$supplier);
    }
}
