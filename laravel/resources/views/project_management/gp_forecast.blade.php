@extends('layouts.master')
@section('title')
    Project Information
@endsection
@section('content')
    <table class="highlight">
        <thead>
        <tr>
            <th data-field="item">Item</th>
            <th data-field="quantity">Quantity</th>
            <th data-field="unit_price">Unit Cost</th>
            <th data-field="total_price">Total Cost</th>
            <th data-field="estimate">Estimate</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td></td>
            <td>########</td>
        </tr>
        <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
            <td>334</td>
            <td>$3.76</td>
        </tr>
        </tbody>
    </table>
@endsection