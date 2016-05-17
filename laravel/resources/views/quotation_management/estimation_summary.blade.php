@extends('layouts.master')

@section('title')
    Estimation Summary
@endsection

@section('content')
    <div class="collection hoverable">
        <a href="#!" class="collection-item active">Estimation Summary</a>
    </div>

    @include('includes.message-block')

    <section class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-lg-8 col-lg-offset-2">
            <header style="color: #747474;"><h3>Estimation Dashboard</h3></header>
        </div>
    </section>

    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            {{--showing the Estimation details using Materialize Cards--}}
            @foreach($estimations as $estimation)
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">{{ $estimation->client_name }}</span>
                                <p>
                                    Estimation Date  : {{ $estimation->estimation_date }} <br>
                                    Estimation Number: {{ $estimation->id }} <br>
                                    Client Name      : {{ $estimation->client_name }} <br>
                                    Amount           : {{ $estimation->estimation_amount }} <br>
                                </p>
                            </div>
                            <div class="card-action">
                                <a href="#">Create Project</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


@endsection