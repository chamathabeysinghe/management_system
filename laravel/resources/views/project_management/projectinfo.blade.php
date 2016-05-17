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
                <li class="tab col s3"><a style="text-decoration : none" href="#reports">Reports</a></li>
                <li class="tab col s3"><a style="text-decoration : none"href="#bills">Bills</a></li>
                <li class="tab col s3"><a style="text-decoration : none"href="#feedback">Feedback</a></li>

            </ul>
        </div>
        {{--project details div--}}
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

        {{--technician section--}}
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
                                @if(Auth::user()->user_type==1 or Auth::user()->user_type==2)
                                <a href="#" class="secondary-content remove-technician" data-id="{{$technician->id}}" ><i class="material-icons" style="color: #ff1744;">close</i></a>
                                @endif
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            @if(Auth::user()->user_type==1 or Auth::user()->user_type==2)
            <div class="row">
                <div class="col s12 m6">
                    <a href="#" class="btn btn-danger" id="calculate-commission" role="button">Calculate Commission</a>
                </div>
            </div>
            @endif
        </div>

        {{--items section--}}
        <div id="items" class="section">
            <h5>Allocated Items</h5>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m612">
                    <div id="item_table" class="table-editable">
                        @if(Auth::user()->user_type==1 or Auth::user()->user_type==2)
                        <span class="table-add glyphicon glyphicon-plus"></span>
                        @endif
                        <table class="table highlight bordered">
                            <thead>
                            <tr>

                                <th data-field="item">Item</th>
                                <th class="right-align" data-field="quantity">Serial Number</th>
                                <th class="right-align" data-field="unit_price">Unit Cost</th>
                                <th class="right-align" data-field="warranty">Warranty</th>
                                <th class="right-align" data-field="supplier_id">Supplier ID</th>
                                <th></th>
                                <th></th>

                            </tr>
                            </thead>


                            @foreach($itemList as $item)
                                <tr data-id="{{$item->id}}">

                                    <td id="name{{$item->id}}" contenteditable="true">{{$item->item_name}}</td>
                                    <td id="serial{{$item->id}}"class="right-align" contenteditable="true">{{$item->serial_number}}</td>
                                    <td id="cost{{$item->id}}"class="right-align" contenteditable="true">{{$item->unit_cost}}</td>
                                    <td id="warranty{{$item->id}}"class="right-align" contenteditable="true">{{$item->warranty}}</td>
                                    <td id="supplier_id{{$item->id}}"class="right-align" contenteditable="true">{{$item->supplier_id}}</td>

                                @if(Auth::user()->user_type==1 or Auth::user()->user_type==2)
                                    <td>
                                        <span class="change table-down glyphicon glyphicon-floppy-save"></span>

                                    </td>
                                    <td>
                                        <span class="table-remove glyphicon glyphicon-remove"></span>
                                    </td>
                                    @endif

                                </tr>
                            @endforeach


                            <tr class="hide">

                                <td class="name" contenteditable="true"></td>
                                <td class="serial right-align" contenteditable="true"></td>
                                <td class="cost right-align" contenteditable="true"></td>
                                <td class="warranty right-align" contenteditable="true"></td>
                                <td class="supplier_id right-align" contenteditable="true"></td>
                                @if(Auth::user()->user_type==1 or Auth::user()->user_type==2)
                                <td>
                                    <span class="change table-down glyphicon glyphicon-pencil"></span>

                                </td>
                                <td>
                                    <span class="table-remove glyphicon glyphicon-remove"></span>
                                </td>
                                @endif
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
            @if(Auth::user()->user_type==1 or Auth::user()->user_type==2)
            <div>
                <label for="item-list">Select Item</label>
                <div class="row">
                    <div class="col s6">

                        <select class="browser-default" id="item-list">
                            <option value="" disabled selected>Choose your option</option>
                            @foreach($sellingitems as $item)
                                <option value="1" data-price="{{$item->unit_price}}" data-name="{{$item->item_name}}">{{$item->item_name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col s6">

                        <a href="#" id="select-item" class="btn btn-danger" role="button">Add item from list</a>
                    </div>

                </div>
            </div>
            @endif
        </div>
        {{--report section--}}
        <div id="reports">
            <div class="row" style="margin-bottom: 10%">
                <div class="col s8 offset-s2">
                    <a href="{{route('gpforecast',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">View/Create Gross Profit Forecast</a>
                    <a href="{{route('financialreport',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">View/Create Financial Report</a>

                </div>

            </div>

        </div>
        {{--bill section--}}
        <div id="bills" class="section">
            <h5>Bills</h5>
            <div class="divider"></div>
            <div class="row">
                <div class="col s12 m6">
                    <ul class="collection">
                        @foreach($billList as $bill)
                            <li class="collection-item avatar">
                                {{--<img src="images/yuna.jpg" alt="" class="circle">--}}
                                <p><span class="title"> Bill: {{$bill->description}} </span></p>
                                <p><span class="title"> Value: {{$bill->value}} </span></p>

                                @if(Auth::user()->user_type==1 or Auth::user()->user_type==2)

                                <a href="#" class="secondary-content remove-bill" data-id="{{$bill->id}}" ><i class="material-icons" style="color: #ff1744;">close</i></a>
                                {{--<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>--}}
                                @endif
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            @if(Auth::user()->user_type==1 or Auth::user()->user_type==2)

            <div class="row" style="margin-top: 5%">
                <div class="col s12 m6 offset-s3">
                    {{--{{route('bill',['project_id'=>$project->id])}}--}}
                    <a href="#" id="add-bill" class="btn btn-danger" role="button">Add Bill</a>
                </div>
            </div>
            @endif

        </div>

        {{--feedback section--}}
        <div id="feedback" class="section">
            <h5>Feedback</h5>
            <div class="divider"></div>
            @if($feedback==null)
            <div class="row" style="margin-top: 10%">
                <div class="col s12 m4 offset-m4">
                    <a href="{{route('feedback',['project_id'=>$project->id])}}" class="btn btn-danger" role="button">Add Feedback</a>
                </div>
            </div>
            @endif
            @if($feedback!=null)
                <style>
                    .inquiry{
                        /*border-radius: 25px;*/
                        /*border: 2px solid #5361ad;*/
                        /*padding: 20px;*/
                        margin-bottom: 30px;
                    }
                    .inquiry h4{
                        color: #797979;
                    }
                    .inquiry label{
                        color: #6e6e6e;
                    }
                </style>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Client feedback form</h3>

                        <div class="row">
                            <div class="col-md-8 col-md-offset-2" >

                                <form >

                                    <div  class="inquiry">
                                        <h4>How satisfied are you: </h4>

                                        <div class="input-group" readonly style="margin-bottom: 20px">
                                            <label>With your experience of the most recent installation?</label>
                                            <p>
                                                <input class="with-gap" name="group1"  value="1" type="radio" id="g1i1"  />
                                                <label for="g1i1">Very Satisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group1" value="2" type="radio" id="g1i2"  />
                                                <label for="g1i2">Satisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group1" value="3" type="radio" id="g1i3"  />
                                                <label for="g1i3">Neutral</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group1" value="4" type="radio" id="g1i4"  />
                                                <label for="g1i4">Dissatisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group1" value="5" type="radio" id="g1i5"  />
                                                <label for="g1i5">Very Dissatisfied</label>
                                            </p>

                                        </div>


                                        <div class="input-group" style="margin-bottom: 20px" >
                                            <label>With the timeliness of installation?</label>
                                            <p>
                                                <input class="with-gap" name="group2" value="1" type="radio" id="g2i1"  />
                                                <label for="g2i1">Very Satisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group2" value="2" type="radio" id="g2i2"  />
                                                <label for="g2i2">Satisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group2" value="3" type="radio" id="g2i3"  />
                                                <label for="g2i3">Neutral</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group2" value="4" type="radio" id="g2i4"  />
                                                <label for="g2i4">Dissatisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group2" value="5" type="radio" id="g2i5"  />
                                                <label for="g2i5">Very Dissatisfied</label>
                                            </p>
                                        </div>


                                        <div class="input-group" style="margin-bottom: 20px" >
                                            <label>With the quality of our installation?</label>
                                            <p>
                                                <input class="with-gap" name="group3" value="1" type="radio" id="g3i1"  />
                                                <label for="g3i1">Very Satisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group3" value="2" type="radio" id="g3i2"  />
                                                <label for="g3i2">Satisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group3" value="3" type="radio" id="g3i3"  />
                                                <label for="g3i3">Neutral</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group3" value="4" type="radio" id="g3i4"  />
                                                <label for="g3i4">Dissatisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group3" value="5" type="radio" id="g3i5"  />
                                                <label for="g3i5">Very Dissatisfied</label>
                                            </p>
                                        </div>


                                        <div class="input-group" style="margin-bottom: 20px" >
                                            <label>that installation personnel are sufficiently knowledgeable and professional?</label>
                                            <p>
                                                <input class="with-gap" name="group4" value="1" type="radio" id="g4i1"  />
                                                <label for="g4i1">Very Satisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group4" value="2" type="radio" id="g4i2"  />
                                                <label for="g4i2">Satisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group4" value="3" type="radio" id="g4i3"  />
                                                <label for="g4i3">Neutral</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group4" value="4" type="radio" id="g4i4"  />
                                                <label for="g4i4">Dissatisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group4" value="5" type="radio" id="g4i5"  />
                                                <label for="g4i5">Very Dissatisfied</label>
                                            </p>
                                        </div>

                                        <div class="input-group" style="margin-bottom: 20px" >
                                            <label>With installation service overall?</label>
                                            <p>
                                                <input class="with-gap" name="group5" value="1" type="radio" id="g5i1"  />
                                                <label for="g5i1">Very Satisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group5" value="2" type="radio" id="g5i2"  />
                                                <label for="g5i2">Satisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group5" value="3" type="radio" id="g5i3"  />
                                                <label for="g5i3">Neutral</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group5" value="4" type="radio" id="g5i4"  />
                                                <label for="g5i4">Dissatisfied</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group5" value="5" type="radio" id="g5i5"  />
                                                <label for="g5i5">Very Dissatisfied</label>
                                            </p>
                                        </div>

                                    </div>


                                    <div  class="inquiry">

                                        <h4>Digital Engineering Solutions understands the service needs of my organization</h4>

                                        <div class="input-group">
                                            <p>
                                                <input class="with-gap" name="group6" value="1" type="radio" id="g6i1"  />
                                                <label for="g6i1">Very Agree</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group6" value="2" type="radio" id="g6i2"  />
                                                <label for="g6i2">Agree</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group6" value="3" type="radio" id="g6i3"  />
                                                <label for="g6i3">Neutral</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group6" value="4" type="radio" id="g6i4"  />
                                                <label for="g6i4">Disagree</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group6" value="5" type="radio" id="g6i5"  />
                                                <label for="g6i5">Very Disagree</label>
                                            </p>
                                        </div>
                                    </div>


                                    <div  class="inquiry">

                                        <h4>Digital Engineering Solutions understands the service needs of my organization</h4>

                                        <div class="input-group">
                                            <p>
                                                <input class="with-gap" name="group7" value="1" type="radio" id="g7i1"  />
                                                <label for="g7i1">Very Agree</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group7" value="2" type="radio" id="g7i2"  />
                                                <label for="g7i2">Agree</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group7" value="3" type="radio" id="g7i3"  />
                                                <label for="g7i3">Neutral</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group7" value="4" type="radio" id="g7i4"  />
                                                <label for="g7i4">Disagree</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group7" value="5" type="radio" id="g7i5"  />
                                                <label for="g7i5">Very Disagree</label>
                                            </p>
                                        </div>
                                    </div>


                                    <div class="inquiry">

                                        <h4>Overall, the value of DES's seervice compared with the price paid is</h4>

                                        <div class="input-group">
                                            <p>
                                                <input class="with-gap" name="group8" value="1" type="radio" id="g8i1"  />
                                                <label for="g8i1">Very Agree</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group8" value="2" type="radio" id="g8i2"  />
                                                <label for="g8i2">Agree</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group8" value="3" type="radio" id="g8i3"  />
                                                <label for="g8i3">Neutral</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group8" value="4" type="radio" id="g8i4"  />
                                                <label for="g8i4">Disagree</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group8" value="5" type="radio" id="g8i5"  />
                                                <label for="g8i5">Very Disagree</label>
                                            </p>
                                        </div>
                                    </div>


                                    <div class="inquiry">

                                        <h4>Would you recommend our service?</h4>

                                        <div class="input-group">
                                            <p>
                                                <input class="with-gap" name="group9" value="1" type="radio" id="g9i1"  />
                                                <label for="g9i1">Very Agree</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group9" value="2" type="radio" id="g9i2"  />
                                                <label for="g9i2">Agree</label>
                                            </p>
                                            <p>
                                                <input class="with-gap" name="group9" value="3" type="radio" id="g9i3"  />
                                                <label for="g9i3">Neutral</label>
                                            </p>

                                        </div>
                                    </div>

                                    <div class="inquiry">

                                        <h4>Other comments</h4>

                            <textarea cols="90" rows="5" readonly name="comments" style="alignment: center">{{$feedback->comments}}

                            </textarea>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    var installation ='{{$feedback->installation}}';
                    var timeliness ='{{$feedback->timeliness}}';
                    var quality ='{{$feedback->quality}}';
                    var personnel ='{{$feedback->personnel}}';
                    var overall_service ='{{$feedback->overall_service}}';
                    var service_needs ='{{$feedback->service_needs}}';
                    var price ='{{$feedback->price}}';
                    var recommendation ='{{$feedback->recommendation}}';
                    $("input[name=group1][value=" + installation + "]").prop('checked', true);
                    $("input[name=group2][value=" + timeliness + "]").prop('checked', true);
                    $("input[name=group3][value=" + quality + "]").prop('checked', true);
                    $("input[name=group4][value=" + personnel + "]").prop('checked', true);
                    $("input[name=group5][value=" + overall_service + "]").prop('checked', true);
                    $("input[name=group6][value=" + service_needs + "]").prop('checked', true);
                    $("input[name=group7][value=" + service_needs + "]").prop('checked', true);
                    $("input[name=group8][value=" + price + "]").prop('checked', true);
                    $("input[name=group9][value=" + recommendation + "]").prop('checked', true);

                    $('input').each(function()
                    {
                        $(this).click(function(){
                            return false;
                        });

                    });
                </script>
            @endif
        </div>

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

                        <input name="description" id="bill-description" type="text" class="validate">
                        <label class="active" for="description" >Description</label>
                    </div>
                    <div class="input-field col s12 m2">

                        <input  name="value" id="bill-value" type="text" class="validate">
                        <label class="active" for="value">Value</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4 offset-m4">

                        <button type="submit" id="bill_save" style="margin-top: 15px" class="btn btn-primary"><i class="material-icons left">payment</i>Add Bill</button>
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
                window.location.href = document.URL +  ' #technicians';
                //$('#technicinas').load(document.URL +  ' #technicians');
                //location.reload();
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
                window.location.href = document.URL +  ' #bills';
                //location.reload();
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

        $('#select-item').click(function(event){
            event.preventDefault();

            var data_cost = $('#item-list').find(":selected").attr('data-price');
            var data_name=  $('#item-list').find(":selected").attr('data-name');
            var $clone = $('#item_table').find('tr.hide').clone(true).removeClass('hide table-line');

            $clone.find('td').each (function(key) {
                if(key==0){
                    $(this).text(data_name);
                }
                if(key==2){
                    $(this).text(data_cost);
                }
            });

            $.post(url_add_single_item, {project_id:project_id,itemName:'',serialNumber:'',unitCost:0,_token:token }).done(function(markup){


                $clone.attr('data-id',markup);

                $clone.children('.name').attr('id','name'+markup);//repeat this for
                $clone.children('.serial').attr('id','serial'+markup);//repeat this for
                $clone.children('.cost').attr('id','cost'+markup);//repeat this for
                $clone.children('.warranty').attr('id','warranty'+markup);//repeat this for
                $clone.children('.supplier_id').attr('id','supplier_id'+markup);//repeat this for

                $('#item_table').find('table').append($clone);

            });

        });
        $('#bill_save').click(function(event){

            console.log('clicked add tp bill');
            var error=false;
            if($('#bill-description').val()==''){
                error=true;
                $('#bill-description').addClass('invalid');
            }
            if($('#bill-value').val()=='' || isNaN($('#bill-value').val())){
                error=true;
                $('#bill-value').addClass('invalid');
            }
            if(error){
                event.preventDefault();
            }
        });
    </script>
    <script src="{{URL::to('js/infoitemeditable.js')}}"></script>
@endsection