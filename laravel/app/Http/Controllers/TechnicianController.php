<?php
/**
 * Created by PhpStorm.
 * User: Chamath Abeysinghe
 * Date: 4/30/2016
 * Time: 8:18 PM
 */

namespace App\Http\Controllers;


use App\Feedback;
use App\Project;
use App\Technician;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class TechnicianController extends Controller
{

    /**
     * calculate the commission for technicians
     * @param Request $request
     */
    public function postCalculateCommission(Request $request){
        $project=Project::where('id',$request['project_id'])->first();
        $gross_profit=$project->gpforecast;
        if($gross_profit!=null){
            foreach($project->technicianAllocations as $allocation){
                echo $allocation->technician_id;
                $allocation->commission=$gross_profit->profit*.1;
                $allocation->update();
            }
        }
    }

    /**
     * add a new technician
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddTechnician(Request $request){
        $technician=new Technician();
        $technician->name=$request['name'];
        $technician->save();
        return redirect()->back();
    }

    /**
     * get technician view
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|View
     */
    public function postTechnicianView(Request $request){
        $user_type=Auth::user()->user_type;
        if($user_type==1 or $user_type==2 or $user_type==3){
            $technicians=Technician::get();

            return view('project_management/technician_profiles',['technicians'=>$technicians]);
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * post technician search
     * @param Request $request
     * @return mixed
     */
    public function postTechnicianSearch(Request $request){
        $date=$request['date'];
        $duration=$request['duration'];
        $technicians=Technician::all();
        $resultDetails=array();

        foreach($technicians as $technician){
            $allocationDetails='';
            foreach($technician->technicianallocations as $allocation){
                if($allocation->project!=null  and $allocation->project->project_status==1){
                    $result=$this->check_availability($date,$duration,$allocation->project->id,$allocation->project->date,$allocation->project->duration);
                    if(!Str::equals($result,'')){
                        $allocationDetails.=$result.' , ';
                    }
                }
            }
            array_push($resultDetails,$allocationDetails);
        }
        return View::make('/project_management/technician_search')->with('data',[$technicians,$resultDetails]);
    }

    /**
     * check the availability of technicians
     * @param $date
     * @param $duration
     * @param $project_title
     * @param $project_date
     * @param $project_duration
     * @return string
     */
    function check_availability($date,$duration,$project_title,$project_date,$project_duration){
        $user_start_date=strtotime($date);
        $user_end_date=strtotime(date("m/d/Y", strtotime($date)) . " +".$duration." day");
        $project_start_date=strtotime($project_date);
        $project_end_date=strtotime(date("m/d/Y", strtotime($project_date)) . " +".$project_duration." day");
        $outStr='';
        if($this->check_in_range($project_start_date, $project_end_date, $user_end_date) ){
            $outStr.='project('.$project_title.') from '.$project_date.' to';
        }
        elseif($this->check_in_range($project_start_date, $project_end_date, $user_start_date)){
            $outStr.='project('.$project_title.') from '.$project_date.' to';
        }
        return $outStr;
    }

    /**
     * check if a date is in a range
     * @param $start_date
     * @param $end_date
     * @param $date_from_user
     * @return bool
     */
    function check_in_range($start_date, $end_date, $date_from_user)
    {
        $start_ts = ($start_date);
        $end_ts = ($end_date);
        $user_ts = ($date_from_user);
        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }
}