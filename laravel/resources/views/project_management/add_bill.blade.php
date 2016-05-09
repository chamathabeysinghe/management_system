@extends('layouts.master')

@section('title')
    Create Gross Profit Forecast
@endsection

@section('content')

    <div class="row">
        <form class="col s12" action="{{Route('addBill',['project_id'=>$project_id])}}" method="post">
            <div class="row" >

                <div class="input-field col s3">

                    <input  name="type" id="type" type="text" class="validate">
                    <label class="active" for="type">Bill type</label>
                </div>
                <div class="input-field col s3">

                    <input name="description" id="description" type="text" class="validate">
                    <label class="active" for="description">Description</label>
                </div>
                <div class="input-field col s3">

                    <input  name="value" id="value" type="text" class="validate">
                    <label class="active" for="value">Value</label>
                </div>

                <div class="col s3">

                    <button type="submit" id="gp_save" style="margin-top: 15px" class="btn btn-primary"><i class="material-icons left">payment</i>Add Bill</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
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