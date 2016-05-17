<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use App\Http\Requests;

class CustomerController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * add new customer to the database when returning a item
     */
    public function addNewCustomer(Request $request){


        $this->validate($request,[
            'customer'=>'required',
            'contact'=>'required',
            'email'=>'email',
            'address'=>'required',
        ]);
        $customer =new Customer();
        $customer->customerName=$request['customer'];
        $customer->contactNo=$request['contact'];
        $customer->email=$request['email'];
        $customer->address=$request['address'];
        $customer->save();
        return view('return_management\newreturnitem');
    }

}
