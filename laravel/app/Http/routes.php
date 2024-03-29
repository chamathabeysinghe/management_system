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


    Route::get('/home', function () {
        return view('startpage');
    })->name('startpage');


    Route::get('/logout',[
        'uses'=>'UserController@getLogout',
        'as'=>'logout',
        'middleware'=>'auth'

    ]);
    //log a user in
    Route::post('/login',[
        'uses'=>'UserController@postUserLogin',
        'as'=>'login',
    ]);
    //get new user view
    Route::get('/newuser',[
        'uses'=>'UserController@getNewUserView',
        'as'=>'newuser',
        'middleware'=>'auth'
    ]);

    //create a new user
    Route::post('/newuser',[
        'uses'=>'UserController@postNewUser',
        'as'=>'newuser',
    ]);

   //save a feedback

    //get the project initiate view
    Route::get('/projectinit', function () {
        return view('/project_management/project_init');
    });
    //reset password view
    Route::get('/resetpassword', function () {
        return view('reset_password');
    });


    //save a feedback
    Route::post('/savefeedback',[
        'uses'=>'FeedbackController@postSaveFeedback',
        'as'=>'savefeedback',
    ]);

    //get the feedback view
    Route::get('feedback', [
        'uses'=>'FeedbackController@getFeedbackView',
        'as'=>'feedback',
        'middleware'=>'auth'
    ]);

    //get project initiate window
    Route::get('/initiate-post/{project_id}',[
        'uses'=>'ProjectController@getProjectInitiatePage',
        'as'=>'project.initiate',
        'middleware'=>'auth'
    ]);
    //initiate the project
    Route::post('/initiateproject',[
       'uses'=>'ProjectController@postInitiateProject',
        'as'=>'initiateproject',
        'middleware'=>'auth'
    ]);

    //get the project dashboard
    Route::get('/project',[
        'uses'=>'ProjectController@getDashboard',
        'as'=>'project',
        'middleware'=>'auth'
    ]);

    // edit user detail view
    Route::get('/edituser',[
        'uses'=>'UserController@getEditDealer',
        'as'=>'edituser',
        'middleware'=>'auth'
    ]);
    Route::post('/edituser',[
        'uses'=>'UserController@saveEditDealer',
        'as'=>'edituser',
        'middleware'=>'auth'
    ]);





    //get project initiate window
    Route::get('/initiate-post/{project_id}',[
        'uses'=>'ProjectController@getProjectInitiatePage',
        'as'=>'project.initiate',
        'middleware'=>'auth'
    ]);



//    Route::get('/return/newitem', function () {
//        return view('return_management/NewReturnItem');
//    })->name('newreturnitem');

//    Route::get('/return/manageitem', function () {
//        return view('return_management/ManageReturnItem');
//    })->name('managereturnitem');



