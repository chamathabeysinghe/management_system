@if($returnDatas  !=null and  $customers != null and $items!=null and  $supplier!=null )
    @foreach($returnDatas as $data)

        <div class="row">
            <fieldset class="form-group col-lg-6">
                <label for="Customer">Customer :</label>
                <input class="form-control" id="customer" type="text"  value="{{$customers->customerName}}"readonly>
            </fieldset>
            <fieldset class="form-group col-lg-6">
                <label for="contact">Contact no :</label>
                <input class="form-control" id="contact" type="text" value="{{$customers->contactNo}}" readonly>
            </fieldset>
            <fieldset class="form-group">
                <label for="item">Item :</label>
                <input class="form-control" id="item" type="text" value="{{$items->item_name}}" readonly>
            </fieldset>
            <fieldset class="form-group">
                <label for="job">Job type :</label>
                <input class="form-control" id="job" type="text"  value="{{$data->job_type}}"readonly>
            </fieldset>

        </div>
        <div class="row">

            <div class="col-lg-6">
                <h5>Warranty :</h5>
                <fieldset class="form-group">
                    <label for="WCNno">WCN No :</label>
                    <input class="form-control" id="wcnno"  type="text" value=@if($data->job_type == "warranty")"{{  $data->warrantyItemDetail->wcnNo  }}" @endif>
                </fieldset>
                <fieldset class="form-group">
                    <label for="WCNdate">WCN issue date :</label>
                    <input class="form-control" id="wcndate" type="text" value=@if($data->job_type == "warranty")"{{  $data->warrantyItemDetail->wcnIssueDate  }}" @endif >
                </fieldset>
                <fieldset class="form-group">
                    <label for="received">Received :</label>
                    <input class="form-control" id="received" type="text" value=@if($data->job_type == "warranty")"{{  $data->warrantyItemDetail->receivedDate }}" @endif >
                </fieldset>
                <fieldset class="form-group">
                    <label for="WRNno">WRN No :</label>
                    <input class="form-control" id="wrnno" type="text" value=@if($data->job_type == "warranty")"{{  $data->warrantyItemDetail->wrnNo  }}" @endif >
                </fieldset>
            </div>
            <div class="col-lg-offset-6">
                <h5>Repair :</h5>
                <fieldset class="form-group">
                    <label for="receivedRepair">Received :</label>
                    <input class="form-control" id="receivedRepair" type="text" value=@if($data->job_type == "repair")"{{$data->repairItemDetail->receiveDate}}"@endif>
                </fieldset>
                <fieldset class="form-group">
                    <label for="cost">Repair Cost :</label>
                    <input class="form-control" id="cost" type="text" value=@if($data->job_type == "repair")"{{$data->repairItemDetail->repairCost}}"@endif >
                </fieldset>

            </div>



        </div>
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <div class="collapsible-header"><i class="material-icons">perm_identity</i>Customer</div>
                <div class="collapsible-body">
                    <fieldset class="form-group ">
                        <label for="customer">Customer Name :</label>
                        <input class="form-control" id="customer" type="text"  value="{{$customers->customerName}}"readonly>
                    </fieldset>
                    <fieldset class="form-group ">
                        <label for="cusCotact">Contact No :</label>
                        <input class="form-control" id="cusCotact" type="text"  value="{{$customers->contactNo}}"readonly>
                    </fieldset>
                    <fieldset class="form-group ">
                        <label for="address">Customer Address :</label>
                        <input class="form-control" id="address" type="text"  value="{{$customers->address}}"readonly>
                    </fieldset>
                    <fieldset class="form-group ">
                        <label for="cusemail">Customer Email :</label>
                        <input class="form-control" id="cusEmail" type="text"  value="{{$customers->email}}"readonly>
                    </fieldset>


                </div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">shopping_basket</i>Item</div>
                <div class="collapsible-body">

                    <fieldset class="form-group">
                        <label for="itemName">Item Name:</label>
                        <input class="form-control" id="itemName" type="text" value="{{$items->item_name}}" readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="serialNo">Serail Number :</label>
                        <input class="form-control" id="serialNo" type="text" value="{{$items->serial_number}}" readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="unitcost">Unit cost:</label>
                        <input class="form-control" id="unitcost" type="text" value="{{$items->unit_cost}}" readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="saleType">Sale type:</label>
                        <input class="form-control" id="saleType" type="text" value="{{$items->sale_type}}" readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="warranty">warranty period:</label>
                        <input class="form-control" id="warranty" type="text" value="{{$items->warranty}}" readonly>
                    </fieldset>

                </div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">supervisor_account</i>Supplier</div>
                <div class="collapsible-body">
                    <fieldset class="form-group">
                        <label for="supplierName">Supplier Name:</label>
                        <input class="form-control" id="supplierName" type="text" value="{{$supplier->supplier_name}}" readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="suppliercontact">Contact No:</label>
                        <input class="form-control" id="suppliercontact" type="text" value="{{$supplier->contact_no}}" readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="supplieraddress">Address:</label>
                        <input class="form-control" id="supplieraddress" type="text" value="{{$supplier->address}}" readonly>
                    </fieldset>

                </div>
            </li>
        </ul>
        <div class="btn-group-lg row">
            <button type="submit" role="button" class="btn btn-lg btn-primary left  ">WCN</button>
            <button type="submit" role="button" class="btn btn-lg btn-primary left ">Close Job</button>
            <button type="submit" role="button" class="btn btn-lg btn-primary right ">Cancel</button>
            <button type="submit" role="button" class="btn btn-lg btn-primary  right ">Apply</button>


        </div>

        <script>$('.collapsible').collapsible();</script>

        @endforeach
@else
    <h5 class="alert-danger center-align">No record found</h5>
@endif