@extends('layouts.master')

@section('title')
    Create Quotation
@endsection

@section('content')
    <div class="collection">
        <a href="#!" class="collection-item active">Create Quotation</a>
    </div>

    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">work</i>
                    <input quotationNum="DESXXXXXXX" id="quotation_number" type="text" class="validate">
                    <label class="active" for="quotation_number">Quotation Number</label>
                </div>
                <div class="input-field col s3 offset-s1">
                    <i class="material-icons prefix">today</i>
                    <input id="quotation_date" type="date" class="datepicker">
                    <label class="active" for="quotation_date">Quotation Date</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="client_name" type="text" class="validate">
                    <label class="active" for="client_name">Client Name</label>
                </div>
                <div class="input-field col s5 offset-s1">
                    <i class="material-icons prefix">email</i>
                    <input id="client_email" type="email" class="validate">
                    <label class="active" for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s10">
                    <i class="material-icons prefix">location_on</i>
                    <input clientAddress="Client Address" id="client_address" type="text" class="validate">
                    <label class="active" for="client_address">Client Address</label>
                </div>
            </div>
        </form>
    </div>

    <table class="highlight">
        <thead>
        <tr>
            <th data-field="item Code">Item Code</th>
            <th data-field="item">Item</th>
            <th data-field="description">Description</th>
            <th data-field="unit_price">Unit Price</th>
            <th data-field="quantity">Quantity</th>
            <th data-field="total_price">Total Cost</th>
        </tr>
        </thead>

        <tbody>

        <tr>
            <td>DES140048P</td>
            <td>CC TV Camera</td>
            <td>Made by Ashen</td>
            <td>$ 3.76</td>
            <td>10</td>
            <td>$ 37.60</td>
        </tr>

        <tr>
            <td>DES140007P</td>
            <td>CC TV Holder</td>
            <td>Made by Chamath</td>
            <td>$ 0.76</td>
            <td>10</td>
            <td>$ 7.60</td>
        </tr>

        <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>$ 45.20</td>
        </tr>

        </tbody>
    </table>

    <div class="row">
        <button class="btn waves-effect waves-light" type="submit" name="action">Create
            <i class="material-icons right">done</i>
        </button>
        <button class="btn waves-effect waves-light" type="submit" name="action">Download
            <i class="material-icons right">play_for_work</i>
        </button>
        <button class="btn waves-effect waves-light" type="submit" name="action">Print
            <i class="material-icons right">print</i>
        </button>
        <button class="btn waves-effect waves-light" type="submit" name="action">Email
            <i class="material-icons right">email</i>
        </button>
    </div>

@endsection