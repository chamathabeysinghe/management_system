<?php>
namespace App\Http\Controllers;

use App\Dealer;
use Illuminate/Http/Request;

class DealerController extends Controller
{
    public function registerDealer(Request $request)
    {
        $register_no = $request['register_no'];
        $date = $request['date'];
        $first_name = $request['fisrt_name'];
        $last_name = $request['last_name'];
        $telephone_no = $request['telephone_no'];
        $email = $request['email'];
        $address = $request['adress'];
        $condition = $request['condition'];

        $dealer = new Dealer();

        $dealer->register_no = $register_no;
        $dealer->date = $date;
        $dealer->first_name = $first_name;
        $dealer->last_name = $last_name;
        $dealer->telephone_no = $telephone_no;
        $dealer->email = $email;
        $dealer->address = $address;
        $dealer->condition = $condition;

        $dealer->save();

        return redirect()->back();



    }

}
