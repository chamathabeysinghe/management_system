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
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class TechnicianController extends Controller
{
    public function postAddTechnician(Request $request){
        $technician=new Technician();
        $technician->name=$request['name'];
        $technician->save();
        return redirect()->back();
    }

    public function postTechnicianView(Request $request){
        $technicians=Technician::get();

        return view('project_management/technician_profiles',['technicians'=>$technicians]);
    }

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
//                    echo $result;
//                    echo '<br>';
                    if(!Str::equals($result,'')){
                        $allocationDetails.=$result.' , ';
                    }
                }
            }

            array_push($resultDetails,$allocationDetails);
        }
        return View::make('/project_management/technician_search')->with('data',[$technicians,$resultDetails]);
    }

    function check_availability($date,$duration,$project_title,$project_date,$project_duration){
        $user_start_date=strtotime($date);
        $user_end_date=strtotime(date("m/d/Y", strtotime($date)) . " +".$duration." day");
        $project_start_date=strtotime($project_date);
        $project_end_date=strtotime(date("m/d/Y", strtotime($project_date)) . " +".$project_duration." day");
        $outStr='';
//        print_r(getdate($user_start_date));
//        echo '<br>';
//        print_r(getdate($user_end_date));
//        echo '<br>';
//        print_r(getdate($project_start_date));
//        echo '<br>';
//        print_r(getdate($project_end_date));
//        echo '<br>';
        if($this->check_in_range($project_start_date, $project_end_date, $user_end_date) ){
            $outStr.='project('.$project_title.') from '.$project_date.' to';
        }
        elseif($this->check_in_range($project_start_date, $project_end_date, $user_start_date)){
            $outStr.='project('.$project_title.') from '.$project_date.' to';
        }
        return $outStr;


    }
    function check_in_range($start_date, $end_date, $date_from_user)
    {
        // Convert to timestamp
        $start_ts = ($start_date);
        $end_ts = ($end_date);
        $user_ts = ($date_from_user);

        // Check that user date is between start & end
        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }



}