<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::group(['middleware'=>['web']],function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/newuser', function () {
        return view('newuser');
    });
    Route::get('/project', function () {
        return view('/project_management/project_dashboard');
    });
    Route::get('feedback', function () {
        return view('feedback');
    });

    Route::post('/newuser',[
        'uses'=>'UserController@postNewUser',
        'as'=>'newuser'
    ]);

    Route::get('/dashboard',[
        'uses'=>'UserController@getDashboard',
        'as'=>'dashboard'
    ]);

    Route::post('/savefeedback',[
        'uses'=>'FeedbackController@postSaveFeedback',
        'as'=>'savefeedback'
    ]);
});