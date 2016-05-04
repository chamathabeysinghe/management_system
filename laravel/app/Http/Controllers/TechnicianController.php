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
use Illuminate\Http\Request;
use League\Flysystem\Config;

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

}