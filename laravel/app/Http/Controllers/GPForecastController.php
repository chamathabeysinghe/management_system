<?php

/**
 * Created by PhpStorm.
 * User: Chamath Abeysinghe
 * Date: 5/1/2016
 * Time: 7:23 PM
 */

namespace App\Http\Controllers;

use App\GPForecast;
use App\Item;
use App\ReportField;
use Illuminate\Http\Request;

class GPForecastController extends Controller
{

    public function postCreateGPForecast(Request $request){
        $project_id=$request['project_id'];
        $items=Item::where('owner_id',$project_id)->get();
        echo sizeof($items);
        $fieldsList=array();
        foreach($items as $item){
            if($item->sale_type == 1){

                $reportField=new ReportField();
                $reportField->name=$item->item_name;
                $reportField->unitCost=$item->unit_cost;
                array_push($fieldsList,serialize($reportField));
            }
        }

        $gpForecast=new GPForecast();
        $gpForecast->project_id=$project_id;
        $gpForecast->fieldList=(serialize($fieldsList));
        $gpForecast->save();


    }

    //those things should be tested
    public function getGPForecast(Request $request){
        $gpForecast=GPForecast::where('project_id',$request['project_id'])->first(); //here i read one of array i write to database
        $fieldList=unserialize($gpForecast->fieldList );
        foreach($fieldList as $field){

            echo unserialize($field)->name;

            echo '<br>';
        }
        return view('project_management/gp_forecast',['fieldList'=>$fieldList]);
    }
}