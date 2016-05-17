<?php
/**
 * Created by PhpStorm.
 * User: Ashan
 * Date: 5/7/2016
 * Time: 10:07 AM
 */

namespace App\Http\Controllers;

//use App\Bill;
use App\Dealer;
//use App\FinancialReport;
//use App\Item;
//use App\Project;
//use App\ReportField;
use App\Item;
use App\Stock;
use App\StockField;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;


class DealerStockController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Function for saving stock
     */
    public function saveStock(Request $request){
        $dealer_details=$request['dealer_details'];
        $finalTotal=$request['total'];
        echo "testing total";
        echo $finalTotal;
        $dealer=Dealer::where('register_no',$dealer_details)->first();

        $stock=new Stock();
        $stockList=array();
        $jfo = json_decode($request['new_data']);
        foreach($jfo as $newData){

            $stockField=new StockField();
            $stockField->itemCode=$newData->itemcode;
            $stockField->itemName=$newData->itemname;
            $stockField->serialNo=$newData->serialno;
            $stockField->unitCost=$newData->unitprice;
            $stockField->totalCost=$newData->totalcost;
            array_push($stockList,$stockField);

            $item = new Item();
            $item->serial_number=$newData->serialno;
            $item->item_name=$newData->itemname;
            $item->unit_cost=$newData->unitprice;
            $item->sale_type=2;
            $item->owner_id=$dealer->id;
            $item->warranty=$newData->warranty;
            $item->supplier_id=$newData->supplier;
            $item->item_code=$newData->itemcode;
            $item->save();
        }

        $stock->stock_field=(serialize($stockList));
        $stock->date= $request['date'];
        $stock->register_no = $request['dealer_details'];
        $stock->total_cost =$request['total'];
        $dealer->stock()->save($stock);

        return redirect()->back();

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Function for get selling item to include in the stock
     */

    public function getSellingItems(Request $request){
        $sellingitems = SellingItem::all();
        return view("dealer_management/new_stock",['sellingitems'=> $sellingitems] );
    }
}