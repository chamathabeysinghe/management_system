@extends('layouts.master')
@section('title')
    Technician Profile
@endsection
@section('content')
    <div class="row">

        <ul class="collapsible" data-collapsible="accordion">
            @foreach($technicians as $technician)
            <li>
                <div class="collapsible-header"><i class="material-icons">filter_drama</i>{{$technician->name}}</div>
                <div class="collapsible-body ">

                    <div class="section ">
                        <div style="font-size: 15px; color: rgba(116, 116, 116, 0.94)">
                            <?php
                            echo "Current Project 2010/4/12-2010/4/13 view";
                            ?>


                        </div>
                        <div >
                            <table class="highlight">
                                <thead>
                                <tr>
                                    <th data-field="project">Project</th>
                                    <th data-field="duration">Duration</th>
                                    <th data-field="commission">Commission</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($technician->technicianallocations as $allocation)
                                <tr>
                                    <td>{{$allocation->project->id}}</td>
                                    <td>{{$allocation->project->date}}</td>
                                    <td>$0.87</td>
                                </tr>
                               @endforeach
                                </tbody>
                            </table>
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