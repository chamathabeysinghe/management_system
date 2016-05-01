<?php
/**
 * Created by PhpStorm.
 * User: Chamath Abeysinghe
 * Date: 4/20/2016
 * Time: 3:13 PM
 */

namespace App\Http\Controllers;


use App\Project;
use App\Technician;
use App\TechnicianAllocation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    public function postInitiateProject(Request $request){

        $project=Project::where('id',$request['project_id'])->first();
        $project->client_name=$request['client'];
        $project->date=$request['date'];
        $project->client_email=$request['email'];
        $project->description=$request['description'];
        $project->update();
        if($request['selection']){
            foreach($request['selection'] as $selected){
                $allocation=new TechnicianAllocation();
                $allocation->project_id=$request['project_id'];
                $allocation->technician_id=$selected;
                $allocation->save();
            }
        }


        return redirect()->route('project');
    }

    public function getDashboard(){
        $projects=Project::orderBy('created_at','desc')->get();
        return view('project_management\project_dashboard',['projects'=>$projects]);
    }
    public function getProjectInitiatePage($project_id){
        //validate the project
        $project=Project::where('id',$project_id)->first();
        $technicians=Technician::get();
        return view('/project_management/project_init',['project'=>$project,'technicians'=>$technicians]);

    }
    public function getProjectInfo($project_id){
        $project=Project::where('id',$project_id)->first();
        $technicianAllocations=TechnicianAllocation::where('project_id',$project_id)->get();
        $technicianList=array();
        foreach($technicianAllocations as $allocation){
            array_push($technicianList,Technician::where('id',$allocation->technician_id)->first());
        }
        return view('/project_management/projectinfo',['project'=>$project,'technicians'=>$technicianList]);
    }

    public function postProjectSearch(Request $request){
        $keyword=$request['keyWords'];
        $projects=Project::all();
        $resultProjects=new Collection();
        foreach($projects as $project){

            if(Str::equals(Str::lower($project->id),Str::lower($keyword))){
               $resultProjects->add($project);
            }
        }
        foreach($projects as $project){
            if($resultProjects->contains($project)){
                continue;
            }
            if(Str::contains(Str::lower($project->client_name),Str::lower($keyword))){
                $resultProjects->add($project);
            }
//            else if(Str::contains(Str::lower($project->client_email),Str::lower($keyword))){
//                $resultProjects->add($project);
//            }
            else if(Str::contains(Str::lower($project->date),Str::lower($keyword))){
                $resultProjects->add($project);
            }
        }
        return View::make('/project_management/search_results')->with('resultProjects',$resultProjects);
    }
}