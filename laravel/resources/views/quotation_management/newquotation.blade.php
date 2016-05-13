@extends('layouts.master')

@section('title')
    Create Quotation
@endsection

@section('content')
    <div class="collection hoverable">
        <a href="#!" class="collection-item active">Create Quotation</a>
    </div>

    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">work</i>
                    <input  value="{{ $quotation->id }}" id="quotation_number" name="quotation_number" type="text" class="validate">
                    <label class="active" for="quotation_number">Quotation Number</label>
                </div>
                <div class="input-field col s3 offset-s1">
                    <i class="material-icons prefix">today</i>
                    <input id="quotation_date" type="date" class="datepicker">
                    <label class="active" for="quotation_date">Quotation Date</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="client_name" name="client_name" type="text" class="validate">
                    <label class="active" for="client_name">Client Name</label>
                </div>
                <div class="input-field col s5 offset-s1">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="client_email" name="client_email" type="email" class="validate">
                    <label class="active" for="client_email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">location_on</i>
                    <input id="client_address" name="client_address" type="text" class="validate">
                    <label class="active" for="client_address">Client Address</label>
                </div>
                <div class="input-field col s5 offset-s1">
                    <i class="material-icons prefix">contact_phone</i>
                    <input id="client_tel" name="client_tel" type="tel" class="validate">
                    <label class="active" for="tel">Client Phone</label>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div id="q_table" class="table-editable">
            <span class="table-add glyphicon glyphicon-plus"></span>
            <table class="table highlight bordered">
                <thead>
                <tr>

                    <th data-field="item_code">Item Code</th>
                    <th data-field="item">Item</th>
                    <th data-field="description">Description</th>
                    <th class="right-align" data-field="unit_price">Unit Price</th>
                    <th class="right-align" data-field="quantity">Quantity</th>
                    <th class="right-align" data-field="total_price">Total Cost</th>

                    <th></th>
                    <th></th>
                </tr>
                </thead>

                <tr class="hide">

                    <td contenteditable="true">DESXXXX</td>
                    <td contenteditable="true">unknown item</td>
                    <td contenteditable="true">unknown</td>
                    <td class="right-align" contenteditable="true">$$</td>
                    <td class="right-align" contenteditable="true">unknown quantity</td>
                    <td class="right-align" contenteditable="true">$$$$</td>


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
                    <td class="right-align" id="quotation_amount" contenteditable="true"></td>


                    <td>
                        </span>
                    </td>
                    <td>

                    </td>
                </tr>
            </table>
        </div>

        <button id="q_save" class="btn btn-primary">Export Data</button>

    </div>

    <div class="row">
        <button class="btn waves-effect waves-light" type="submit" name="action">Create
            <i class="material-icons right">done</i>
        </button>
        <button class="btn waves-effect waves-light" type="submit" name="action">Download
            <i class="material-icons right">play_for_work</i>
        </button>
        <button class="btn waves-effect waves-light" type="submit" name="action">Print
            <i class="material-icons right">print</i>
        </button>
        <button class="btn waves-effect waves-light" type="submit" name="action">Email
            <i class="material-icons right">email</i>
        </button>
    </div>
    <script>
        var token='{{Session::token()}}';
        var url='{{route('createquotation')}}';

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
    <script src="{{URL::to('js/quotationeditable.js')}}"></script>

@endsection