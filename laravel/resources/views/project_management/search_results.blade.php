@foreach($resultProjects as $project)
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
            </p>
        </div>
    </div>
@endforeach