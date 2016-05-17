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
use App\Stock;
use App\StockField;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;


class DealerStockController extends Controller
{

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
            $stockField->quantity=$newData->quantity;
            $stockField->totalCost=$newData->totalcost;
            array_push($stockList,$stockField);
//            $stockField[$newData->item]=$stockField;
        }

        $stock->stock_field=(serialize($stockList));
        $stock->date= $request['date'];
        $stock->register_no = $request['dealer_details'];
        $stock->total_cost =$request['total'];
        $dealer->stock()->save($stock);

       // return redirect()->back();

    }

    public function getSellingItems(Request $request){
        $sellingitems = SellingItem::all();
        return view("dealer_management/new_stock",['sellingitems'=> $sellingitems] );
    }
}