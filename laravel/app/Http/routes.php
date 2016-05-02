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
        return view('login');
    })->name('home');

    //get new user view
    Route::get('/newuser', function () {
        return view('newuser');
    });

    //create a new user
    Route::post('/newuser',[
        'uses'=>'UserController@postNewUser',
        'as'=>'newuser',
    ]);



    //get the project initiate view
    Route::get('/projectinit', function () {
        return view('/project_management/project_init');
    });

    //log a user in
    Route::post('/login',[
        'uses'=>'UserController@postUserLogin',
        'as'=>'login'
    ]);


    //save a feedback
    Route::post('/savefeedback',[
        'uses'=>'FeedbackController@postSaveFeedback',
        'as'=>'savefeedback'
    ]);

    //get the feedback view
    Route::get('feedback', function () {
        return view('feedback');
    });


    //initiate the project
    Route::post('/initiateproject',[
       'uses'=>'ProjectController@postInitiateProject',
        'as'=>'initiateproject',

    ]);

    //get the project dashboard
    Route::get('/project',[
        'uses'=>'ProjectController@getDashboard',
        'as'=>'project',
        'middleware'=>'auth'
    ]);

    //get project initiate window
    Route::get('/initiate-post/{project_id}',[
        'uses'=>'ProjectController@getProjectInitiatePage',
        'as'=>'project.initiate',
        'middleware'=>'auth'
    ]);


    //get project information form
    Route::get('/projectinfo/{project_id}',[
        'uses'=>'ProjectController@getProjectInfo',
        'as'=>'project.info',
        'middleware'=>'auth'
    ]);
    //search projects
    Route::post('/search',[
        'uses'=>'ProjectController@postProjectSearch',
        'as'=>'project_search'
    ]);
    //get new technician page
    Route::get('/newtechnician',function(){
        return view('newtechnician');
    });

    //add a new technician
    Route::post('/newtechnician',[
        'uses'=>'TechnicianController@postAddTechnician',
        'as'=>'addtechnician'
    ]);

    //get table of gross profit forecast for example only
    Route::get('/gp_forecast',function(){
        return view("project_management/gp_forecast");
    });

    Route::get('/creategp',[
        'uses'=>'GPForecastController@postCreateGPForecast',
        'as'=>'creategp'
    ]);
    //direct to Projects gross profit forecast
    Route::get('/gp',[
        'uses'=>'GPForecastController@getGPForecast',
        'as'=>'gpforecast'
    ]);

    Route::get('/return/newitem', function () {
        return view('return_management/NewReturnItem');
    });

});