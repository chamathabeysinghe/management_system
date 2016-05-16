
{{--@extends('layouts.master')--}}
{{--@section('title')--}}
    {{--New Technician--}}
{{--@endsection--}}
{{--@section('content')--}}

    {{--@include('includes.message-block')--}}

    {{--<div class="row">--}}
        {{--<div class="col-md-6 col-md-offset-3">--}}
            {{--<h3>Add new technician</h3>--}}
            {{--<form action="{{route('addtechnician')}}" method="post">--}}
                {{--<div class="form-group {{$errors->has('full_name')?'has-error':''}}">--}}
                    {{--<label for="full_name">Full Name</label>--}}
                    {{--<input class="form-control " type="text" name="name" id="name" value="{{Request::old('name')}}">--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-primary col-md-offset-">Add Technician</button>--}}
                {{--<input type="hidden" name="_token" value="{{Session::token()}}">--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}