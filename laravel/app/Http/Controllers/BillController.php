<?php
/**
 * Created by PhpStorm.
 * User: Chamath Abeysinghe
 * Date: 5/7/2016
 * Time: 8:36 AM
 */

namespace App\Http\Controllers;
use App\Bill;
use App\Project;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;


class BillController extends Controller
{

    public function postAddBill(Request $request){
        $project=Project::where('id',$request['project_id'])->first();
        echo $request['type'];
        $bill=new Bill();
        $bill->bill_type=$request['type'];
        $bill->description=$request['description'];
        $bill->value=$request['value'];
        $project->bills()->save($bill);
        return redirect()->back();
    }

    public function getAddBillView(Request $request){
        return view('project_management/add_bill',['project_id'=>$request['project_id']]);
    }

    public function postRemoveBill(Request $request){
        $bill=Bill::where('id',$request['bill_id'])->first();
        if($bill!=null){
            $bill->delete();
        }
    }

}