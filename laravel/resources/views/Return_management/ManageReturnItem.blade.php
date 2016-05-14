@extends('layouts.master')
@section('title')
    Manage return item
@endsection
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h2 class="text-center text-success">Manage Return Items </h2>
            <text>Search Item :</text><br>
            <div class="row">
                <p class="col-lg-6">
                    <input class="with gap" type="radio" id="itemCode" name="searchType"   >
                    <label for="itemCode">Item Code </label>
                </p>
                <p>
                    <input class="with gap" type="radio" id="jobNo" name="searchType"   >
                    <label for="jobNo">Job No </label>
                </p>

            </div>



            <input type="text" id="search-input" placeholder="search" class="input-lg">
            <button type="submit" role="button" onclick="getReturnRecord()"  class="btn btn-lg btn-primary">Search</button><br>
        </div>
    </div>
    <div class="container">
            <div id="search_results">

            </div>



    </div>
    <script>
        var token='{{Session::token()}}';
        var url='{{route('return_search')}}';
    </script>

@endsection