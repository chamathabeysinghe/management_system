@extends('layouts.master')

@section('title')
    Stock Details
@endsection

@section('content')
    <div class="collection hoverable">
        <a href="#!" class="collection-item active">Stock Details</a>
    </div>

    <div class="row">
        <form class="col s12">
            <div class="raw">
                <div class="col-s2">
                    <div class="input-field col s2">
                        <input id="date" type="date" class="validate">
                        <label class="active" for="date">Date</label>
                    </div>
                </div>
            </div>
            {{--<div class="input-field col s12">--}}
                {{--<select multiple id="selected_dealer" name = "selected_dealer">--}}
                    {{--<option value="" disabled selected>Choose your option</option>--}}
                    {{--<option value="1">Option 1</option>--}}
                    {{--<option value="2">Option 2</option>--}}
                    {{--<option value="3">Option 3</option>--}}
                {{--</select>--}}

            {{--</div>--}}

            <select class="browser-default" id = "dealer-list">
                <option  value="" disabled selected>Select Dealer</option>
                @foreach($dealers as $dealer)
                    <option value="1" data-register_no="{{$dealer->register_no}}"> {{$dealer->register_no}} - {{$dealer->first_name}}</option>
                @endforeach
            </select>


        </form>
    </div>

    <div class="row">
        <div id="s_table" class="table-editable">
            <span class="table-add glyphicon glyphicon-plus"></span>
            <table class="table highlight bordered">
                <thead>
                <tr>

                    <th data-field="item_code">Item Code</th>
                    <th class="right-align" data-field="item_name">Item Name</th>
                    <th class="right-align" data-field="serial_no">Serial No</th>
                    <th class="right-align" data-field="unit_price">Unit Price</th>
                    <th class="right-align" data-field="quantity">Quantity</th>
                    <th class="right-align" data-field="total_cost">Total Cost</th>

                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <!-- This is our clonable table line -->

                <tr class="hide">

                    <td contenteditable="true">unknown item</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>


                    <td>
                        <span class="table-remove glyphicon glyphicon-remove"></span>
                    </td>
                    <td>
                        <span class="table-up glyphicon glyphicon-arrow-up"></span>
                        <span class="table-down glyphicon glyphicon-arrow-down"></span>
                    </td>
                </tr>

                <tr class="not-write">

                    <td contenteditable="true">Total</td>
                    <td class="right-align" contenteditable="true"></td>
                    <td class="right-align" contenteditable="true"></td>
                    <td class="right-align" contenteditable="true"></td>
                    <td class="right-align" contenteditable="true"></td>
                    <td class="right-align" id="final-value" contenteditable="true">$$$$$$$$</td>


                    <td>
                        </span>
                    </td>
                    <td>

                    </td>
                </tr>
            </table>
        </div>



    </div>
    <button id="s_save" class="btn btn-primary" >Confirm</button>
    <input type="hidden" name="_token" value="{{Session::token()}}">


    <script>
        var token='{{Session::token()}}';
        var url ='{{route('savestock')}}';
        calTotal();
        $('td').keyup(function() {
            console.log('hello world');
            var total=0;
            $('.total-cost').each(function(){
                console.log($(this).text());
                total+=parseFloat($(this).text());
            })
            console.log(total);
            $('#final-value').text(total);
        });

        function calTotal(){
            var total=0;
            $('.total-cost').each(function(){
                console.log($(this).text());
                total+=parseFloat($(this).text());
            })
            console.log(total);
            $('#final-value').text(total);
        }

    </script>
    <script src="{{URL::to('js/stockeditable.js')}}">

    </script>

@endsection