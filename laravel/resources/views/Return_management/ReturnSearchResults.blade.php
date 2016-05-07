@if($returnDatas->isEmpty() or $customers->isEmpty() or $items->isEmpty())
    <h5 class="alert-danger center-align">No record found</h5>

@else
    @foreach($returnDatas as $returnData)
        @foreach($customers as $customer)
            @foreach($items as $item)
        <div class="row">
            <fieldset class="form-group col-lg-6">
                <label for="Customer">Customer :</label>
                <input class="form-control" id="customer" type="text"  value="{{$customer->customerName}}"readonly>
            </fieldset>
            <fieldset class="form-group col-lg-6">
                <label for="contact">Contact no :</label>
                <input class="form-control" id="contact" type="text" value="{{$customer->contactNo}}" readonly>
            </fieldset>
            <fieldset class="form-group">
                <label for="item">Item :</label>
                <input class="form-control" id="item" type="text" value="{{$item->item_name}}" readonly>
            </fieldset>
            <fieldset class="form-group">
                <label for="job">Job type :</label>
                <input class="form-control" id="job" type="text"  value="{{$returnData->status}}"readonly>
            </fieldset>

        </div>
        <div class="row">
            <div class="col-lg-6">
                <h5>Warranty :</h5>
                <fieldset class="form-group">
                    <label for="WCNno">WCN No :</label>
                    <input class="form-control" id="wcnno" type="text">
                </fieldset>
                <fieldset class="form-group">
                    <label for="WCNdate">WCN issue date :</label>
                    <input class="form-control" id="wcndate" type="text">
                </fieldset>
                <fieldset class="form-group">
                    <label for="received">Received :</label>
                    <input class="form-control" id="received" type="text">
                </fieldset>
                <fieldset class="form-group">
                    <label for="WRNno">WRN No :</label>
                    <input class="form-control" id="wrnno" type="text">
                </fieldset>
            </div>
            <div class="col-lg-offset-6">
                <h5>Repair :</h5>
                <fieldset class="form-group">
                    <label for="receivedRepair">Received :</label>
                    <input class="form-control" id="receivedRepair" type="text">
                </fieldset>
                <fieldset class="form-group">
                    <label for="cost">Repair Cost :</label>
                    <input class="form-control" id="cost" type="text">
                </fieldset>

            </div>



        </div>
        <div class="btn-group-lg row">
            <button type="submit" role="button" class="btn btn-lg btn-primary left  ">WCN</button>
            <button type="submit" role="button" class="btn btn-lg btn-primary left ">Close Job</button>
            <button type="submit" role="button" class="btn btn-lg btn-primary right ">Cancel</button>
            <button type="submit" role="button" class="btn btn-lg btn-primary  right ">Apply</button>


        </div>

    @endforeach
    @endforeach
    @endforeach
@endif
