@if(count($errors)>0)
    <div>
        <div class="col-md-4 col-md-offset-4">
            <ul>
                <div class="alert alert-danger" role="alert" style="margin: 20px; text-align: center">Some fields are incorrect</div>
                {{--@foreach($errors->all() as $error)--}}
                    {{--<div class="alert alert-danger" role="alert">{{$error}}</div>--}}
                    {{--<li>{{$error}}</li>--}}
                {{--@endforeach--}}
            </ul>
        </div>
    </div>
@endif
