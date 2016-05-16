<?php


/**
 * Created by PhpStorm.
 * User: Chamath Abeysinghe
 * Date: 5/8/2016
 * Time: 9:44 PM
 */


namespace App\Http\Controllers;

use App\DeallocatedItem;
use App\Item;
use Illuminate\Http\Request;


use App\Http\Requests;
use Illuminate\Support\Facades\View;

class DeallocatedItemController extends Controller
{
    public function getDealloctedView(){
        $items=DeallocatedItem::all();
        return view('/project_management/deallocated_items',['items'=>$items]);

    }

    public function postSendToStore(){
        $items=DeallocatedItem::all();
        foreach($items as $item){
            $item->return_state=2;
            $item->update();
        }
        return redirect()->back();
    }


}