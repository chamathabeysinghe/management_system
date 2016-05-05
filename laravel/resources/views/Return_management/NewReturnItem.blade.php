@extends('layouts.master')
@section('title')
    Add new return item
@endsection
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="text-center text-success">Return Item </h1>
            <text>Search Item :</text>
            <input type="text" class="input-lg">
            <button type="submit" role="button" class="btn btn-lg btn-primary">Search</button>
        </div>
    </div>
    <div class="container">
        <form>
            <fieldset class="form-group">
                <label for="item_name">Item Description :</label>
                <input class="form-control" id="item_name" type="text" readonly>
            </fieldset>
            <fieldset class="form-group">
                <label for="project">Issued project :</label>
                <input class="form-control" id="project" type="text" readonly>
            </fieldset>
            <fieldset class="form-group">
                <label for="supplier">Supplier :</label>
                <input class="form-control" id="supplier" type="text" readonly>
            </fieldset>
            <fieldset class="form-group">
                <label for="warranty">Warranty :</label>
                <input class="form-control" id="warranty" type="text" readonly>
            </fieldset>
            <fieldset class="form-group " >
                <label >Item Status :</label>
                <br>
                <div class="btn-group-lg" data-toggle="button">
                    <label class="radio">Warranty</label>
                    <input   type="radio" name="options" value="warranty">
                    <label >Repair</label>
                    <input   type="radio" name="options" value="repair">
                </div>

            </fieldset>
            <fieldset class="form-group">
                <label for="remarks">Remarks :</label>
                <input class="form-control" id="remarks" type="text">
            </fieldset>
        </form>
    </div>
    <div class="btn-group-lg">
        <button type="submit" role="button" class="btn btn-lg btn-primary col-lg-offset-8  ">Save</button>
        <button type="submit" role="button" class="btn btn-lg btn-primary ">Cancel</button>


    </div>
@endsection