@extends('layouts.master')
@section('title')
    Add new return item
@endsection
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="text-center blue-text text-darken-2">Return Item </h1>
            <text>Search Item :</text>
            <input type="text" id="search-input"  name="search-input"  placeholder="Search" class="input-lg">
            <a name="btn" class="waves-effect waves-light btn" onclick="getItem()"><i class="material-icons left">search</i>Search</a>
        </div>
    </div>
    <div id="search_results">
    </div>
    <script>
        var token = '{{Session::token()}}';
        var url = '{{route('search_item')}}';
    </script>

@endsection