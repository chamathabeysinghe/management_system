@extends('layouts.master')

@section('title')
    Reset Password
@endsection

@section('content')

    <div class="collection hoverable">
        <a href="#!" class="collection-item active">Reset Password</a>
    </div>


    <div class="row">
        <form action="{{route('resetpassword')}}" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input id="email" name="email" type="email" class="validate" value="{{Request::old('email')}}">
                    <label class="active"   for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_editr</i>
                    <input id="old_password" type="password" class="validate">
                    <label for="password">Old Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_editr</i>
                    <input id="new_password" type="password" class="validate">
                    <label for="new_password">New Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">verified_user</i>
                    <input id="re_password" type="password" class="validate">
                    <label for="re_password">Re-Enter Password</label>
                </div>
            </div>

            <button class="btn waves-effect waves-light" type="submit" name="action">Confirm
                <i class="material-icons right">send</i>
            </button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>


@endsection