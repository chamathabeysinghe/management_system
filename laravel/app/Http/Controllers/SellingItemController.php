<?php
namespace App\Http\Controllers;

use App\SellingItem;
use Illuminate\Http\Request;

class SellingItemController extends Controller
{
    public function postAddSellingItems(Request $request)
    {
        $item_code =$request['item_code'];
        $item_name = $request['item_name'];
        $item_description = $request['item_description'];
        $unit_price = $request['unit_price'];

        $sellingitem = new sellingitem();
        $sellingitem->item_code = $item_code;
        $sellingitem->item_name = $item_name;
        $sellingitem->item_description = $item_description;
        $sellingitem->unit_price = $unit_price;

        $sellingitem->save();

        return redirect()->back();
    }

    public function getSellingItemView()
    {
        return view("quotation_management/add_sellingitem");
    }

}