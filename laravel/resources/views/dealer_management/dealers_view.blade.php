@extends('layouts.master')

@section('title')
    Dealers View
@endsection

@section('content')
    @include('includes.message-block')

    <div class="collection hoverable">
        <a href="#!" class="collection-item active">Find Dealers</a>
    </div>
    <div class="input-field" style="width: 95%">
        <h6>Search by register number</h6>
        <i class="material-icons prefix">search</i>
        <input id="dealer_id" name="dealer_id" type="search" style="border: none" required  >
    </div>
    <div class="row">
        <div class="col s12 m6">

            <a href="#" class="btn btn-danger" id="find" role="button">Find</a>
        </div>
    </div>
    <div id="search-results">

    </div>

    <script>
        var token='{{Session::token()}}';
        var url="{{route('dealersearch')}}";

        $('#find').click(function(event){
            var keywords=$('#dealer_id').val();
            console.log(keywords);
            $.ajax({
                method:'POST',
                url:url,
                data:{keyWords:keywords,_token:token}
            }).done(function(markup){

                $('#search-results').html(markup);
                $('#search-results').show();


            })
        });
    </script>

@endsection