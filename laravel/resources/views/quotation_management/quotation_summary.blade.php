@extends('layouts.master')

@section('title')
    Quotation Summary
@endsection

@section('content')
    <div class="collection hoverable">
        <a href="#!" class="collection-item active">Quotation Summary</a>
    </div>

    @include('includes.message-block')

    <section class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-lg-8 col-lg-offset-2">
            <header style="color: #747474;"><h3>Quotation Dashboard</h3></header>
        </div>
    </section>

    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            @foreach($quotations as $quotation)
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">{{ $quotation->client_name }}</span>
                                <p>
                                    Quotation Date  : {{ $quotation->quotation_date }} <br>
                                    Quotation Number: {{ $quotation->id }} <br>
                                    Client Name     : {{ $quotation->client_name }} <br>
                                    Amount          : {{ $quotation->quotation_amount }} <br>
                                </p>
                            </div>
                            <div class="card-action">
                                <a href="{{route('estimationbyquotation',['id'=>$quotation->id])}}">Create Estimate</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


@endsection