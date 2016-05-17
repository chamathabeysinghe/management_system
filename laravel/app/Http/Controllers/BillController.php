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
    /**
     * add new biill
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * get view for new bill
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAddBillView(Request $request){
        return view('project_management/add_bill',['project_id'=>$request['project_id']]);
    }

    /**
     * remove a bill
     * @param Request $request
     */
    public function postRemoveBill(Request $request){
        $bill=Bill::where('id',$request['bill_id'])->first();
        if($bill!=null){
            $bill->delete();
        }
    }

}