@foreach($resultProjects as $project)

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
                            <a href="{{route('createfinancialreport',['project_id'=>$project->id])}}" >Create Financial Report</a>
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