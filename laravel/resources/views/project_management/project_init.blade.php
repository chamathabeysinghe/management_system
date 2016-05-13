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
                        <input id="date" name="date" type="date" class="datepicker validate" onchange="changeTime()" value="{{$project->date}}">
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
            <div class="section" >
                <h5>Technician Allocation</h5> <div class="divider"></div>

                <div id="technician-search-results">

                </div>


                <div id="all-results">
                    <div class="row">
                        <div class="col s12 m6">

                            @foreach($technicians as $technician)

                                <p>
                                    <input type="checkbox" name="selection[]" value="{{$technician->id}}" id="{{$technician->id}}" />
                                    <label for="{{$technician->id}}">{{$technician->name}}</label>

                                </p>

                            @endforeach
                        </div>
                    </div>


                </div>

            </div>
            <div class="section">
                <h5>Item Allocation</h5> <div class="divider"></div>
                <div class="row">
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

                            <tr class="hide">

                                <td contenteditable="true">unknown item</td>
                                <td class="right-align" contenteditable="true">$$</td>
                                <td class="right-align" contenteditable="true">unknown quantity</td>


                                <td>
                                    <span class="table-remove glyphicon glyphicon-remove"></span>
                                </td>
                                <td>
                                    <span class="table-up glyphicon glyphicon-arrow-up"></span>
                                    <span class="table-down glyphicon glyphicon-arrow-down"></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <label>Select Item</label>
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


                    {{----}}
                    {{--<a  id="item_save" class="btn btn-primary">Export Data</a>--}}
                </div>
            </div>


            <button class="btn waves-effect waves-light" type="submit" id="item_save">Initiate Project
                <i class="material-icons right">send</i>
            </button>
            <input type="hidden" name="_token" value="{{Session::token()}}">

        </form>

    </div>

    <script>

        var project_id='{{$project->id}}';
        var token='{{Session::token()}}';
        var url_allocation='{{route('allocateitems')}}';
        var url_search_technician='{{route('searchtechnician')}}';
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10){
            dd='0'+dd
        }
        if(mm<10){
            mm='0'+mm
        }
        var today = dd+'/'+mm+'/'+yyyy;
        document.getElementById("date").value = today;


        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year
            format: 'mm/dd/yyyy'

        });
        $('#select-item').click(function(event){
            event.preventDefault();

            var data_cost = $('#item-list').find(":selected").attr('data-price');
            var data_name=  $('#item-list').find(":selected").attr('data-name');
            var $clone = $('#item_table').find('tr.hide').clone(true).removeClass('hide table-line');
            var i=0;
            $clone.find('td').each (function(key) {
                if(key==0){
                    $(this).text(data_name);
                }
                if(key==2){
                    $(this).text(data_cost);
                }
            });
            $('#item_table').find('table').append($clone);
        });

        function changeTime(){
            var date=$('#date').val();
            var duration=parseInt($('#duration').val());
            console.log(isValidDate(date));
            console.log(duration>0);

            if(isValidDate(date) && duration>0){
                $.ajax({
                    method:'POST',
                    url:url_search_technician,
                    data:{date:date,duration:duration,_token:token}
                }).done(function(markup){

                    $('#technician-search-results').html(markup);
                    $('#all-results').hide();
                    $('#search-results').show();

                    console.log('DONE');

                })
            }


        }

        function isValidDate(dateString)
        {
            // First check for the pattern
            if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
                return false;

            // Parse the date parts to integers
            var parts = dateString.split("/");
            var day = parseInt(parts[1], 10);
            var month = parseInt(parts[0], 10);
            var year = parseInt(parts[2], 10);

            // Check the ranges of month and year
            if(year < 1000 || year > 3000 || month == 0 || month > 12)
                return false;

            var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

            // Adjust for leap years
            if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
                monthLength[1] = 29;

            // Check the range of the day
            return day > 0 && day <= monthLength[month - 1];
        };

    </script>
    <script src="{{URL::to('js/itemeditable.js')}}"></script>

@endsection