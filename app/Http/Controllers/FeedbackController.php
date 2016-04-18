<?php
/**
 * Created by PhpStorm.
 * User: Chamath Abeysinghe
 * Date: 4/17/2016
 * Time: 5:12 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function postSaveFeedback(Request $request){
        $contact=$request['contact'];
        echo $contact;
    }

}