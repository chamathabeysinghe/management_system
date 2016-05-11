@extends('layouts.master')

@section('title')
    Add Selling Items
@endsection

@section('content')
    <div class="collection hoverable">
        <a href="#!" class="collection-item active">Add Selling Items</a>
    </div>

    <div class="row">
        <form class="col s12" action="{{Route('addsellingitem')}}" method="post">
            <div class="row">
                <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">work</i>
                    <input id="item_code" name="item_code" type="text" class="validate">
                    <label class="active" for="item_code">Item Code</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">today</i>
                    <input id="item_name" name="item_name" type="text" class="validate">
                    <label class="active" for="item_name">Item Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">work</i>
                    <input id="item_description" name="item_description" type="text" class="validate">
                    <label class="active" for="item_description">Item Description</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 offset-s2">
                    <i class="material-icons prefix">today</i>
                    <input id="unit_price" name="unit_price" type="number" class="validate">
                    <label class="active" for="unit_price">Unit Price</label>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <button type="submit" class="btn waves-effect waves-light" type="submit" name="action">Add Item
                <i class="material-icons right">done</i>
            </button>
        </form>
    </div>

@endsection