@extends('layouts.master')
@section('title')
    Add new return item
@endsection
@section('content')
    @include('includes.message-block')
    <div class="jumbotron">
        <div class="container">
            <h1 class="text-center blue-text text-darken-2">Return Item </h1>
            <text>Search Item :</text>
            <input type="text"  id="search-input" placeholder="Search" class="input-lg">
            <a class="waves-effect waves-light btn" onclick="getItem()"><i class="material-icons left">search</i>Search</a>
        </div>
    </div>
    <div class="container">

        <form action="{{route('newcustomer')}}" method="post">
            <div id="search_results">
            </div>
            <fieldset class="form-group " >
                <div class="row">
                    <p class="col-lg-6">
                        <input class="with gap" type="radio" id="warrantyselect" name="options"   >
                        <label for="warrantyselect">Warranty </label>
                    </p>
                    <p>
                        <input class="with gap" type="radio" id="repair" name="options"   >
                        <label for="repair">repair </label>
                    </p>

                </div>


            </fieldset>
            <h4>Customer details :</h4>
            <fieldset class="form-group {{$errors->has('customer')?'has-error':''}}">
                <label for="customer">Customer name :</label>
                <input class="form-control" id="customer" name="customer" type="text" value="{{Request::old('customer')}}" >
            </fieldset>
            <fieldset class="form-group {{$errors->has('contact')?'has-error':''}}">
                <label for="contact">Contact No :</label>
                <input class="form-control" id="contact" name="contact" type="number" value="{{Request::old('contact')}}">
            </fieldset>
            <fieldset class="form-group {{$errors->has('address')?'has-error':''}}">
                <label for="address">Address :</label>
                <input class="form-control" id="address" name="address" type="text" value="{{Request::old('address')}}">
            </fieldset>
            <fieldset class="form-group {{$errors->has('email')?'has-error':''}}">
                <label for="email">Email :</label>
                <input class="form-control" id="email" name="email" type="email" value="{{Request::old('email')}}">
            </fieldset>
            <fieldset class="form-group {{$errors->has('remarks')?'has-error':''}}">
                <label for="remarks">Remarks :</label>
                <input class="form-control" id="remarks" name="remarks" type="text" value="{{Request::old('remarks')}}">
            </fieldset>
            <div class="btn-group-lg row">
                <div class="col pull-right">

                    <button type="submit" class="btn"><i class="material-icons right">save</i>Save</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}" />
                    {{--<a class="waves-effect waves-light btn"><i class="material-icons right">cancel</i>Cancel</a>--}}
                </div>
            </div>
        </form>
    </div>
    <script>
        var token='{{Session::token()}}';
        var url='{{route('item_search')}}';
    </script>

    </div>

@endsection