@extends('layouts.master')
@section('title')
    Project Dashboard
@endsection
@section('content')
    @include('includes.message-block')

    <section class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-lg-8 col-lg-offset-2">
            <header style="color: #747474;"><h3>Project Dashboard</h3></header>

            {{--<div>--}}
                {{--<input type="text" id="search-input" placeholder="Search" onkeydown="down()" onkeyup="up()">--}}
            {{--</div>--}}


            <nav>
                <div class="nav-wrapper teal lighten-2">
                    <form>
                        <div class="input-field">
                            <input id="search-input" type="search" required onkeydown="down()" onkeyup="up()" style="height: 65px;">
                            <label for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>





            
            <div id="search-results">

            </div>
            <div id="all-results">
                @foreach($projects as $project)
                    {{--<div class="panel panel-primary">--}}
                        {{--<div class="panel-heading">Project Title</div>--}}
                        {{--<div class="panel-body">--}}
                            {{--<p>{{$project->description}}</p>--}}
                            {{--<div><label>Project Client       :</label>{{$project->client_name}}</div>--}}
                            {{--<div><label>Project Starting Date:</label>{{$project->date}}</div>--}}
                            {{--<div><label>Project Incharge     :</label>CHAT</div>--}}
                            {{--<div><label>Project Duration     :</label>4 Days</div>--}}
                            {{--<p>--}}
                                {{--<a href="{{route('project.info',['project_id'=>$project->id])}}" class="btn btn-primary" role="button">View Project</a>--}}
                                {{--<a href="{{route('project.initiate',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">Initiate Project</a>--}}
                                {{--<a href="{{route('creategp',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">Create GP</a>--}}
                                {{--<a href="{{route('createfinancialreport',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">Create Financial Report</a>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}



                    <div class="row">
                        <div class="col">
                            <div class="card medium">
                                <div class="card-image waves-effect waves-block waves-light " style="height: 50%;">
                                    <img class="activator" src="http://materializecss.com/images/sample-1.jpg">
                                    <span class="card-title">{{$project->title}}</span>
                                </div>
                                <div class="card-content ">
                                    <div class="row">
                                        <span class="card-title activator grey-text text-darken-4"><i class="material-icons right">more_vert</i></span>
                                    </div>

                                    <div class="row">
                                        <div class="col s12 m6"><span style=" font-size:15px;font-weight: bold;color: #747474">Client:</span> {{$project->client_name}}</div>
                                        <div class="col s12 m6"><span style=" font-size:15px;font-weight: bold;color: #747474">Starting Date:</span> {{$project->date}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m6"><span style=" font-size:15px;font-weight: bold;color: #747474">Project Location:</span> {{$project->location}}</div>
                                        <div class="col s12 m6"><span style=" font-size:15px;font-weight: bold;color: #747474">Project Incharge:</span> {{$project->incharge}}</div>
                                    </div>
                                </div>

                                <div class="card-action">
                                    <p>
                                        @if($project->project_status>=1)
                                            <a href="{{route('project.info',['project_id'=>$project->id])}}" >View Project</a>|
                                            <a href="{{route('creategp',['project_id'=>$project->id])}}">Create GP</a>|
                                            <a href="{{route('createfinancialreport',['project_id'=>$project->id])}}" >Create Financial Report</a>|
                                            <a href="{{route('completeproject',['project_id'=>$project->id])}}" >Mark as Complete</a>
                                        @endif
                                        @if($project->project_status==0)
                                            <a href="{{route('project.initiate',['project_id'=>$project->id])}}" >Initiate Project</a>
                                        @endif
                                    </p>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">{{$project->title}}<i class="material-icons right">close</i></span>
                                    <p>{{$project->description}}</p>
                                    <div class="row">
                                        <div class="col s12 m6"><span style=" font-size:15px;font-weight: bold;color: #747474">Client:</span> {{$project->client_name}}</div>
                                        <div class="col s12 m6"><span style=" font-size:15px;font-weight: bold;color: #747474">Starting Date:</span> {{$project->date}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m6"><span style=" font-size:15px;font-weight: bold;color: #747474">Project Location:</span> {{$project->location}}</div>
                                        <div class="col s12 m6"><span style=" font-size:15px;font-weight: bold;color: #747474">Project Incharge:</span> {{$project->incharge}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m6"><span style=" font-size:15px;font-weight: bold;color: #747474">Client:</span> {{$project->client_name}}</div>
                                        <div class="col s12 m6"><span style=" font-size:15px;font-weight: bold;color: #747474">Project Duration:</span> {{$project->duration}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 m6"><span style=" font-size:15px;font-weight: bold;color: #747474">Client Email:</span> {{$project->client_email}}</div>
                                        <div class="col s12 m6"><span style=" font-size:15px;font-weight: bold;color: #747474">Project Status:</span>
                                            @if($project->project_status==0) To be initiated
                                            @elseif($project->project_status==1)Ongoing
                                            @elseif($project->project_status==2) Completed
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                @endforeach
            </div>


        </div>


    </section>



    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
            <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
            <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
            <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
        </ul>
    </div>
    <script>
        var token='{{Session::token()}}';
        var url='{{route('project_search')}}';
    </script>

@endsection()