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

class FeedbackController extends Controller
{
    public function postSaveFeedback(Request $request){
        $comments=$request['comments'];
        echo $comments;
        $feedback=new Feedback();
        $feedback->comments=$comments;

        $project =new Project();
        $project->client_name='TESTERSSSS';
        $project->save();
        $project->feedback()->save($feedback);
    }

}