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

            {{--<div>--}}
            {{--<input type="text" id="search-input" placeholder="Search" onkeydown="down()" onkeyup="up()">--}}
            {{--</div>--}}


            <nav>
                <div class="nav-wrapper teal lighten-2">
                    <form>
                        <div class="input-field">
                            <input id="search-input" type="search" required onkeydown="down()" onkeyup="up()" style="height: 65px;">
                            <label for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>

            <div id="search-results">

            </div>

            {{--@foreach($quotations as $quotation)
                <span style=" font-size:15px;font-weight: bold;color: #747474">Quotation Date:</span>
            @endforeach--}}



        </div>

    </section>

    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...</h3></header>
            @foreach($quotations as $quotation)
                <article class = "post">
                    <p>
                        {{ $quotation->client_name }}
                    </p>
                </article>
            @endforeach
        </div>
    </section>


@endsection