@if($returnDatas  !=null and  $customers != null and $items!=null and  $supplier!=null )

    @foreach($returnDatas->reverse() as $data)
        {{--{{--}}
        {{--$_SESSION['data'] = $data;--}}
         {{--$_SESSION['customer'] = $customers;--}}
         {{--$_SESSION['item'] = $items;--}}
         {{--$_SESSION['supplier'] = $supplier;--}}
        {{--}}--}}
        <div class="row">
            <div class="col s12 ">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Job No : {{$data->id}} Item : {{$items->serial_number}}</span>
                        <p> {{$customers->customerName}} returned a {{$items->item_name}} on {{$data->date}}</p>

                    </div>
                    <div class="card-action">

                        <a href="{{route('manageareturnitem',['id'=>$data->id])}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

@endif