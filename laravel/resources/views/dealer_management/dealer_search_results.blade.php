@include('includes.message-block')

<div class="row">
    {{$dealer->first_name}} {{$dealer->last_name}}
</div>
<div class="row">
    {{'Tel'}}   {{$dealer->telephone_no}}
</div>



@foreach($stocks as $stock)

    <div class="row">
        <p>Stock</p>

        {{$stock->date}}

        <div class="row">
            <div id="s_table" class="table-editable">

                <table class="table highlight bordered">
                    <thead>
                    <tr>

                        <th data-field="item_code">Item Code</th>
                        <th class="left-align" data-field="item_name">Item Name</th>
                        <th class="left-align" data-field="serial_no">Serial No</th>
                        <th class="left-align" data-field="unit_price">Unit Price</th>
                        <th class="left-align" data-field="quantity">Quantity</th>
                        <th class="left-align" data-field="total_cost">Total Cost</th>

                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <!-- This is our clonable table line -->
                    <?php
                    $stockFields = unserialize($stock->stock_field);
                    foreach ($stockFields as $field) {

                    }
                    ?>
                    @foreach($stockFields as $field)
                        <tr>


                            <td contenteditable="false">{{$field->itemCode}}</td>
                            <td contenteditable="false">{{$field->itemName}}</td>
                            <td contenteditable="false">{{$field->serialNo}}</td>
                            <td contenteditable="false">{{$field->unitCost}}</td>
                            <td contenteditable="false">{{$field->quantity}}</td>
                            <td contenteditable="false">{{$field->totalCost}}</td>


                        </tr>
                    @endforeach

                    <tr class="not-write">

                        <td contenteditable="true">Total</td>
                        <td class="right-align" contenteditable="true"></td>
                        <td class="right-align" contenteditable="true"></td>
                        <td class="right-align" contenteditable="true"></td>
                        <td class="right-align" contenteditable="true"></td>
                        <td class="right-align" id="final-value" contenteditable="true">{{$stock->total_cost}}</td>


                        <td>
                            </span>
                        </td>
                        <td>

                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
@endforeach

