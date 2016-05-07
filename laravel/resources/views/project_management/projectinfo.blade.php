@extends('layouts.master')
@section('title')
    Project Information
@endsection
@section('content')

    <div class="row">
        {{--<form class="col s12" action="{{Route('initiateproject')}}" method="post">--}}
        <div class="section">
            <h5>Project Details</h5>
            <div class="divider" style="margin-bottom: 10px"></div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="date" name="date" type="date" class="validate" value="{{$project->date}}" readonly>
                    <label class="active" for="date">Project date</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="client" name="client" type="text" class="validate" value="{{$project->client_name}}"
                           readonly>
                    <label class="active" for="client">Client Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate" value="{{$project->client_email}}"
                           readonly>
                    <label class="active" for="email">Client Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea" readonly>{{$project->description}}</textarea>
                    <label class="active" for="description">Project Description</label>
                </div>
            </div>
        </div>


        <div class="section">
            <h5>Allocated Technicians</h5>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m6">
                    <ul class="collection">
                        @foreach($technicians as $technician)
                            <li class="collection-item avatar">
                                {{--<img src="images/yuna.jpg" alt="" class="circle">--}}
                                <span class="title">{{$technician->name}}</span>
                                <p>First Line <br>
                                    Second Line
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

        <div class="section">
            <h5>Allocated Items</h5>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m6">
                    <ul class="collection">

                        @foreach($itemList as $item)
                            <li class="collection-item avatar">
                                {{--<img src="images/yuna.jpg" alt="" class="circle">--}}
                                <span class="title">{{$item->item_name}}</span>
                                <p>First Line <br>
                                    Second Line
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="section">
            <h5>Gross Profit</h5>
            <div class="divider"></div>
            <div class="row">

                <a href="{{route('gpforecast',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">View GP</a>

                {{--<div class="col s12 m6">--}}
                    {{--<ul class="collection">--}}


                        {{--<li class="collection-item avatar">--}}
                            {{--<img src="images/yuna.jpg" alt="" class="circle">--}}
                            {{--<span class="title">Title</span>--}}
                            {{--<p>First Line <br>--}}
                                {{--Second Line--}}
                            {{--</p>--}}
                            {{--<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            </div>
        </div>
        <div class="section">
            <h5>Bills</h5>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m6">
                    <ul class="collection">
                        @foreach($billList as $bill)
                            <li class="collection-item avatar">
                                {{--<img src="images/yuna.jpg" alt="" class="circle">--}}
                                <span class="title">{{$bill->description}} </span> Value
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <a href="{{route('bill',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">Add Bill</a>
                </div>
            </div>
        </div>

        <div class="section">
            <h5>Feedback</h5>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m6">
                    <a href="{{route('feedback',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">Add Feedback</a>
                </div>
            </div>
        </div>


    </div>
    {{--<button class="btn waves-effect waves-light" type="submit" >Initiate Project--}}
    {{--<i class="material-icons right">send</i>--}}
    {{--</button>--}}
    {{--<input type="hidden" name="_token" value="{{Session::token()}}">--}}

    {{--</form>--}}


@endsection