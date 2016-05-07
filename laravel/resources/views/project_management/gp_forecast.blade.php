@extends('layouts.master')

@section('title')
    Create Gross Profit Forecast
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
                    <input  id="project" type="text" class="validate">
                    <label class="active" for="project">Project</label>
                </div>
                <div class="input-field col s3 offset-s1">
                    <i class="material-icons prefix">today</i>
                    <input id="quotation_date" type="date" class="datepicker">
                    <label class="active" for="quotation_date">Gross profit created Date</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="prepare" type="text" class="validate">
                    <label class="active" for="prepare">Prepared by</label>
                </div>
                <div class="input-field col s5 offset-s1">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="check" type="email" class="validate">
                    <label class="active" for="check">Checked by</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s10">
                    <i class="material-icons prefix">location_on</i>
                    <input  id="director" type="text" class="validate">
                    <label class="active" for="director">Director</label>
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
                        <td class="right-align" contenteditable="true">{{$record->totalCost}}</td>
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

                    <td contenteditable="true">unknown item</td>
                    <td class="right-align" contenteditable="true">$$</td>
                    <td class="right-align" contenteditable="true">unknown quantity</td>
                    <td class="right-align" contenteditable="true">$$$$</td>
                    <td class="right-align" contenteditable="true">$$$$</td>
                    <td class="right-align" contenteditable="true">$$$$</td>

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

        <button id="gp_save" class="btn btn-primary">Export Data</button>

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
        var url='{{route('updategp')}}';
        var project_id='{{$project_id}}}';
    </script>

@endsection