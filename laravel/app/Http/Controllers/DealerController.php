<?php
namespace App\Http\Controllers;

use App\Dealer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealerController extends Controller
{
    public function registerDealer(Request $request)
    {

        $this -> validate($request, [
            'register_no' => 'required|unique:dealers',
            'last_name' => 'required|max:120',
            'telephone_no' => 'required'

        ]);

        $register_no = $request['register_no'];
        $date = $request['date'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $telephone_no = $request['telephone_no'];
        $email = $request['email'];
        $address = $request['address'];
        $condition =$request['conditions'];

        $dealer = new Dealer();

        $dealer->register_no = $register_no;
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
