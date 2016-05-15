@if($item == null)
    <h5 class="alert-danger center-align">No record found</h5>

@else
    @include('includes.message-block')

    <div class="container">
        {{--<form action="{{route('newreturn')}}" method="post">--}}
        <div id="form-errors">

        </div>
        <form id="form">
            <fieldset class="form-group ">
                <label for="item_id">Item serial :</label>
                <i class="material-icons prefix">mode_edit</i>
                <input class="form-control" id="item_id" name="item_id" type="text" value="{{$item->serial_number}}"
                       readonly>
                <input type="hidden" name="item_id" value="{{$item->serial_number}}"/>

            </fieldset>
            <fieldset class="form-group ">
                <label for="item_name">Item Description :</label>
                <i class="material-icons prefix">mode_edit</i>
                <input class="form-control" id="item_name" name="item_name" type="text" value="{{$item->item_name}}"
                       readonly>

            </fieldset>
            {{--<fieldset class="form-group">--}}
            {{--<label for="project">Issued project :</label>--}}
            {{--<input class="form-control" id="project" type="text" readonly>--}}
            {{--</fieldset>--}}
            <fieldset class="form-group ">
                <label for="supplier">Supplier :</label>
                <i class="material-icons prefix">account_circle</i>
                <input class="form-control" id="supplier" name="supplier" type="text"
                       value="{{$supplier->supplier_name}}" readonly>

            </fieldset>
            <fieldset class="form-group ">
                <label for="warrantyperiod">Warranty :</label>
                <i class="material-icons prefix">receipt</i>
                <input class="form-control" id="warrantyperiod" name="warrantyperiod" type="text"
                       value="{{$item->warranty}}" readonly>

            </fieldset>

            <fieldset class="form-group input-group ">
                <div class="row">
                    <p class="col-lg-6">
                        <input class="with gap" type="radio" id="warrantyselect" value="warranty" name="option">
                        <label for="warrantyselect">Warranty </label>
                    </p>
                    <p>
                        <input class="with gap" type="radio" id="repairselect" value="repair" name="option">
                        <label for="repairselect">repair </label>
                    </p>

                </div>
            </fieldset>
            <h4>Customer details :</h4>
            <fieldset class="form-group {{$errors->has('customer')?'has-error':''}}">

                <i class="material-icons prefix">account_circle</i>
                <input class="form-control" id="customer" name="customer" type="text"
                       value="{{Request::old('customer')}}">
                <label for="customer">Customer name :</label>
            </fieldset>
            <fieldset class="form-group  {{$errors->has('contact')?'has-error':''}}">

                <i class="material-icons prefix">phone</i>
                <input class="form-control" id="contact" name="contact" type="number"
                       value="{{Request::old('contact')}}">
                <label for="contact">Contact No :</label>
            </fieldset>
            <fieldset class=" form-group {{$errors->has('address')?'has-error':''}}">
                <i class="material-icons prefix">location_on</i>
                <input class="form-control" id="address" name="address" type="text"
                       value="{{Request::old('address')}}">
                <label for="address">Address :</label>
            </fieldset>
            <fieldset class="form-group {{$errors->has('email')?'has-error':''}}">

                <i class="material-icons prefix">email</i>
                <input class="form-control" id="email" name="email" type="email" value="{{Request::old('email')}}">
                <label for="email">Email :</label>
            </fieldset>
            <fieldset class="form-group ">
                <i class="material-icons prefix">mode_edit</i>
                <input class="form-control" id="remarks" name="remarks" type="text"
                       value="{{Request::old('remarks')}}">
                <label for="remarks">Remarks :</label>
            </fieldset>
            <fieldset class="form-group">
                <i class="material-icons prefix">mode_edit</i>
                <input id="replacement" type="text" name="replacement"
                       value=@if( $item->returnItemDetail !=null) yes @else no @endif readonly>
                <label for="replacement">Replacement :</label>
            </fieldset>

            <ul class="collapsible" data-collapsible="accordion">
                @if( $item->returnItemDetail !=null)
                    <li>
                        <div class="collapsible-header"><i class="material-icons">receipt</i>Return Details</div>
                        <div class="collapsible-body">
                            <div class="row">
                                <p class=" col s6">Return Id :</p>
                                <p class=" col s6">{{$item->returnItemDetail->id}}</p>
                            </div>
                            <div class="row">
                                <p class=" col s6">Returned Date :</p>
                                <p class=" col s6">{{$item->returnItemDetail->date}}</p>
                            </div>
                            <div class="row">
                                <p class=" col s6">Job type :</p>
                                <p class=" col s6">{{$item->returnItemDetail->job_type}}</p>
                            </div>
                            <div class="row">
                                <p class=" col s6 ">Remarks :</p>
                                <p class=" col s6 ">{{$item->returnItemDetail->remarks}}</p>
                            </div>
                        </div>
                    </li>
                @endif
                @if( $item->sale_type == 1)
                    @if($project != null)
                        <li>
                            <div class="collapsible-header"><i class="material-icons">receipt</i>project Details</div>
                            <div class="collapsible-body">
                                <div class="row">
                                    <p class=" col s6">Client :</p>
                                    <p class=" col s6">{{$project->client_name}}</p>
                                </div>
                                <div class="row">
                                    <p class=" col s6"> Date :</p>
                                    <p class=" col s6">{{$project->date}}</p>
                                </div>
                                <div class="row">
                                    <p class=" col s6">Description :</p>
                                    <p class=" col s6">{{$project->description}}</p>
                                </div>
                                <div class="row">
                                    <p class=" col s6 ">Remarks :</p>
                                    <p class=" col s6 ">{{$project->client_email}}</p>
                                </div>
                                <div class="row">
                                    <p class=" col s6 ">Remarks :</p>
                                    <p class=" col s6 ">{{$project->project_status}}</p>
                                </div>
                                <div class="row">
                                    <a class="waves-effect waves-light btn col s6"
                                       href="{{route('project.info',['project_id'=>$project->id])}}">View Project<i
                                                class="material-icons left">play_arrow</i></a>
                                </div>
                            </div>
                        </li>
                    @endif
                @endif
                @if( $item->sale_type == 2)
                    @if($dealer != null)
                        <li>
                            <div class="collapsible-header"><i class="material-icons">receipt</i>project Details</div>
                            <div class="collapsible-body">
                                <div class="row">
                                    <p class=" col s6">Client :</p>
                                    <p class=" col s6">{{$dealer->client_name}}</p>
                                </div>
                                <div class="row">
                                    <p class=" col s6"> Date :</p>
                                    <p class=" col s6">{{$dealer->date}}</p>
                                </div>
                                <div class="row">
                                    <p class=" col s6">Description :</p>
                                    <p class=" col s6">{{$dealer->description}}</p>
                                </div>
                                <div class="row">
                                    <p class=" col s6 ">Remarks :</p>
                                    <p class=" col s6 ">{{$dealer->client_email}}</p>
                                </div>
                                <div class="row">
                                    <p class=" col s6 ">Remarks :</p>
                                    <p class=" col s6 ">{{$dealer->project_status}}</p>
                                </div>
                                <div class="row">
                                    <a class="waves-effect waves-light btn col s6">View Project<i
                                                class="material-icons left">play_arrow</i></a>
                                </div>
                            </div>
                        </li>
                    @endif
                @endif

            </ul>


        </form>
        <div class="btn-group-lg row">
            <div class="col pull-right">

                <button type="submit" class="btn" onclick="saveReturnRecord()"><i class="material-icons right">save</i>Save
                </button>
                <input type="hidden" name="_token" value="{{Session::token()}}"/>
                {{--<a class="waves-effect waves-light btn"><i class="material-icons right">cancel</i>Cancel</a>--}}
            </div>
        </div>
        {{--</form>--}}
    </div>
    <script>
        var token = '{{Session::token()}}';
        var url2 = '{{route('newreturn')}}';
        $(document).ready(function () {
            $('.collapsible').collapsible({
                accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
            });
        });
    </script>

@endif

@if(null)
@else

@endif
