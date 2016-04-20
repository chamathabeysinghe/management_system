<?php
/**
 * Created by PhpStorm.
 * User: Chamath Abeysinghe
 * Date: 4/20/2016
 * Time: 3:13 PM
 */

namespace App\Http\Controllers;


use App\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function postInitiateProject(Request $request){
        $project=new Project();
        $project->client_name=$request['client'];
        $project->date=$request['date'];
        $project->client_email=$request['email'];
        $project->description=$request['description'];
        $project->save();
        return redirect()->route('project');
    }

    public function getDashboard(){
        $projects=Project::orderBy('created_at','desc')->get();
        return view('project_management\project_dashboard',['projects'=>$projects]);
    }
    public function getProjectInitiatePage($project_id){

        //validate the project
        $project=Project::where('id',$project_id)->first();
        return view('/project_management/project_init',['project'=>$project]);

    }
}