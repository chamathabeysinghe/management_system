@extends('layouts.master')

@section('title')
    WCN
@endsection

@section('content')

    <div id="printable">
        <h3 class="center"> Warranty claim note</h3>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s5">
                        <i class="material-icons prefix">work</i>
                        <input  id="job" type="text" class="validate" value="{{$data->warrantyItemDetail->id}}" >
                        <label class="active" for="project">ID</label>
                    </div>
                    <div class="input-field col s4 offset-s1">
                        <i class="material-icons prefix">today</i>
                        <input id="gp_date" type="date" class="datepicker"  value="{{$data->warrantyItemDetail->wcnIssueDate}}">
                        <label class="active" for="quotation_date"> Date</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 ">
                        <i class="material-icons prefix">perm_identity</i>
                        <input  id="job" type="text" class="validate" value="{{$supplier->supplier_name}}" >
                        <label class="active" for="project">Supplier </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10">
                        <i class="material-icons prefix">room</i>
                        <input  id="job" type="text" class="validate" value="{{$supplier->address}}" >
                        <label class="active" for="project"> address </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 ">
                        <i class="material-icons prefix">phone</i>
                        <input  id="job" type="text" class="validate" value="{{$supplier->contact_no}}" >
                        <label class="active" for="project">Contact no </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col  ">
                        <i class="material-icons prefix">clear_all</i>
                        <input  id="job" type="text" class="validate" value="{{$item->serial_number}}" >
                        <label class="active" for="project">Item serial </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">shopping_basket</i>
                        <input  id="job" type="text" class="validate" value="{{$item->item_name}}" >
                        <label class="active" for="project">Customer address </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">info</i>
                        <input  id="job" type="text" class="validate" value="{{$data->remarks}}" >
                        <label class="active" for="project">Status </label>
                    </div>
                </div>

            </form>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action" onclick="printDiv('printable')">Print
            <i class="material-icons right">print</i>
        </button>


    </div>

    <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
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
@endsection