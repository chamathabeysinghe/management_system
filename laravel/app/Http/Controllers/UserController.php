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
    /**
     * get new user interface
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getNewUserView(){
        $user_type=Auth::user()->user_type;
        if($user_type==1){
            return view('newuser');
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * post a new user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * log a user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * log out a user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');
    }
}