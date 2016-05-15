@extends('layouts.master_default')
@section('title')
    Welcome
@endsection()
@section('content')

    @include('includes.message-block')

    <div class="row ">
        <div class="col s12">
            <h3>Log In</h3>
            <form action="{{route('login')}}" method="post">
                <div class="row">
                    <div class="form-group {{$errors->has('email')?'has-error':''}} col s12 l6">
                        <label for="email">E-Mail</label>
                        <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group {{$errors->has('password')?'has-error':''}} col s12 l6">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary col-md-offset-">Submit</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">


            </form>
        </div>
    </div>
@endsection