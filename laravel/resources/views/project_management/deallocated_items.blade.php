@extends('layouts.master')
@section('title')
    Project Information
@endsection
@section('content')
    <div id="items" class="section">
        <h5>Allocated Items</h5>
        <div class="divider"></div>
        <div class="row">
            <div class="col s12 m6">
                <div id="item_table" class="table-editable">

                    <table class="table highlight bordered">
                        <thead>
                        <tr>

                            <th data-field="item">Item</th>
                            <th class="right-align" data-field="serial">Serial Number</th>

                        </tr>
                        </thead>


                        @foreach($items as $item)
                            @if($item->return_state==1)
                            <tr>

                                <td id="name{{$item->id}}" contenteditable="true">{{$item->item_name}}</td>
                                <td id="serial{{$item->id}}"class="right-align" contenteditable="true">{{$item->serial_number}}</td>
                            </tr>
                            @endif
                        @endforeach



                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <form action="{{Route('sendtostore')}}" method="post">
            <button class="btn waves-effect waves-light" type="submit" id="item_save">Return All
                <i class="material-icons right">send</i>
            </button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>

    </div>
    <script>

    </script>
@endsection