//    Route::get('/return/dashboard', function () {
//        return view('return_management/ReturnDashboard');
//    })->name('returndashboard');





    //get project information form
    Route::get('/projectinfo/{project_id}',[
        'uses'=>'ProjectController@getProjectInfo',
        'as'=>'project.info',
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

    //get technician profile view
    Route::get('/technicians',[
        'uses'=>'TechnicianController@postTechnicianView',
        'as'=>'technicians',
        'middleware'=>'auth'
    ]);


    //get table of gross profit forecast for example only
    Route::get('/gp_forecast',[
        'uses'=>'GPForecastController@getGPView',
        'as'=>'gp_forecast',
        'middleware'=>'auth'
    ]);

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


    // submitnew customer
    Route::post('/newcustomer',[
        'uses'=>'CustomerController@addNewCustomer',
        'as'=>'newcustomer',

    ]);
    Route::post('/newreturn',[
        'uses'=>'ReturnController@addNewReturn',
        'as'=>'newreturn',
    ]);






    //update the gross profit forecast

    Route::post('/updategp',[
        'uses'=>'GPForecastController@postUpdateGPForecast',
        'as'=>'updategp'
    ]);



    //direct to Create Project page
    Route::get('/newquotation',function(){
        return view("quotation_management/create_quotation");
    });

    ////////////////////////////////////////////DEALER MANAGEMENT//////////////////////////////////////////////////



    //direct to dealer registration
    Route::get('/dealer/register',function(){
        return view("dealer_management/registration");
    })->name('register_dealer');

    //direct to stocks that dealer bought
    Route::get('/dealer/stock',[
        'uses'=>'DealerController@getStockView',
        'as'=>'new_stock'
    ]);
    //direct to search dealers view
    Route::get('/dealer/view',function(){
        return view("dealer_management/dealers_view");
    })->name('view_dealer');

    //save stock


    Route::post('/savestock',[
        'uses'=>'DealerStockController@saveStock',
        'as'=>'savestock'
    ]);
    //register dealers
    Route::post('/registerdealer',[
        'uses'=>'DealerController@registerDealer',
        'as'=>'registerdealer'
    ]);
    //search dealers
    Route::post('/dealersearch',[
        'uses'=>'DealerController@getSearchResults',
        'as'=>'dealersearch'
    ]);

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //get technician profile view
    Route::get('/technicians',[
        'uses'=>'TechnicianController@postTechnicianView',
        'as'=>'technicians'
    ]);




    //add new bill
    Route::post('/addBill',[
        'uses'=>'BillController@postAddBill' ,
        'as'=>'addBill'
    ]);

    //get financial report view
    Route::get('/financialreport',[
        'uses'=>'FinancialReportController@getFinancialReportView',
        'as'=>'financialreport',
        'middleware'=>'auth'
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

    //remove item form a project
    Route::post('/deallocateitem',[
        'uses'=>'ItemController@postDeallocateItem',
        'as'=>'deallocateitem'
    ]);

    //change the record of added item
    Route::post('/changeallocateitem',[
        'uses'=>'ItemController@postChangeItem',
        'as'=>'changeallocateitem'
    ]);

    //add a single item to allocated items
    Route::post('/addsingleitem',[
        'uses'=>'ItemController@postAllocateSingleItem',
        'as'=>'addsingleitem'
    ]);

    //remove technician allocation
    Route::post('/removeallocation',[
        'uses'=>'ProjectController@postRemoveAllocation',
        'as'=>'removeallocation'
    ]);

    //calculate technician commission
    Route::post('calculatecommission',[
        'uses'=>'TechnicianController@postCalculateCommission',
        'as'=>'calculatecommission'
    ]);

    //mark a project as complete
    Route::get('/completeproject',[
        'uses'=>'ProjectController@postCompleteProject',
        'as'=>'completeproject'
    ]);

    //remove a bill from a project
    Route::post('/removebill',[
        'uses'=>'BillController@postRemoveBill',
        'as'=>'removebill'
    ]);

    //review a feedback for project
    Route::get('/reviewfeedback',[
        'uses'=>'FeedbackController@getFeedBackReview',
        'as'=>'reviewfeedback'
    ]);

    //search for projects
//    Route::post('/search',[
//        'uses'=>'ProjectController@postProjectSearch',
//        'as'=>'projectfinder'
//    ]);

    //search for projects
//    Route::post('/search',[
//        'uses'=>'ProjectController@postProjectSearch',
//        'as'=>'findproject'
//    ]);

    Route::post('/searchprojects',[
       'uses'=>'ProjectController@postProjectSearch',
        'as'=>'runsearch'
    ]);


    //get deallocated item view
    Route::get('/deallocateditems',[
        'uses'=>'DeallocatedItemController@getDealloctedView',
        'as'=>'deallocateditems'
    ]);
    //send deallocated items back to store
    Route::post('/sendtostore',[
        'uses'=>'DeallocatedItemController@postSendToStore',
        'as'=>'sendtostore'
    ]);

    //create a project by estimation
    Route::get('/projectbyestimation',[
        'uses'=>'ProjectController@createProjectFromEstimation',
        'as'=>'projectbyestimation'
    ]);




    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////












    Route::get('/return/newitem', function () {
        return view('return_management/NewReturnItem');
    })->name('newreturnitem');

    Route::get('/return/manageitem', function () {
        return view('return_management/ManageReturnItem');
    })->name('managereturnitem');

    Route::get('/return/manageaReturnItem/{id}',[
            'uses'=>'ReturnController@getAReturnInfo',
            'as'=>'manageareturnitem']

   );


    Route::get('/return/dashboard', function () {
        return view('return_management/ReturnDashboard');
    })->name('returndashboard');




    // submitnew customer
    Route::post('/newcustomer',[
        'uses'=>'CustomerController@addNewCustomer',
        'as'=>'newcustomer',
    ]);
    Route::post('/newreturn',[
        'uses'=>'ReturnController@addNewReturn',
        'as'=>'newreturn',
    ]);
    Route::post('/newreturn',[
        'uses'=>'ReturnController@addNewReturn',
        'as'=>'newreturn1',
    ]);

    Route::post('/searchReturn',[
        'uses'=>'ReturnController@getReturnInfo',
        'as'=>'return_search'
    ]);

    Route::post('/search',[
        'uses'=>'ItemController@getItemInfo',
        'as'=>'item_search'
    ]);

    Route::post('/itemsearch',[
        'uses'=>'ItemController@getItemInfo',
        'as'=>'search_item'
    ]);

    Route::post('/edit_return',[
        'uses'=>'ReturnController@updateReturn',
        'as'=>'editreturn'
    ]);






    //direct to dealer registration
    Route::get('/dealer/register',function(){
        return view("dealer_management/registration");
    })->name('register_dealer');

    //direct to stocks that dealer bought
    Route::get('/dealer/stock',[
        'uses'=>'DealerController@getStockView',
        'as'=>'new_stock'
    ]);


    Route::post('/registerdealer',[
       'uses'=>'DealerController@registerDealer',
        'as'=>'registerdealer'
    ]);

    //direct to Create Quotation  page
    Route::get('/newquotation',[
        'uses' => 'QuotationController@getQuotationID',
        'as' => 'newquotation',
        'middleware'=>'auth'
    ]);

    Route::post('/createquotation',[
        'uses'=>'QuotationController@postCreateQuotation',
        'as'=>'createquotation'
    ]);

    //direct to Add Selling Items page
    Route::get('/newsellingitem',[
        'uses'=>'SellingItemController@getSellingItemView',
        'as'=>'newsellingitem',
        'middleware'=>'auth'
    ]);

    Route::post('/addsellingitem',[
        'uses'=>'SellingItemController@postAddSellingItems',
        'as'=>'addsellingitem'
    ]);


    Route::post('/resetpassword',[
        'uses'=>'ResetPasswordController@resetPassword',
        'as'=>'resetpassword',
    ]);


    //direct to Quotation Summary page
    Route::get('/getquotationsummary',[
        'uses' => 'QuotationController@getQuotationSummary',
        'as' => 'getquotationsummary',
        'middleware'=>'auth'
    ]);

    //direct to Quotation Summary page
    Route::get('/getestimationsummary',[
        'uses' => 'EstimationController@getEstimationSummary',
        'as' => 'getestimationsummary',
        'middleware'=>'auth'
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
        'as'=>'estimationbyquotation',
        'middleware'=>'auth'
    ]);






    /**
     * get the view to return a item
     */
    Route::get('/return/newitem',[
        'uses'=>'ReturnController@newReturnItem',
        'as'=>'newreturnitem',
        'middleware'=>'auth'
    ]);

    /**
     * get the view to manage returned item
     */
    Route::get('/return/manageitem',[
        'uses'=>'ReturnController@manageReturnItem',
        'as'=>'managereturnitem',
        'middleware'=>'auth'
    ]);

    /**
     * get the return dashboard view
     */
    Route::get('/return/dashboard',[
        'uses'=>'ReturnController@returnDashboard',
        'as'=>'returndashboard',
        'middleware'=>'auth'
    ]);

    /**
     * get return item info from database and return it to view
     */
    Route::post('/searchReturn',[
        'uses'=>'ReturnController@getReturnInfo',
        'as'=>'return_search',
        'middleware'=>'auth'
    ]);

    /**
     * get item info with supplier and every other detail and display them
     */
    Route::post('/search',[
        'uses'=>'ItemController@getItemInfo',
        'as'=>'item_search',
        'middleware'=>'auth'
    ]);

    /**
     * get item info with supplier and every other detail and display them
     */
    Route::post('/itemsearch',[
        'uses'=>'ItemController@getItemInfo',
        'as'=>'search_item',
        'middleware'=>'auth'
    ]);

    /**
     * send and save edited return item record
     */
    Route::post('/edit_return',[
        'uses'=>'ReturnController@updateReturn',
        'as'=>'editreturn'
    ]);

    /**
     * search a return item by id
     */
    Route::get('/return/manageaReturnItem/{id}',[
            'uses'=>'ReturnController@getAReturnInfo',
            'as'=>'manageareturnitem',
            'middleware'=>'auth'
        ]

    );

    /**
     * retrieve and send data necessary for the job note
     */
    Route::get('/return/jobNote',[
            'uses'=>'ReturnController@getJobNote',
            'as'=>'jobNote',
            'middleware'=>'auth'
        ]

    );
    /**
     * retrieve and send data necessary for the WCN
     */
    Route::get('/return/wcn',[
            'uses'=>'ReturnController@getWCN',
            'as'=>'wcn',
            'middleware'=>'auth'
        ]

    );

});