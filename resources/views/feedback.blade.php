{{--This view is to take feedback from a client--}}

@extends('layouts.master')
@section('title')
    Feedback Form
    @endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3>Client feedback form</h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="contact">How did you contact representative?</label>
                    <input class="form-control" type="radio" name="contact" value="In person" checked> In person<br>
                    <input class="form-control" type="radio" name="contact" value="By telephone"> By telephone<br>
                    <input class="form-control" type="radio" name="contact" value="Internet"> Internet<br><br>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


    @endsection