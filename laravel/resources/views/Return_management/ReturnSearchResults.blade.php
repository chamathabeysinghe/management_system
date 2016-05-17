@extends('layouts.master')
@section('title')
    Manage Return Item
@endsection

@section('content')

    <h2 class="page-header center">Manage Returned Item</h2>
    <div id="form-errors">

    </div>
    <form id="form">
        <div class="row">
            <div class="col-lg-12" >
            <fieldset class="form-group col-lg-6">
                <label for="Customer">Customer :</label>
                <input class="form-control" id="customer" type="text" value="{{$customer->customerName}}" readonly>
                <input class="form-control" id="customer" type="hidden" value="{{$customer->customerName}}" readonly>
            </fieldset>
            <fieldset class="form-group col-lg-6">
                <label for="contact">Contact no :</label>
                <input class="form-control" id="contact" type="text" value="{{$customer->contactNo}}" readonly>
                <input class="form-control" id="contact" type="hidden" value="{{$customer->contactNo}}" readonly>
            </fieldset>
            <fieldset class="form-group">
                <label for="item">Item :</label>
                <input class="form-control" id="item" type="text" value="{{$item->item_name}}" readonly>
                <input class="form-control" id="item" type="hidden" value="{{$item->item_name}}" readonly>
            </fieldset>

            {{--<fieldset class="form-group">--}}
            {{--<label for="job">Job type :</label>--}}
            {{--<div class="row">--}}
            {{--<p class="col-lg-6">--}}
            {{--<input class="with gap" type="radio" id="warrantyselect" value="warranty" name="option">--}}
            {{--<label for="warrantyselect">Warranty </label>--}}
            {{--</p>--}}
            {{--<p>--}}
            {{--<input class="with gap" type="radio" id="repairselect" value="repair" name="option">--}}
            {{--<label for="repairselect">repair </label>--}}
            {{--</p>--}}

            {{--</div>--}}
            {{--<input class="form-control" id="job" type="text" value="{{$data->job_type}}" readonly>--}}
            </fieldset>
                <script type="text/javascript">

                    $(function () {
                        var $state = $('select');
                        var job_type= $state.val();
                        var $repair = $('#repair_div');
                        var $warranty = $('#warranty_div');
                        $state.live("change", function () {

                            console.log('{{$data->job_type}}'+'job_type');
                            if ($state.val() == 'warranty') {
                                //console.log($state.val());
                                if($('#wcnno').val()!=''){
                                    $('#wcn_btn').prop('disabled', false);
                                }else{
                                    $('#wcn_btn').prop('disabled', true);
                                }

                                // $warranty.removeAttr('disabled');
                                $repair.children().prop('disabled', true);
                                $warranty.children().prop('disabled', false);
                                //$repair.attr('disabled', 'disabled').val('');
                            } else {
                                $('#wcn_btn').prop('disabled', true);
                                $repair.children().prop('disabled', false);
                                $warranty.children().prop('disabled', true);
                                // $repair.removeAttr('disabled');
                                // $warranty.attr('disabled', 'disabled').val('');
                            }
                            // do whatever you need to do

                            // you want the element to lose focus immediately
                            // this is key to get this working.
                            $state.blur();
                        });
                    });
                    $(document).ready(function () {
                        $("select").val("{{$data->job_type}}").change();
                        $("select").val("{{$data->job_type}}");
                    });
                    $(document).ready(function() {
                        $('select').material_select();
                    });
                    $('.datepicker').pickadate({
                        selectMonths: true, // Creates a dropdown to control month
                        selectYears: 15 // Creates a dropdown of 15 years to control year
                    });





                </script>
            <fieldset class="form-group">
                <label >Job type :</label>
                <select  id="job_type"name="job_type">
                    <option value="" disabled selected>Choose job type</option>
                    <option value="warranty">Warranty</option>
                    <option value="repair">Repair</option>
                </select>
            </fieldset>
        </div>

        </div>
        <div class="row">

            <div class="col-lg-12" id="warranty_div">
                <h5>Warranty :</h5>
                <fieldset class="form-group">
                    <label for="WCNno">WCN No :</label>
                    <input class="form-control" id="wcnno" type="text" name="wcnno"
                           value=@if($data->job_type == "warranty" and $data->warrantyItemDetail !=null )"{{  $data->warrantyItemDetail->wcnNo  }}" @endif>
                </fieldset>
                <fieldset class="form-group">
                    <label for="WCNdate">WCN issue date :</label>
                    <input class="form-control datepicker" id="wcndate" type="date" name="wcndate"
                           value=@if($data->job_type == "warranty"  and $data->warrantyItemDetail !=null)"{{  $data->warrantyItemDetail->wcnIssueDate  }}" @endif >
                </fieldset>
                <fieldset class="form-group">
                    <label for="received">Received :</label>
                    <input class="form-control datepicker" id="received" type="date" name="wrnreceived"
                           value=@if($data->job_type == "warranty"and $data->warrantyItemDetail !=null)"{{  $data->warrantyItemDetail->receivedDate }}" @endif >
                </fieldset>
                <fieldset class="form-group">
                    <label for="WRNno">WRN No :</label>
                    <input class="form-control" id="wrnno" type="text" name="wrnno"
                           value=@if($data->job_type == "warranty"and $data->warrantyItemDetail !=null)"{{  $data->warrantyItemDetail->wrnNo  }}" @endif >
                </fieldset>
            </div>
            <div class="col-lg-12" id="repair_div">
                <h5>Repair :</h5>
                <fieldset class="form-group">
                    <label for="receivedRepair">Received :</label>
                    <input class=" datepicker" id="receivedRepair" type="date" name="receivedRepair"
                           value=@if($data->job_type == "repair" and $data->repairItemDetail !=null)"{{$data->repairItemDetail->receiveDate}}"@endif>
                </fieldset>
                <fieldset class="form-group">
                    <label for="cost">Repair Cost :</label>
                    <input class="form-control" id="cost" type="text" name="repairCost"
                           value=@if($data->job_type == "repair"and $data->repairItemDetail !=null)"{{$data->repairItemDetail->repairCost}}"@endif >
                </fieldset>

            </div>
            <div class="col-lg-12">
                <h5>Replacement :</h5>
                <fieldset class="form-group">
                    <label for="replacement">Item Serial :</label>
                    <input  id="replacement" type="text" name="replacement"
                           value=@if( $data->replacement !=null)"{{$data->replacement->serial_number}}"@endif>
                </fieldset>

            </div>


        </div>
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <div class="collapsible-header"><i class="material-icons">perm_identity</i>Customer</div>
                <div class="collapsible-body">
                    <fieldset class="form-group ">
                        <label for="customer">Customer Name :</label>
                        <input class="form-control" id="customer" type="text" value="{{$customer->customerName}}"
                               readonly>
                    </fieldset>
                    <fieldset class="form-group ">
                        <label for="cusCotact">Contact No :</label>
                        <input class="form-control" id="cusCotact" type="text" value="{{$customer->contactNo}}"
                               readonly>
                    </fieldset>
                    <fieldset class="form-group ">
                        <label for="address">Customer Address :</label>
                        <input class="form-control" id="address" type="text" value="{{$customer->address}}"
                               readonly>
                    </fieldset>
                    <fieldset class="form-group ">
                        <label for="cusemail">Customer Email :</label>
                        <input class="form-control" id="cusEmail" type="text" value="{{$customer->email}}"
                               readonly>
                    </fieldset>


                </div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">shopping_basket</i>Item</div>
                <div class="collapsible-body">

                    <fieldset class="form-group">
                        <label for="itemName">Item Name:</label>
                        <input class="form-control" id="itemName" type="text" value="{{$item->item_name}}"
                               readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="serialNo">Serail Number :</label>
                        <input class="form-control" id="serialNo" type="text" value="{{$item->serial_number}}"
                               readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="unitcost">Unit cost:</label>
                        <input class="form-control" id="unitcost" type="text" value="{{$item->unit_cost}}"
                               readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="saleType">Sale type:</label>
                        <input class="form-control" id="saleType" type="text" value="{{$item->sale_type}}"
                               readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="warranty">warranty period:</label>
                        <input class="form-control" id="warranty" type="text" value="{{$item->warranty}}" readonly>
                    </fieldset>

                </div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">supervisor_account</i>Supplier</div>
                <div class="collapsible-body">
                    <fieldset class="form-group">
                        <label for="supplierName">Supplier Name:</label>
                        <input class="form-control" id="supplierName" type="text"
                               value="{{$supplier->supplier_name}}" readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="suppliercontact">Contact No:</label>
                        <input class="form-control" id="suppliercontact" type="text"
                               value="{{$supplier->contact_no}}" readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="supplieraddress">Address:</label>
                        <input class="form-control" id="supplieraddress" type="text" value="{{$supplier->address}}"
                               readonly>
                    </fieldset>

                </div>
            </li>
        </ul>
    </form>
    <script>$('.collapsible').collapsible();</script>
    <div class="btn-group-lg row">
        <button role="button" id="wcn_btn"    onclick="window.location='{{ route('wcn',['id'=>$data->id]) }}'" class="btn btn-lg btn-primary left  ">WCN</button>
        <button role="button" onclick="updateReturnRecord()" class="btn btn-lg btn-primary  right ">Apply</button>


    </div>
@endsection
<script type="text/javascript">
    var token = '{{Session::token()}}';
    var url3 = '{{route('editreturn')}}';
    var return_id='{{$data->id}}';

</script>