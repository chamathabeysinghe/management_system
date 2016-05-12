@extends('layouts.master')

@section('title')
    Registration
@endsection

@section('content')

    <h3>Dealer Registration</h3>
    @if(count($errors)>0)
        <div class="raw">
            <div class="col-mid-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
        <div class="row">
            <form class="col s12" action="{{Route('registerdealer')}}" method="post">
                <div class="row">
                    <div class="input-field col s5">
                        <i class="material-icons prefix">mode_edit</i>
                        <input id="register_no" name="register_no" type="text" class="validate" value="{{Request::old('register_no')}}">
                        <label class="active" for="register_no">Register Number</label>
                    </div>
                    <div class="input-field col s2 offset-s4">
                        <input id="date" name='date' type="date" class="validate" value="{{Request::old('date')}}">
                        <label class="active" for="date">Date</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="first_name" name="first_name" type="text" class="validate" value="{{Request::old('first_name')}}">
                        <label class="active" for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" name="last_name" class="validate" value="{{Request::old('last_name')}}">
                        <label class="active" for="last_name">Last Name</label>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s3">
                        <i class="material-icons prefix">phone</i>
                        <input id="telephone_no" name="telephone_no" type="tel" class="validate" value="{{Request::old('telephone_no')}}">
                        <label class="active" for="telephone_no">Telephone</label>
                    </div>
                    <div class="input-field col s5 offset-s3">
                        <i class="material-icons prefix">mode_edit</i>
                        <input id="email" name="email" type="email" class="validate" value="{{Request::old('email')}}">
                        <label class="active"   for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <input id="address" type="text" name="address" class="materialize-textarea" value="{{Request::old('address')}}">
                        <label class="active" for="address">Address</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="conditions" name="conditions" class="materialize-textarea"></textarea>
                        <label class="active" for="conditions">Conditions</label>
                    </div>
                </div>


                <div class="input-field col s2 offset-s10" >
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                    <button type="submit" class="btn btn-primary" >Register</button>

                </div>

            </form>
        </div>


@endsection