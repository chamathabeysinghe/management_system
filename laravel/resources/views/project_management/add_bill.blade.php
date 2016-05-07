@extends('layouts.master')

@section('title')
    Create Gross Profit Forecast
@endsection

@section('content')

    <div class="row">
        <form class="col s12">
            <div class="row">

                <div class="input-field col s3">

                    <input  id="tye" type="text" class="validate">
                    <label class="active" for="type">Bill type</label>
                </div>
                <div class="input-field col s3">

                    <input  id="description" type="text" class="validate">
                    <label class="active" for="description">Description</label>
                </div>
                <div class="input-field col s3">

                    <input  id="value" type="text" class="validate">
                    <label class="active" for="value">Value</label>
                </div>
                <div class="col s3">

                    <button id="gp_save" style="margin-top: 15px" class="btn btn-primary"><i class="material-icons left">payment</i>Add Bill</button>
                </div>


            </div>
        </form>
    </div>




    {{--<script>--}}
        {{--var token='{{Session::token()}}';--}}
        {{--var url='{{route('updategp')}}';--}}
        {{--var project_id='{{$project_id}}}';--}}
    {{--</script>--}}

@endsection