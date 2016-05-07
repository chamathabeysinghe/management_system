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
        $item=Item::where('serial_number',$itemCode)->get();
        //echo $itemCode;
        //echo $item;
        return View::make('/return_management/itemsearchresults')->with('items',$item);
    }
}
