<?php
/**
 * Created by PhpStorm.
 * User: Chamath Abeysinghe
 * Date: 5/7/2016
 * Time: 10:07 AM
 */

namespace App\Http\Controllers;

use App\Bill;
use App\FinancialReport;
use App\Item;
use App\Project;
use App\ReportField;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;


class FinancialReportController extends Controller
{
    public function postCreateFinancialReport(Request $request){
        $project_id=$request['project_id'];
        $items=Item::where('owner_id',$project_id)->get();
        echo sizeof($items);
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

        $bills=Bill::where('project_id',$project_id)->get();
        foreach($bills as $bill){
            $name=$bill->bill_type;
            if(!array_key_exists($name,$fieldsList)){
                $reportField=new ReportField();
                $reportField->name=$bill->bill_type;
                $reportField->totalCost=$bill->value;
                $fieldsList[$name]=$reportField;
            }
            else{
                $reportField=$fieldsList[$name];
                $reportField->totalCost=$reportField->totalCost+$bill->value;
            }
        }
        $project=Project::where('id',$project_id)->first();

        $financialReport=new FinancialReport();
        //$gpForecast->project_id=$project_id;
        $financialReport->fieldList=(serialize($fieldsList));
        //$gpForecast->save();

        $project->financialReport()->save($financialReport);
    }

    public function getFinancialReportView(Request $request){
        $financialReport=FinancialReport::where('project_id',$request['project_id'])->first(); //here i read one of array i write to database
        if($financialReport==null){
            $this->postCreateFinancialReport($request);
            $financialReport=FinancialReport::where('project_id',$request['project_id'])->first(); //here i read one of array i write to database
        }
        $fieldList=unserialize($financialReport->fieldList );
        $recordsList=array();
        foreach($fieldList as $field){

            //echo unserialize($field)->name;
            array_push($recordsList,($field));
            //echo '<br>';
        }
        return view('project_management/financial_report',['recordList'=>$recordsList,'freport'=>$financialReport,'project_id'=>$request['project_id']]);
    }

    public function postUpdateFinancialReport(Request $request){
        $project_id=$request['project_id'];
        $created_by=$request['created_by'];
        $checked_by=$request['checked_by'];
        $date=$request['date'];
        $project=Project::where('id',$project_id)->first();

        $financialReport=$project->FinancialReport;
        $fieldsList=array();

        $jfo = json_decode($request['new_data']);
        foreach($jfo as $newData){

            $reportField=new ReportField();
            $reportField->name=$newData->item;
            $reportField->unitCost=$newData->unitprice;
            $reportField->quantity=$newData->quantity;
            $reportField->totalCost=$newData->totalcost;
            $fieldsList[$newData->item]=$reportField;
        }
        $financialReport->fieldList=(serialize($fieldsList));
        $financialReport->profit= $request['total_val'];

        $financialReport->crated_by=$created_by;
        $financialReport->checked_by=$checked_by;
        $financialReport->date=$date;
        $project->financialReport()->save($financialReport);

    }
}