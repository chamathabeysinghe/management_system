<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">



    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{URL::to('css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{URL::to('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <link href="{{URL::to('css/editabletable.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>


</head>
<body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
{{--<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>--}}
{{--<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>--}}
{{--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>--}}
@include('includes.header')
@include('includes.slidenav')

<div class="container">
    @yield('content')
</div>
{{--<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>--}}
{{--<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}
{{--<script src="{{URL::to('src/js/app.js')}}"></script>--}}
{{--<script src="{{URL::to('src/js/jquery-2.2.3.min.js')}}"></script>--}}




<script src="{{URL::to('js/search.js')}}"></script>

<script src="{{URL::to('js/searchItems.js')}}"></script>
<script src="{{URL::to('js/Return.js')}}"></script>


<script src="{{URL::to('js/app.js')}}"></script>

{{--<script src="{{URL::to('js/editabletable.js')}}"></script>--}}
{{--<script src="{{URL::to('js/gpeditable.js')}}"></script>--}}
{{--<script src="{{URL::to('js/feditable.js')}}"></script>--}}
{{--<script src="{{URL::to('js/itemeditable.js')}}"></script>--}}
<script>
    $(".button-collapse").sideNav();

</script>


</body>
</html>
