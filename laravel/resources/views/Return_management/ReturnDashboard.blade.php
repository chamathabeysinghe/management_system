@extends('layouts.master')
@section('title')
    Return Dashboard
@endsection
@section('content')
    <div class="jumbotron glyphicon-scissors">
        <div class="container">
            <h1 class="text-success">Add new returned Item </h1>
            <p>New returned item can be added to the system for repair or warranty claim.</p>
            <p><a class="btn btn-primary btn-lg" href="{{ url("return/newitem") }}" role="button">Add item &raquo;</a></p>
        </div>
    </div>
    <div class="jumbotron">
        <div class="container">
            <h1 class="text-success">Manage returned Item </h1>
            <p >Search already added return items. Issue WCN. Add WRN details</p>
            <p><a class="btn btn-primary btn-lg" href="{{ url("return/manageitem") }}" role="button">Manage items &raquo;</a></p>
        </div>
    </div>
@endsection