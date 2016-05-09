@extends('layouts.master')

@section('title')
    Registration
@endsection

@section('content')
    @include('includes.message-block')
    <h3>Dealer Registration</h3>

    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s5">
                    <i class="material-icons prefix">mode_edit</i>
                    <input id="register_no" type="text" class="validate">
                    <label class="active" for="register_no">Register Number</label>
                </div>
                <div class="input-field col s2 offset-s4">
                    <input id="date" type="date" class="validate">
                    <label class="active" for="date">Date</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="first_name" type="text" class="validate">
                    <label class="active" for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate">
                    <label class="active" for="last_name">Last Name</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s3">
                    <i class="material-icons prefix">phone</i>
                    <input id="telephone_no" type="tel" class="validate">
                    <label class="active" for="telephone_no">Telephone</label>
                </div>
                <div class="input-field col s5 offset-s3">
                    <i class="email">mode_edit</i>
                    <input id="email" type="email" class="validate">
                    <label class="active"   for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <input id="address" class="materialize-textarea"></input>
                    <label class="active" for="address">Address</label>
                </div>
            </div>
            <div class="container">
                <h4>Conditions</h4>
                <p>Conditions apply for the above dealer</p>


                <div id="table" class="table-editable">
                    <span class="table-add glyphicon glyphicon-plus"></span>
                    <table class="table">
                        <tr>
                            <th>conditions</th>

                        </tr>
                        <tr>
                            <td contenteditable="true">conditon1</td>

                            <td>
                                <span class="table-remove glyphicon glyphicon-remove"></span>
                            </td>
                            <td>
                                <span class="table-up glyphicon glyphicon-arrow-up"></span>
                                <span class="table-down glyphicon glyphicon-arrow-down"></span>
                            </td>
                        </tr>
                        <tr>
                            <td contenteditable="true">conditon2</td>
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
            <div class="input-field col s2 offset-s10">
                <a class="waves-effect waves-light btn-large">Register</a>
            </div>
        </form>
    </div>


@endsection