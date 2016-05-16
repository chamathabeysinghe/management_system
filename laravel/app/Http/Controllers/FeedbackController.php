<?php
/**
 * Created by PhpStorm.
 * User: Chamath Abeysinghe
 * Date: 4/17/2016
 * Time: 5:12 PM
 */

namespace App\Http\Controllers;


use App\Feedback;
use App\Project;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;

class FeedbackController extends Controller
{
    public function postSaveFeedback(Request $request){
        $project_id= $request['project_id'];
        $comments=$request['comments'];
        $installation=$request['group1'];
        $timeliness=$request['group2'];
        $quality=$request['group3'];
        $personnel=$request['group4'];
        $overall_service=$request['group5'];
        $service_needs=$request['group7'];
        $price=$request['group8'];
        $recommendation=$request['group9'];
        $feedback=new Feedback();
        $feedback->comments=$comments;
        $feedback->installation=($installation!=null?$installation:0);
        $feedback->timeliness=$timeliness!=null?$timeliness:0;
        $feedback->quality=$quality!=null?$quality:0;
        $feedback->personnel=$personnel!=null?$personnel:0;
        $feedback->overall_service=$overall_service!=null?$overall_service:0;
        $feedback->service_needs=$service_needs!=null?$service_needs:0;
        $feedback->price=$price!=null?$price:0;
        $feedback->recommendation=$recommendation!=null?$recommendation:0;
        $project =Project::where('id',$project_id)->first();
        $project->feedback()->save($feedback);
        return redirect()->route('project.info',['project_id'=>$project_id]);
    }
    public function getFeedbackView(Request $request){
        return view('project_management/feedback',['project_id'=>$request['project_id']]);
    }

    public function getFeedBackReview(Request $request){
        $feedback=Project::where('id',$request['project_id'])->first()->feedback;

        return view('project_management/feedback_review',['project_id'=>$request['project_id'],'feedback'=>$feedback]);
    }
}