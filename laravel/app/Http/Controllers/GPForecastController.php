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
use App\Project;
use App\ReportField;
use Illuminate\Http\Request;

class GPForecastController extends Controller
{

    /**
     * create the gp forecast
     * @param Request $request
     */
    public function postCreateGPForecast(Request $request){
        $project_id=$request['project_id'];
        $items=Item::where('owner_id',$project_id)->get();
        $fieldsList=array();
        foreach($items as $item){
            if($item->sale_type == 1){
                $name=$item->item_name;

                if(!array_key_exists($name,$fieldsList)){
                    $reportField=new ReportField();
                    $reportField->name=$item->item_name;
                    $reportField->unitCost=$item->unit_cost;
                    $reportField->quantity=1;
                    $reportField->totalCost=$item->unit_cost;
                    $fieldsList[$name]=$reportField;
                }
                else{
                    $reportField=$fieldsList[$name];
                    $reportField->quantity=$reportField->quantity+1;
                    $reportField->totalCost=$reportField->totalCost+$reportField->unitCost;
                }

            }
        }
        $project=Project::where('id',$project_id)->first();

        $gpForecast=new GPForecast();
        //$gpForecast->project_id=$project_id;
        $gpForecast->fieldList=(serialize($fieldsList));
        //$gpForecast->save();

        $project->gpforecast()->save($gpForecast);


    }

    /**
     * get the gp forecast
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getGPForecast(Request $request){
        $gpForecast=GPForecast::where('project_id',$request['project_id'])->first(); //here i read one of array i write to database
        if($gpForecast==null){
            $this->postCreateGPForecast($request);
            $gpForecast=GPForecast::where('project_id',$request['project_id'])->first(); //here i read one of array i write to database
        }


        $fieldList=unserialize($gpForecast->fieldList );
        $recordsList=array();
        foreach($fieldList as $field){

            array_push($recordsList,($field));

        }
        return view('project_management/gp_forecast',['recordList'=>$recordsList,'project_id'=>$request['project_id'],'gp'=>$gpForecast]);
    }

    /**
     * post update to gp forecast
     * @param Request $request
     */
    public function postUpdateGPForecast(Request $request){
        $project_id=$request['project_id'];
        $created_by=$request['created_by'];
        $checked_by=$request['checked_by'];
        $date=$request['date'];
        $project=Project::where('id',$project_id)->first();
        $gpForecast=$project->GPForecast;
        $fieldsList=array();
        $jfo = json_decode($request['new_data']);
        foreach($jfo as $newData){
            $reportField=new ReportField();
            $reportField->name=$newData->item;
            $reportField->unitCost=$newData->unitprice;
            $reportField->quantity=$newData->quantity;
            $reportField->totalCost=$newData->totalcost;
            $reportField->estimation=$newData->estimate;
            $reportField->unitmargin=$newData->unitmargine;
            $fieldsList[$newData->item]=$reportField;
        }
        $gpForecast->fieldList=(serialize($fieldsList));
        $gpForecast->profit=$request['total_val'];
        $gpForecast->crated_by=$created_by;
        $gpForecast->checked_by=$checked_by;
        $gpForecast->date=$date;
        $project->gpforecast()->save($gpForecast);
    }

    /**
     * get the gp view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getGPView(){
        return view("project_management/gp_forecast");
    }
}