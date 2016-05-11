@if($item == null)
    <h5 class="alert-danger center-align">No record found</h5>

@else
    @include('includes.message-block')

        <div class="container">
         {{--<form action="{{route('newreturn')}}" method="post">--}}
                <div id="form-errors">

                </div>
            <form id="form">
                <fieldset class="form-group">
                    <label for="item_id">Item serial :</label>
                    <i class="material-icons prefix">mode_edit</i>
                    <input class="form-control" id="item_id" name="item_id" type="text" value="{{$item->serial_number}}" readonly>
                    <input type="hidden" name="item_id" value="{{$item->serial_number}}" />
                </fieldset>
                <fieldset class="form-group">
                    <label for="item_name">Item Description :</label>
                    <input class="form-control" id="item_name" name="item_name" type="text" value="{{$item->item_name}}" readonly>
                </fieldset>
                {{--<fieldset class="form-group">--}}
                    {{--<label for="project">Issued project :</label>--}}
                    {{--<input class="form-control" id="project" type="text" readonly>--}}
                {{--</fieldset>--}}
                <fieldset class="form-group">
                    <label for="supplier">Supplier :</label>
                    <input class="form-control" id="supplier" name="supplier" type="text" value="{{$supplier->supplier_name}}" readonly>
                </fieldset>
                <fieldset class="form-group">
                    <label for="warrantyperiod">Warranty :</label>
                    <input class="form-control" id="warrantyperiod" name="warrantyperiod" type="text" value="{{$item->warranty}}" readonly>
                </fieldset>

                <fieldset class="form-group ">
                    <div class="row">
                        <p class="col-lg-6">
                            <input class="with gap" type="radio" id="warrantyselect" name="warrantyselect" value="warranty" name="option">
                            <label for="warrantyselect">Warranty </label>
                        </p>
                        <p>
                            <input class="with gap" type="radio" id="repairselect" id="repairselect" value="repair" name="option">
                            <label for="repairselect">repair </label>
                        </p>

                    </div>


                </fieldset>
                <h4>Customer details :</h4>
                <fieldset class="form-group {{$errors->has('customer')?'has-error':''}}">
                    <label for="customer">Customer name :</label>
                    <input class="form-control" id="customer" name="customer" type="text"
                           value="{{Request::old('customer')}}">
                </fieldset>
                <fieldset class="form-group {{$errors->has('contact')?'has-error':''}}">
                    <label for="contact">Contact No :</label>
                    <input class="form-control" id="contact" name="contact" type="number"
                           value="{{Request::old('contact')}}">
                </fieldset>
                <fieldset class="form-group {{$errors->has('address')?'has-error':''}}">
                    <label for="address">Address :</label>
                    <input class="form-control" id="address" name="address" type="text"
                           value="{{Request::old('address')}}">
                </fieldset>
                <fieldset class="form-group {{$errors->has('email')?'has-error':''}}">
                    <label for="email">Email :</label>
                    <input class="form-control" id="email" name="email" type="email" value="{{Request::old('email')}}">
                </fieldset>
                <fieldset class="form-group ">
                    <label for="remarks">Remarks :</label>
                    <input class="form-control" id="remarks" name="remarks" type="text"
                           value="{{Request::old('remarks')}}">
                </fieldset>
            </form>
                <div class="btn-group-lg row">
                    <div class="col pull-right">

                        <button type="submit" class="btn" onclick="saveReturnRecord()"><i class="material-icons right">save</i>Save</button>
                        <input type="hidden" name="_token" value="{{Session::token()}}"/>
                        {{--<a class="waves-effect waves-light btn"><i class="material-icons right">cancel</i>Cancel</a>--}}
                    </div>
                </div>
            {{--</form>--}}
        </div>
    <script>
        var token = '{{Session::token()}}';
        var url2 = '{{route('newreturn')}}';
    </script>

@endif

