@extends('layouts.master')
@section('title')
    Initiate Project
@endsection
@section('content')

    <div class="row">
        <form class="col s12" action="{{Route('initiateproject',['project_id'=>$project->id])}}" method="post">
            <div class="section" >
                <h5>Project Details</h5>
                <div class="divider" style="margin-bottom: 10px"></div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="date" name="date" type="date" class="validate" value="{{$project->date}}">

                        <label class="active" for="date">Project date</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="client" name="client" type="text" class="validate" value="{{$project->client_name}}">
                        <label class="active" for="client">Client Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name="email" type="email" class="validate" value="{{$project->client_email}}">
                        <label class="active" for="email">Client Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="description" name="description" class="materialize-textarea"></textarea>
                        <label class="active" for="description">Project Description</label>
                    </div>
                </div>
            </div>
            <div class="section">
                <h5>Technician Allocaation</h5> <div class="divider"></div>
                 <div class="row">
                     <div class="col s12 m6">

                         @foreach($technicians as $technician)

                             <p>
                                 <input type="checkbox" name="selection[]" value="{{$technician->id}}" id="{{$technician->id}}" />
                                 <label for="{{$technician->id}}">{{$technician->name}}</label>
                             </p>

                         @endforeach
                     </div>
                     {{--<div class="col s12 m6 hide-on-small-only">--}}
                         {{--<p>--}}
                             {{--<input type="checkbox" id="test3" />--}}
                             {{--<label for="test3">Red</label>--}}
                         {{--</p>--}}

                         {{--<p>--}}
                             {{--<input type="checkbox" id="test4" />--}}
                             {{--<label for="test4">Red</label>--}}
                         {{--</p>--}}
                     {{--</div>--}}
                 </div>



            </div>
            <button class="btn waves-effect waves-light" type="submit" >Initiate Project
                <i class="material-icons right">send</i>
            </button>
            <input type="hidden" name="_token" value="{{Session::token()}}">

        </form>

    </div>

@endsection