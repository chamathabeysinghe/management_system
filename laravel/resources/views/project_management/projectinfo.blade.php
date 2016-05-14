@extends('layouts.master')
@section('title')
    Project Information
@endsection
@section('content')
    <div class="row" style="margin: 5%">
        <div class="col s12" style="margin-bottom: 2%">
            <ul class="tabs blue-text" >
                <li class="tab col s3"><a class="active"href="#details" style="text-decoration : none">Details</a></li>
                <li class="tab col s3"><a style="text-decoration : none" href="#technicinas">Technicians</a></li>
                <li class="tab col s3"><a style="text-decoration : none" href="#items">Items</a></li>
                <li class="tab col s3"><a style="text-decoration : none"href="#gp">Gross profit</a></li>
                <li class="tab col s3"><a style="text-decoration : none"href="#bills">Financial Report</a></li>
                <li class="tab col s3"><a style="text-decoration : none"href="#freport">Bills</a></li>
                <li class="tab col s3"><a style="text-decoration : none"href="#feedback">Feedback</a></li>
            </ul>
        </div>

        <div id="details" class="section">
            <h5>Project Details</h5>
            <div class="divider" style="margin-bottom: 10px"></div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="title" name="title" type="text" class="validate" value="{{$project->title}}">

                    <label class="active" for="title">Project Title</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="incharge" name="incharge" type="text" class="validate" value="{{$project->incharge}}">
                    <label class="active" for="incharge">Project Incharge</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="date" name="date" type="text" class="datepicker validate" onchange="changeTime()" value="{{$project->date}}">
                    {{--<input type='text' class='inp' readOnly />--}}
                    {{--<label class="" for="inp">Project date</label>--}}
                    <label class="active" for="date">Project date</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="duration" name="duration" type="number" class="validate" onchange="changeTime()" value="{{$project->duration}}">
                    <label class="active" for="duration">Project Duration</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="client" name="client" type="text" class="validate" value="{{$project->client_name}}">
                    <label class="active" for="client">Client Name</label>
                </div>

                <div class="input-field col s12 m6">
                    <input id="email" name="email" type="email" class="validate" value="{{$project->client_email}}">
                    <label class="active" for="email">Client Email</label>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea">{{$project->description}}</textarea>
                    <label class="active" for="description">Project Description</label>
                </div>
            </div>
        </div>


        <div id="technicinas" class="section" >
            <h5>Allocated Technicians</h5>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m6">
                    <ul class="collection " >
                        @foreach($technicians as $technicianallocation)
                            <?php
                                $technician=$technicianallocation[0];
                                $value=$technicianallocation[1];
                            ?>
                            <li class="collection-item avatar technician-list-item" data-id="{{$technician->id}}" >
                                {{--<img src="images/yuna.jpg" alt="" class="circle">--}}
                                <span class="title">{{$technician->name}}</span>
                                <p class="para">{{$value}}

                                </p>
                                <a href="#" class="secondary-content remove-technician" data-id="{{$technician->id}}" ><i class="material-icons" style="color: #ff1744;">close</i></a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <a href="#" class="btn btn-danger" id="calculate-commission" role="button">Calculate Commission</a>
                </div>
            </div>
        </div>

        <div id="items" class="section">
            <h5>Allocated Items</h5>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m6">
                    <div id="item_table" class="table-editable">
                        <span class="table-add glyphicon glyphicon-plus"></span>
                        <table class="table highlight bordered">
                            <thead>
                            <tr>

                                <th data-field="item">Item</th>
                                <th class="right-align" data-field="quantity">Serial Number</th>
                                <th class="right-align" data-field="unit_price">Unit Cost</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>


                            @foreach($itemList as $item)
                                <tr data-id="{{$item->id}}">

                                    <td id="name{{$item->id}}" contenteditable="true">{{$item->item_name}}</td>
                                    <td id="serial{{$item->id}}"class="right-align" contenteditable="true">{{$item->serial_number}}</td>
                                    <td id="cost{{$item->id}}"class="right-align" contenteditable="true">{{$item->unit_cost}}</td>
                                    <td>
                                        <span class="change table-down glyphicon glyphicon-pencil"></span>

                                    </td>
                                    <td>
                                        <span class="table-remove glyphicon glyphicon-remove"></span>
                                    </td>

                                </tr>
                            @endforeach


                            <tr class="hide">

                                <td class="name" contenteditable="true"></td>
                                <td class="serial right-align" contenteditable="true"></td>
                                <td class="cost right-align" contenteditable="true"></td>
                                <td>
                                    <span class="change table-down glyphicon glyphicon-pencil"></span>

                                </td>
                                <td>
                                    <span class="table-remove glyphicon glyphicon-remove"></span>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div id="gp" class="section">
            <h5>Gross Profit</h5>
            <div class="divider"></div>
            <div class="row">

                <a href="{{route('gpforecast',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">View GP</a>

            </div>
        </div>

        <div id="bills" class="section">
            <h5>Financial Report</h5>
            <div class="divider"></div>
            <div class="row">

                <a href="{{route('financialreport',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">View Financial Report</a>

            </div>
        </div>

        <div id="freport" class="section">
            <h5>Bills</h5>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m6">
                    <ul class="collection">
                        @foreach($billList as $bill)
                            <li class="collection-item avatar">
                                {{--<img src="images/yuna.jpg" alt="" class="circle">--}}
                                <span class="title">{{$bill->description}} </span> Value
                                <a href="#" class="secondary-content remove-bill" data-id="{{$bill->id}}" ><i class="material-icons" style="color: #ff1744;">close</i></a>
                                {{--<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>--}}
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    {{--{{route('bill',['project_id'=>$project->id])}}--}}
                    <a href="#" id="add-bill" class="btn btn-danger" role="button">Add Bill</a>
                </div>
            </div>
        </div>

        <div id="feedback" class="section">
            <h5>Feedback</h5>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m4">
                    <a href="{{route('feedback',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">Add Feedback</a>
                </div>
                <div class="col s12 m4">
                    <a href="{{route('reviewfeedback',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">View Feedback</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        {{--<form class="col s12" action="{{Route('initiateproject')}}" method="post">--}}


    </div>


    <div id="add-bill-modal" class="modal modal-fixed-footer" style="height: 30%;">
        <div class="row">
            <form class="col s12" action="{{Route('addBill',['project_id'=>$project->id])}}" method="post">
                <div class="row" >

                    <div class="input-field col s12 m3 offset-m2">

                        <input  name="type" id="type" type="text" class="validate">
                        <label class="active" for="type">Bill type</label>
                    </div>
                    <div class="input-field col s12 m3">

                        <input name="description" id="description" type="text" class="validate">
                        <label class="active" for="description">Description</label>
                    </div>
                    <div class="input-field col s12 m2">

                        <input  name="value" id="value" type="text" class="validate">
                        <label class="active" for="value">Value</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4 offset-m4">

                        <button type="submit" id="gp_save" style="margin-top: 15px" class="btn btn-primary"><i class="material-icons left">payment</i>Add Bill</button>
                        <input type="hidden" name="_token" value="{{Session::token()}}">
                    </div>


                </div>
            </form>
        </div>
    </div>
    {{--<button class="btn waves-effect waves-light" type="submit" >Initiate Project--}}
    {{--<i class="material-icons right">send</i>--}}
    {{--</button>--}}
    {{--<input type="hidden" name="_token" value="{{Session::token()}}">--}}

    {{--</form>--}}
    <script>
        var project_id='{{$project->id}}';
        var token='{{Session::token()}}';
        var url_deallocate='{{route('deallocateitem')}}';
        var url_update_item='{{route('changeallocateitem')}}';
        var url_add_single_item='{{route('addsingleitem')}}';
        var url_remove_technician_allocation='{{route('removeallocation')}}';
        var url_calculate_commission='{{route('calculatecommission')}}';
        var url_remove_bill='{{route('removebill')}}';

        $('.remove-technician').click(function(event){
            event.preventDefault();
            var technician_id=$(this).attr("data-id");

            $.ajax({
                method:'POST',
                url:url_remove_technician_allocation,
                data:{project_id:project_id,technician_id:technician_id,_token:token}
            }).done(function(){
                $(this).remove();
                $(this).closest('.li').remove();//this thing is not working currently
               console.log('done');
                location.reload();
            })

        });

        $('.remove-bill').click(function(event){
            event.preventDefault();
           console.log('remove a bill');
            var bill_id=$(this).attr("data-id");
            $.ajax({
                method:'POST',
                url:url_remove_bill,
                data:{bill_id:bill_id,_token:token}
            }).done(function(){
                console.log('Removed the fucker');
                location.reload();
            });
        });



        $('#calculate-commission').click(function(event){
            event.preventDefault();
            console.log('calculate commission button clicked');
            $.ajax({
                method:'POST',
                url:url_calculate_commission,
                data:{project_id:project_id,_token:token}
            }).done(function(){

                console.log('done');
            })


            location.reload();
//            $( ".technician-list-item" ).each(function( index ) {
//
//                console.log( index+"   "+$(this).find('.para').text('sdfadf'));
//
//
//            });
        });

        $('#add-bill').click(function(event){
            event.preventDefault();
            $('#add-bill-modal').openModal();
            console.log('add new bill');
        });

    </script>
    <script src="{{URL::to('js/infoitemeditable.js')}}"></script>
@endsection