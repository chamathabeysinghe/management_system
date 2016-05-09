@extends('layouts.master')
@section('title')
    Technician Profile
@endsection
@section('content')
    <div class="row">

        <ul class="collapsible" data-collapsible="accordion">
            @foreach($technicians as $technician)
            <li>
                <div class="collapsible-header"><i class="material-icons">people</i>{{$technician->name}}</div>
                {{--<img src="http://materializecss.com/images/yuna.jpg"  width="5%" height="5%" alt="" class="circle">--}}

                <div class="collapsible-body ">

                    <div class="section ">
                        <blockquote>
                            <h5>Current Projects</h5>


                            <ul class="collection">
                                @foreach($technician->technicianallocations as $allocation)
                                    @if($allocation->project!=null and $allocation->project->project_status==1)
                                        <li class="collection-item avatar">
                                            {{--<img src="images/yuna.jpg" alt="" class="circle">--}}
                                            <span class="title">{{$allocation->project->title}}</span>
                                            <p>Starting date: {{$allocation->project->date}} <br>
                                                Duration: {{$allocation->project->duration}}
                                            </p>
                                            <a href="{{route('project.info',['project_id'=>$allocation->project->id])}}" class="secondary-content"><i class="material-icons">send</i></a>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>

                        </blockquote>
                        <div style="font-size: 15px; color: rgba(116, 116, 116, 0.94)">


                        </div>
                        <div >

                            <blockquote>
                               <h5>Completed Projects </h5>

                            <table class="highlight">
                                <thead>
                                <tr>
                                    <th data-field="id">Project ID</th>
                                    <th data-field="project">Project</th>
                                    <th data-field="duration">Duration</th>
                                    <th data-field="commission">Commission</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($technician->technicianallocations as $allocation)
                                <tr>
                                    @if($allocation->project!=null and $allocation->project->project_status==2)
                                        <td>{{$allocation->project->id}}</td>
                                        <td>{{$allocation->project->title}}</td>
                                        <td>{{$allocation->project->duration}}</td>
                                        <td>$0.87</td>
                                        <td><a href="{{route('project.info',['project_id'=>$allocation->project->id])}}" class="secondary-content"><i class="material-icons">send</i></a></td>
                                    @endif
                                </tr>
                               @endforeach
                                </tbody>
                            </table>
                            </blockquote>
                        </div>

                    </div>



                </div>
            </li>
            @endforeach


        </ul>
        <div class="fixed-action-btn"  style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red modal-trigger"  href="#modal1"id="add-technician">
                <i class="large material-icons">add</i>
            </a>

        </div>
    </div>

    <div id="modal1" class="modal modal-fixed-footer" style="height: 50%;">
        <form action="{{route('addtechnician')}}" method="post">
        <div class="modal-content">
            <h4>Add new technician</h4>
            @include('includes.message-block')

            <div class="row">
                <div class="col-md-6 col-md-offset-3">


                        <div class="form-group {{$errors->has('full_name')?'has-error':''}}">
                            <label for="full_name">Full Name</label>
                            <input class="form-control " type="text" name="name" id="name" value="{{Request::old('name')}}">
                        </div>

                        <input type="hidden" name="_token" value="{{Session::token()}}">

                </div>
            </div>
        </div>
        <div class="modal-footer" >
            <button type="submit" class="btn btn-primary col-md-offset-">Add Technician</button>

        </div>
        </form>
    </div>



@endsection