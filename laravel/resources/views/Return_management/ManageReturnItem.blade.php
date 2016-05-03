@extends('layouts.master')
@section('title')
    Manage return item
@endsection
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="text-center text-success">Manage Return Items </h1>
            <text>Search Item :</text><br>
            <p>
                <input class="with gap" type="radio" id="itemCode" name="searchType"   >
                <label for="itemCode">Item Code </label>


            </p>
            <p>

                <input class="with gap" type="radio" id="jobNo" name="searchType"   >
                <label for="jobNo">Job No </label>
            </p>


            <input type="text" class="input-lg">
            <button type="submit" role="button" class="btn btn-lg btn-primary">Search</button><br>
        </div>
    </div>
    <div class="container">
        <form>

            <div class="row">
                <fieldset class="form-group col-lg-6">
                    <label for="Customer">Customer :</label>
                    <input class="form-control" id="customer" type="text" readonly>
                </fieldset>
                <fieldset class="form-group col-lg-6">
                    <label for="contact">Contact no :</label>
                    <input class="form-control" id="contact" type="text" readonly>
                </fieldset>
                <fieldset class="form-group">
                    <label for="item">Item :</label>
                    <input class="form-control" id="item" type="text" readonly>
                </fieldset>
                <fieldset class="form-group">
                    <label for="job">Job type :</label>
                    <input class="form-control" id="job" type="text" readonly>
                </fieldset>

            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h5>Warranty :</h5>
                    <fieldset class="form-group">
                        <label for="WCNno">WCN No :</label>
                        <input class="form-control" id="wcnno" type="text" >
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="WCNdate">WCN issue date :</label>
                        <input class="form-control" id="wcndate" type="text" >
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="received">Received :</label>
                        <input class="form-control" id="received" type="text" >
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="WRNno">WRN No :</label>
                        <input class="form-control" id="wrnno" type="text" >
                    </fieldset>
                </div>
                <div class="col-lg-offset-6">
                    <h5>Repair :</h5>
                    <fieldset class="form-group">
                        <label for="receivedRepair">Received :</label>
                        <input class="form-control" id="receivedRepair" type="text" >
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="cost">Repair Cost :</label>
                        <input class="form-control" id="cost" type="text" >
                    </fieldset>

                </div>


            </div>

        </form>
    </div>
    <div class="btn-group-lg row">
            <button type="submit" role="button" class="btn btn-lg btn-primary   ">WCN</button>
            <button type="submit" role="button" class="btn btn-lg btn-primary ">Close Job</button>
        <button type="submit" role="button" class="btn btn-lg btn-primary col-lg-offset-6  ">Apply</button>
        <button type="submit" role="button" class="btn btn-lg btn-primary ">Cancel</button>

    <div class="glyphicon-qrcode"></div>
    </div>
@endsection