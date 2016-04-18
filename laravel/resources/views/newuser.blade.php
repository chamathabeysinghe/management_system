
{{--This view is to add new users to system--}}

@extends('layouts.master')
@section('title')
    New User
@endsection
@section('content')

    @include('includes.message-block')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Sign Up</h3>
            <form action="{{route('newuser')}}" method="post">
                <div class="form-group {{$errors->has('full_name')?'has-error':''}}">
                    <label for="full_name">Full Name</label>
                    <input class="form-control " type="text" name="full_name" id="full_name" value="{{Request::old('full_name')}}">
                </div>
                <div class="form-group {{$errors->has('email')?'has-error':''}}">
                    <label for="email">E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
                </div>



                <div class="form-group {{$errors->has('user_type')?'has-error':''}}">
                    <label for="user_type">User type</label>
                    <input class="form-control" type="number" name="user_type" id="user_type" value="{{Request::old('user_type')}}">


                </div>


                <div class="form-group {{$errors->has('password')?'has-error':''}}">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary col-md-offset-">Submit</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </div>
@endsection