@extends('layouts.master')

@section('title')
    Quotation Summary
@endsection

@section('content')
    <div class="collection hoverable">
        <a href="#!" class="collection-item active">Quotation Summary</a>
    </div>

    <div>
        <input type="text" id="search-input" placeholder="Search" onkeydown="down()" onkeyup="up()">
    </div>

    <table class="highlight responsive-table bordered">
        <thead>
            <tr>
                <th data-field="date">Date</th>
                <th data-field="quotation_number">Quotation Number</th>
                <th data-field="client">Client</th>
                <th data-field="amount">Amount</th>
                <th data-field="quotation_status">Status</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>2016-05-03</td>
                <td>DES160503001</td>
                <td>Thulana</td>
                <td>$ 37.60</td>
                <td>Accepted</td>
            </tr>
            <tr>
                <td>2016-05-08</td>
                <td>DES160508008</td>
                <td>Ashan</td>
                <td>$ 28.70</td>
                <td>Estimation Sent</td>
            </tr>
            <tr>
                <td>2016-05-08</td>
                <td>DES160508012</td>
                <td>Kasunjith</td>
                <td>$ 52.30</td>
                <td>Accepted</td>
            </tr>
            <tr>
                <td>2016-05-09</td>
                <td>DES160508002</td>
                <td>Imesh</td>
                <td>$ 2.00</td>
                <td>Rejected</td>
            </tr>
        </tbody>
    </table>

@endsection