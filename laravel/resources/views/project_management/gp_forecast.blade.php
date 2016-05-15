@extends('layouts.master')

@section('title')
    Create Gross Profit Forecast
@endsection

@section('content')
    <div class="collection hoverable">
        <a href="#!" class="collection-item active">Create/View Gross Profit Forecast</a>
    </div>
    <div id="printable">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">work</i>
                    <input  id="project" type="text" class="validate" value="{{$project_id}}" disabled>
                    <label class="active" for="project">Project ID</label>
                </div>
                <div class="input-field col s3 offset-s1">
                    <i class="material-icons prefix">today</i>
                    <input id="gp_date" type="date" class="datepicker"  value="{{$gp->date}}">
                    <label class="active" for="quotation_date">Gross profit created Date</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="prepare" type="text" class="validate" value="{{$gp->crated_by}}">
                    <label class="active" for="prepare">Prepared by</label>
                </div>
                <div class="input-field col s5 offset-s1">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="check" type="text" class="validate" value="{{$gp->checked_by}}">
                    <label class="active" for="check">Checked by</label>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div id="gp_table" class="table-editable">
            <span class="table-add glyphicon glyphicon-plus"></span>
            <table class="table highlight bordered">
                <thead>
                <tr>

                    <th data-field="item">Item</th>
                    <th class="right-align" data-field="unit_price">Unit Price</th>
                    <th class="right-align" data-field="quantity">Quantity</th>
                    <th class="right-align" data-field="total_price">Total Cost</th>
                    <th class="right-align" data-field="estimate_price">Estimate</th>
                    <th class="right-align" data-field="unit_margine">Unit margine</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <!-- This is our clonable table line -->
                @foreach($recordList as $record)
                    <tr >

                        <td contenteditable="true">{{$record->name}}</td>
                        <td class="right-align" contenteditable="true">{{$record->unitCost}}</td>
                        <td class="right-align" contenteditable="true">{{$record->quantity}}</td>
                        <td class="right-align total-cost"  contenteditable="true">{{$record->totalCost}}</td>
                        <td class="right-align" contenteditable="true">{{$record->estimation}}</td>
                        <td class="right-align" contenteditable="true">$$$$</td>

                        <td>
                            <span class="table-remove glyphicon glyphicon-remove"></span>
                        </td>
                        <td>
                            <span class="table-up glyphicon glyphicon-arrow-up"></span>
                            <span class="table-down glyphicon glyphicon-arrow-down"></span>
                        </td>
                    </tr>
                @endforeach
                <tr class="hide">

                    <td contenteditable="true"></td>
                    <td class="right-align" contenteditable="true"></td>
                    <td class="right-align" contenteditable="true"></td>
                    <td class="right-align total-cost" contenteditable="true">0</td>
                    <td class="right-align" contenteditable="true"></td>
                    <td class="right-align" contenteditable="true"></td>

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
                    <td class="right-align" id="final-value" contenteditable="true">#####</td>
                    <td class="right-align" contenteditable="true"></td>
                    <td class="right-align" contenteditable="true"></td>
                    <td>

                    </td>
                    <td>

                    </td>

                </tr>
            </table>
        </div>

    </div>
    </div>

    <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>

    <div class="row">
        @if(Auth::user()->user_type==1 or Auth::user()->user_type==2)
            <button id="gp_save" class="btn btn-primary">Save Data
                <i class="material-icons right">save</i>
            </button>
        @endif
        <button class="btn waves-effect waves-light" type="submit" name="action">Download
            <i class="material-icons right">play_for_work</i>
        </button>
        <button class="btn waves-effect waves-light" type="submit" name="action" onclick="printDiv('printable')">Print
            <i class="material-icons right">print</i>
        </button>
        <button class="btn waves-effect waves-light" type="submit" name="action">Email
            <i class="material-icons right">email</i>
        </button>
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
    <script>
        var token='{{Session::token()}}';
        var url='{{route('updategp')}}';
        var project_id='{{$project_id}}}';
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
    <script src="{{URL::to('js/gpeditable.js')}}"></script>
@endsection