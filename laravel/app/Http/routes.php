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
    Route::get('feedback', [
        'uses'=>'FeedbackController@getFeedbackView',
        'as'=>'feedback'
    ]);


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


    Route::get('/return/newitem', function () {
        return view('return_management/NewReturnItem');
    });
    Route::get('/return/manageitem', function () {
        return view('return_management/managereturnitem');
    });
    Route::get('/return/dashboard', function () {
        return view('return_management/returndashboard');
    });

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
        return view('project_management/newtechnician');
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

    //create the gross profir forecast
    Route::get('/creategp',[
        'uses'=>'GPForecastController@postCreateGPForecast',
        'as'=>'creategp'
    ]);
    //direct to Projects gross profit forecast
    Route::get('/gp',[
        'uses'=>'GPForecastController@getGPForecast',
        'as'=>'gpforecast'
    ]);
    //update the gross profit forecast
    Route::post('/updategp',[
        'uses'=>'GPForecastController@postUpdateGPForecast',
        'as'=>'updategp'
    ]);
    
    Route::get('/return/newitem', function () {
        return view('return_management/NewReturnItem');
    });


    //direct to dealer registration
    Route::get('/dealer/register',function(){
        return view("dealer_management/registration");
    })->name('register_dealer');

    //direct to stocks that dealer bought
    Route::get('/dealer/stock',[
        'uses'=>'DealerController@getStockView',
        'as'=>'new_stock'
    ]);


    //get technician profile view
    Route::get('/technicians',[
        'uses'=>'TechnicianController@postTechnicianView',
        'as'=>'technicians'
    ]);

//    Route::get('/bill',function(){
//       return view('project_management/add_bill');
//    })->name('bill');

    //get bill view
    Route::get('/bill',[
        'uses'=>'BillController@getAddBillView',
        'as'=>'bill'
    ]);

    //add new bill
    Route::post('/addBill',[
       'uses'=>'BillController@postAddBill' ,
        'as'=>'addBill'
    ]);

    //get financial report view
    Route::get('/financialreport',[
        'uses'=>'FinancialReportController@getFinancialReportView',
        'as'=>'financialreport'
    ]);

    //create new financial report
    Route::get('/createfinancialreport',[
        'uses'=>'FinancialReportController@postCreateFinancialReport',
        'as'=>'createfinancialreport'
    ]);

    //update the financial report data
    Route::post('/updatefinancialreport',[
        'uses'=>'FinancialReportController@postUpdateFinancialReport',
        'as'=>'updatefinancialreport'
    ]);

    //search for technician using date
    Route::post('/searchtechnician',[
       'uses'=>'TechnicianController@postTechnicianSearch',
        'as'=>'searchtechnician'
    ]);
    //allocate items to project at initiating
    Route::post('/allocateitems',[
       'uses'=>'ProjectController@postItemAllocation',
        'as'=>'allocateitems'
    ]);

    Route::post('/deallocateitem',[
        'uses'=>'ItemController@postDeallocateItem',
        'as'=>'deallocateitem'
    ]);
    Route::post('/changeallocateitem',[
        'uses'=>'ItemController@postChangeItem',
        'as'=>'changeallocateitem'
    ]);
    Route::post('/addsingleitem',[
        'uses'=>'ItemController@postAllocateSingleItem',
        'as'=>'addsingleitem'
    ]);
    Route::post('/removeallocation',[
       'uses'=>'ProjectController@postRemoveAllocation',
        'as'=>'removeallocation'
    ]);
    Route::post('calculatecommission',[
        'uses'=>'TechnicianController@postCalculateCommission',
        'as'=>'calculatecommission'
    ]);
    Route::post('/completeproject',[
        'uses'=>'ProjectController@postCompleteProject',
        'as'=>'completeproject'
    ]);
    Route::post('/removebill',[
       'uses'=>'BillController@postRemoveBill',
        'as'=>'removebill'
    ]);


    Route::get('/reviewfeedback',[
        'uses'=>'FeedbackController@getFeedBackReview',
        'as'=>'reviewfeedback'
    ]);

    Route::post('/registerdealer',[
       'uses'=>'DealerController@registerDealer',
        'as'=>'registerdealer'
    ]);

    //direct to Create Quotation  page
    Route::get('/newquotation',[
        'uses' => 'QuotationController@getQuotationID',
        'as' => 'newquotation'
    ]);

    Route::post('/createquotation',[
        'uses'=>'QuotationController@postCreateQuotation',
        'as'=>'createquotation'
    ]);

    //direct to Add Selling Items page
    Route::get('/newsellingitem',function(){
        return view("quotation_management/add_sellingitem");
    })->name('newsellingitem');

    Route::post('/addsellingitem',[
        'uses'=>'SellingItemController@postAddSellingItems',
        'as'=>'addsellingitem'
    ]);

    //direct to Quotation Summary page
    Route::get('/getquotationsummary',[
        'uses' => 'QuotationController@getQuotationSummary',
        'as' => 'getquotationsummary'
    ]);

    //direct to Create Estimation page
    Route::get('/newestimation',[
        'uses' => 'EstimationController@getEstimationID',
        'as' => 'newestimation'
    ]);

    Route::post('/createestimation',[
        'uses'=>'EstimationController@postCreateEstimation',
        'as'=>'createestimation'
    ]);

    Route::get('/estimationbyquotation',[
        'uses'=>'EstimationController@getEstimationByQuotation',
        'as'=>'estimationbyquotation'
    ]);

});