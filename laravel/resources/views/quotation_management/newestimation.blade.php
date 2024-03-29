@extends('layouts.master')

@section('title')
    Create Estimation
@endsection

@section('content')
    <div class="collection hoverable">
        <a href="#!" class="collection-item active">Create Estimation</a>
    </div>

    {{--Importing some data from Quotation and filling the relevant fields on Estimation--}}
    <div class="row" id="printable">
        <form class="col s12">
            <div class="row">
                {{--Displaying the id of the Quotation which is used for creating Extimation--}}
                <div class="input-field col s6">
                    <i class="material-icons prefix">work</i>
                    <input  value="{{ $quotation->id }}" id="estimation_number" name="estimation_number" type="text" class="validate">
                    <label class="active" for="estimation_number">Quotation Number</label>
                </div>
                <div class="input-field col s3 offset-s1">
                    <i class="material-icons prefix">today</i>
                    <input id="estimation_date" type="date" class="datepicker">
                    <label class="active" for="estimation_date">Estimation Date</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input value="{{ $quotation->client_name }}"id="client_name" name="client_name" type="text" class="validate">
                    <label class="active" for="client_name">Client Name</label>
                </div>
                <div class="input-field col s5 offset-s1">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input value="{{ $quotation->client_email }}" id="client_email" name="client_email" type="email" class="validate">
                    <label class="active" for="client_email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">location_on</i>
                    <input value="{{ $quotation->client_address }}" id="client_address" name="client_address" type="text" class="validate">
                    <label class="active" for="client_address">Client Address</label>
                </div>
                <div class="input-field col s5 offset-s1">
                    <i class="material-icons prefix">contact_phone</i>
                    <input value="{{ $quotation->client_tel }}" id="client_tel" name="client_tel" type="tel" class="validate">
                    <label class="active" for="tel">Client Phone</label>
                </div>
            </div>
        </form>
    </div>

    {{--Validated table for storing item details of Estimation--}}
    <div class="row">
        <div id="est_table" class="table-editable">
            <span class="table-add glyphicon glyphicon-plus"></span>
            <table class="table highlight bordered">
                <thead>
                <tr>

                    <th class="hide" data-field="item_code">Item Code</th>
                    <th data-field="item">Item</th>
                    <th data-field="description">Description</th>
                    <th class="right-align" data-field="unit_price">Unit Price</th>
                    <th class="right-align" data-field="quantity">Quantity</th>
                    <th class="right-align" data-field="total_price">Total Price</th>

                    <th></th>
                    <th></th>
                </tr>
                </thead>

                {{--Filling the table using data imported from Quotation--}}
                @foreach($record_list as $record)
                    <tr >

                        <td class="hide" contenteditable="false">{{$record->itemcode}}</td>
                        <td contenteditable="false">{{$record->itemname}}</td>
                        <td contenteditable="true">{{$record->description}}</td>
                        <td class="right-align" contenteditable="false">{{$record->unitprice}}</td>
                        <td class="right-align" contenteditable="false">{{$record->quantity}}</td>
                        <td class="right-align" contenteditable="false">{{$record->totalprice}}</td>
                        <td>
                            <span class="table-remove glyphicon glyphicon-remove"></span>
                        </td>
                        <td>
                            <span class="table-up glyphicon glyphicon-arrow-up"></span>
                            <span class="table-down glyphicon glyphicon-arrow-down"></span>
                        </td>
                    </tr>
                @endforeach

                {{--Adding new item entries on table--}}
                <tr class="hide">
                    <td class="hide" contenteditable="true">0000</td>
                    <td contenteditable="true">item</td>
                    <td contenteditable="true">unknown</td>
                    <td class="right-align" contenteditable="true"></td>
                    <td class="right-align" contenteditable="true"></td>
                    <td class="right-align total-price" contenteditable="true">0</td>
                    <td>
                        <span class="table-remove glyphicon glyphicon-remove"></span>
                    </td>
                    <td>
                        <span class="table-up glyphicon glyphicon-arrow-up"></span>
                        <span class="table-down glyphicon glyphicon-arrow-down"></span>
                    </td>
                </tr>

                {{--Showing total--}}
                <tr class="not-write">

                    <td class="hide" contenteditable="false"></td>
                    <td contenteditable="false">Total</td>
                    <td class="right-align" contenteditable="false"></td>
                    <td class="right-align" contenteditable="false"></td>
                    <td class="right-align" contenteditable="false"></td>
                    <td class="right-align" id="estimation_amount" contenteditable="false"></td>


                    <td>
                        </span>
                    </td>
                    <td>

                    </td>
                </tr>
            </table>
        </div>

        {{--Adding items from the Selling Items table--}}
        <div class="row">
            <div class="col s6">
                <label>Select Item</label>
                <select class="browser-default" id="item-list">
                    <option value="" disabled selected>Choose your option</option>
                    @foreach($sellingitems as $item)
                        <option value="1" data-code="{{$item->item_code}}" data-description="{{$item->item_description}}" data-price="{{$item->unit_price}}" data-name="{{$item->item_name}}">{{$item->item_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col s6">
                <br><br><a href="#" id="select-item" class="btn btn-danger" role="button">Add item from list</a>
            </div>

        </div>

        {{--Authenticated button to save the Estimation--}}
        @if(Auth::user()->user_type==1 or Auth::user()->user_type==3)
            <button id="est_save" class="btn btn-primary">Create Estimation<i class="material-icons right">done</i></button>
        @endif

    </div>

    <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>

    {{--Print functionality--}}
    <div class="row">
        @if(Auth::user()->user_type==1 or Auth::user()->user_type==3)
            <button class="btn waves-effect waves-light" type="submit" name="action" onclick="printDiv('printable')">Print
                <i class="material-icons right">print</i>
            </button>
        @endif
    </div>

    <script>
        printDivCSS = new String ('<link href="{{URL::to('css/materialize.css')}}" rel="stylesheet" type="text/css">'
                +'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">'
                +'<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">');
        function printDiv(divId) {
            window.frames["print_frame"].document.body.innerHTML=printDivCSS + document.getElementById(divId).innerHTML;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>

    {{--Front-end Logic for Calculating Total--}}
    <script>
        var token='{{Session::token()}}';
        var url='{{route('createestimation')}}';

        calTotal();
        $('td').keyup(function() {
            var total=parseFloat({{ $quotation->quotation_amount }});
            $('.total-price').each(function(){
                console.log('322');
                console.log($(this).text());
                total+=parseFloat($(this).text());
            })
            console.log('caltotal');
            $('#estimation_amount').text(total);
        });

        function calTotal(){
            var total=0;
            $('.total-cost').each(function(){
                console.log($(this).text());
                total+=parseFloat($(this).text());
            })
            console.log(total);
            $('#estimation_amount').text(total);
        }

        $('#select-item').click(function(event){
            event.preventDefault();

            var data_cost = $('#item-list').find(":selected").attr('data-price');
            var data_name=  $('#item-list').find(":selected").attr('data-name');
            var data_description=  $('#item-list').find(":selected").attr('data-description');
            var data_code=  $('#item-list').find(":selected").attr('data-code');
            var $clone = $('#est_table').find('tr.hide').clone(true).removeClass('hide table-line');
            console.log(data_cost);
            $clone.find('td').each (function(key) {
                if(key==0){
                    $(this).text(data_code);
                }
                if(key==1){
                    $(this).text(data_name);
                }
                if(key==2){
                    $(this).text(data_description);
                }
                if(key==3){
                    $(this).text(data_cost);
                }
            });
            $('#est_table').find('table').append($clone);
            var $row = $("#est_table").find("tr").last();
            if ($row.index() === 1)return;
            $row.prev().before($row.get(0));
        });
    </script>

    <script src="{{URL::to('js/estimationeditable.js')}}"></script>

@endsection