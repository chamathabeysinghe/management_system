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
            <div class="row">
                <div class="col-s4">

                    <div class="input-field col s3">
                        <input id="date" type="date" class="validate">
                        <label class="active" for="date">Date</label>
                    </div>
                </div>
            </div>


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
            <table class="table highlight bordered" id="data_table">
                <thead>
                <tr>


                    <th class="left-align" data-field="item_code">Item Code</th>
                    <th class="left-align" data-field="item_name">Item Name</th>
                    <th class="left-align" data-field="serial_no">Serial No</th>
                    <th class="left-align" data-field="unit_price">Unit Price</th>
                    <th class="left-align" data-field="quantity">Quantity</th>
                    <th class="left-align" data-field="total_cost">Total Cost</th>

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
                    <td contenteditable="true">1</td>
                    <td class="total-cost" contenteditable="true">0</td>


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
                    <td class="left-align" contenteditable="true"></td>
                    <td class="left-align" contenteditable="true"></td>
                    <td class="left-align" contenteditable="true"></td>
                    <td class="left-align" contenteditable="true"></td>
                    <td class="left-align" id="final-value" contenteditable="true">$$$$$$$$</td>


                    <td>
                        </span>
                    </td>
                    <td>

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
                        <option value="1" data-code="{{$item->item_code}}" data-description="{{$item->item_description}}" data-price="{{$item->unit_price}}" data-name="{{$item->item_name}}">{{$item->item_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col s6">
                <br><br><a href="#" id="select-item" class="btn btn-danger" role="button">Add item from list</a>
            </div>

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
        $

        $('#select-item').click(function(event){
            event.preventDefault();
            var data_cost = $('#item-list').find(":selected").attr('data-price');
            var data_name=  $('#item-list').find(":selected").attr('data-name');
            var data_description=  $('#item-list').find(":selected").attr('data-description');
            var data_code=  $('#item-list').find(":selected").attr('data-code');
            var $clone = $('#s_table').find('tr.hide').clone(true).removeClass('hide table-line');


            console.log(data_cost);
            $clone.find('td').each (function(key) {
                if(key==0){
                    $(this).text(data_code);
                }
                if(key==1){
                    $(this).text(data_name);
                }
                if(key==3){
                    $(this).text(data_cost);
                }

                if(key==5){
                    $(this).text(data_cost);
                }
            });
            $('#s_table').find('table').append($clone);
            var $row =$("#data_table").find("tr").last();
            if ($row.index() === 1) return; // Don't go above the header
            $row.prev().before($row.get(0));
        });

    </script>
    <script src="{{URL::to('js/stockeditable.js')}}">

    </script>

@endsection