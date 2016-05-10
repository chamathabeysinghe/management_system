<?php
namespace App\Http\Controllers;

use App\Dealer;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function registerDealer(Request $request)
    {
        $register_no = $request['register_no'];
        $date = $request['date'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $telephone_no = $request['telephone_no'];
        $email = $request['email'];
        $address = $request['address'];
        $condition =$request['conditions'];//$request['conditons'];

        $dealer = new Dealer();

        $dealer->RegNumber = $register_no;
        $dealer->date = $date;
        $dealer->first_name = $first_name;
        $dealer->last_name = $last_name;
        $dealer->telephone_no = $telephone_no;
        $dealer->email = $email;
        $dealer->address = $address;
        $dealer->conditions = $condition;

        $dealer->save();

        return redirect()->back();

    }

    public function getStockView(Request $request){
        $dealers=Dealer::all();
        return view('/dealer_management/new_stock',['dealers'=>$dealers]);

    }
}
