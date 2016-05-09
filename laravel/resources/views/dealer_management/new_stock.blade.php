@extends('layouts.master')

@section('title')
    New Stock
@endsection

@section('content')

    <div class="raw">
        <div class="col-s2">
            <div class="input-field col s2">
                <input id="date" type="date" class="validate">
                <label class="active" for="date">Date</label>
            </div>
        </div>


    </div>



    <div class="input-field col s12">
        <select multiple>
            <option value="" disabled selected>Choose your option</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
        </select>

    </div>

    <select class="browser-default">
        <option value="" disabled selected>Select Dealer</option>
        <option value="1">dealer 1</option>
        <option value="2">dealer 2</option>
        <option value="3">dealer 3</option>
    </select>

    <div class="container">
        <h4>Stock Details</h4>

        <ul>
            <li>Details about stocks dealer bought</li>

        </ul>
        <div id="table" class="table-editable">
            <span class="table-add glyphicon glyphicon-plus"></span>
            <table class="table">
                <tr>
                    <th>itemcode</th>
                    <th>name</th>
                    <th>serial no.</th>
                    <th>unit price(Rs)</th>
                    <th>quantity)</th>
                    <th>cost</th>

                </tr>
                <tr>
                    <td contenteditable="true">xx01</td>
                    <td contenteditable="true">camera</td>
                    <td contenteditable="true">01,737,93</td>
                    <td contenteditable="true">0xx/=</td>
                    <td contenteditable="true">xx</td>
                    <td contenteditable="true">0yy/=</td>
                    <td>
                        <span class="table-remove glyphicon glyphicon-remove"></span>
                    </td>
                    <td>
                        <span class="table-up glyphicon glyphicon-arrow-up"></span>
                        <span class="table-down glyphicon glyphicon-arrow-down"></span>
                    </td>
                </tr>
                <!-- This is our clonable table line -->
                <tr class="hide">
                    <td contenteditable="true">Untitled</td>
                    <td contenteditable="true">undefined</td>
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

        <button id="export-btn" class="btn btn-primary">Export Data</button>
        <p id="export"></p>
    </div>
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">Comments</label>
                </div>
            </div>
            <div class="input-field col s2 offset-s10">
                <a class="waves-effect waves-light btn-large">Confirm</a>
            </div>
        </form>
    </div>


@endsection
