<?php
/**
 * Created by PhpStorm.
 * User: Chamath Abeysinghe
 * Date: 4/15/2016
 * Time: 7:24 PM
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends  Controller
{
    public function getDashboard(){
        return view('dashboard');
    }
    public function postNewUser(Request $request){

//        $v = Validator::make($request->all(), [
//            'full_name' => 'required',
//            'email' => 'required',
//        ]);
//
//        if ($v->fails())
//        {
////            echo 'Validator fails';
////            foreach($v->errors()->all() as $error){
////                echo 'new    ';
////                echo $error;
////             }
//
////            foreach($v->messages()->all() as $error){
////                echo 'new eroor:::   ';
////                echo $error;
////                echo '<br>';
////            }
//            return redirect()->route('dashboard')->withErrors($v->errors());
//        }
        $this->validate($request,[
            'full_name'=>'required',
            'email'=>'required|email|unique:users',
            'user_type'=>'required',
            'password'=>'required|min:4'
        ]);
        $user =new User();
        $user->full_name=$request['full_name'];
        $user->email=$request['email'];
        $user->user_type=$request['user_type'];
        $user->password=bcrypt($request['password']);
        $user->save();
        return redirect()->route('dashboard');
    }

    public function postUserLogin(Request $request){
        $pass=Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]);
        echo $request['email'];
        echo $request['password'];

        if($pass){
            return redirect()->route('project');
        }
        else{
            return redirect()->back()->with(['message'=>'User name or password is incorrect']);
        }
    }
}