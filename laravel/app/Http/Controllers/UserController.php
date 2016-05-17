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

        $remember=false;
        if($request['selection']){
        foreach($request['selection'] as $rem){
            $remember= $rem;
        }}
        echo $request['email'];
        $pass=Auth::attempt(['email'=>$request['email'],'password'=>$request['password']],$remember);
        if($pass){
           return redirect()->route('project');
        }
        else{
            return redirect()->back()->with(['message'=>'User name or password is incorrect']);
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');
    }
}