@extends('layouts.master')

@section('content')
    @include('includes.message-block')

    <section class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-lg-8 col-lg-offset-2">
            <header style="color: #747474;"><h3>Project Dashboard</h3></header>



            <nav>
                <div class="nav-wrapper teal lighten-2">
                    <form>
                        <div class="input-field">
                            <input id="search-input" type="search" required onkeydown="down()" onkeyup="up()">
                            <label for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>

            <div>
                <input type="text" id="search-input" placeholder="Search" onkeydown="down()" onkeyup="up()">
            </div>



            
            <div id="search-results">

            </div>
            <div id="all-results">
                @foreach($projects as $project)
                    <div class="panel panel-primary">
                        <div class="panel-heading">Project Title</div>
                        <div class="panel-body">
                            <p>{{$project->description}}</p>
                            <div><label>Project Client       :</label>{{$project->client_name}}</div>
                            <div><label>Project Starting Date:</label>{{$project->date}}</div>
                            <div><label>Project Incharge     :</label>CHAT</div>
                            <div><label>Project Duration     :</label>4 Days</div>
                            <p>
                                <a href="{{route('project.info',['project_id'=>$project->id])}}" class="btn btn-primary" role="button">View Project</a>
                                <a href="{{route('project.initiate',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">Initiate Project</a>
                                <a href="{{route('creategp',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">Create GP</a>

                            </p>
                        </div>
                    </div>
                @endforeach
            </div>



            <div class="panel panel-danger">
                <div class="panel-heading">Project Title</div>
                <div class="panel-body">
                    <p>I am a very simple card. I am good at containing small bits of information.
                        I am convenient because I require little markup to use effectively.</p>
                    <div><label>Project Client       :</label>Client Name</div>
                    <div><label>Project Starting Date:</label>2010/9/23</div>
                    <div><label>Project Incharge     :</label>CHAT</div>
                    <div><label>Project Duration     :</label>4 Days</div>
                    <p>
                        <a href="#" class="btn btn-primary" role="button">View Project</a>
                        <a href="#" class="btn btn-danger" role="button">Initiate Project</a>
                    </p>
                </div>
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