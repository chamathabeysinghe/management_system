@extends('layouts.master')

@section('title')
    Registration
@endsection

@section('content')
    @include('includes.message-block')
    <h3>Dealer Registration</h3>

    <div class="row">
        <form class="col s12" action="{{Route('registerdealer')}}" method="post">
            <div class="row">
                <div class="input-field col s5">
                    <i class="material-icons prefix">mode_edit</i>
                    <input id="register_no" name="register_no" type="text" class="validate">
                    <label class="active" for="register_no">Register Number</label>
                </div>
                <div class="input-field col s2 offset-s4">
                    <input id="date" name='date' type="date" class="validate">
                    <label class="active" for="date">Date</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="first_name" name="first_name" type="text" class="validate">
                    <label class="active" for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" type="text" name="last_name" class="validate">
                    <label class="active" for="last_name">Last Name</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s3">
                    <i class="material-icons prefix">phone</i>
                    <input id="telephone_no" name="telephone_no" type="tel" class="validate">
                    <label class="active" for="telephone_no">Telephone</label>
                </div>
                <div class="input-field col s5 offset-s3">
                    <i class="material-icons prefix">mode_edit</i>
                    <input id="email" name="email" type="email" class="validate">
                    <label class="active"   for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <input id="address" type="text" name="address" class="materialize-textarea">
                    <label class="active" for="address">Address</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <input id="conditions" type="text" name="conditions" class="materialize-textarea">
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