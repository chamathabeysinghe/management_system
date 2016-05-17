<?php
namespace App\Http\Controllers;

use App\Dealer;
use App\SellingItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class DealerController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * Function for registering dealers
     */
    public function registerDealer(Request $request)
    {
        //checking if the user filled required fields
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

    /**
     * @param Request $request
     * @return View
     * Function for get the stock view
     */

    public function getStockView(Request $request){
        $dealers=Dealer::all();
        $sellingitems = SellingItem::all();

        return view('/dealer_management/new_stock',['dealers'=>$dealers,'sellingitems'=> $sellingitems]);
    }

    /**
     * @param Request $request
     * @return mixed
     * Function for get the search results of dealers
     */
    public function getSearchResults(Request $request){

        $register_no=$request['keyWords'];

        $dealer=Dealer::where('register_no',$register_no)->first();

        $stocks=$dealer->stock;


        return View::make('/dealer_management/dealer_search_results')->with('stocks',$stocks)->with('dealer',$dealer);
    }
}
