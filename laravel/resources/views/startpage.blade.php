@extends('layouts.master')
@section('title')
    New User
@endsection
@section('content')
    <body>

    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br>
            <h1 class="header center orange-text">Digital Engineering Solutions </h1>
            <div class="row center">
                <h5 class="header col s12 light">Information Management System</h5>
            </div>
            <div class="row center">
                <a href="http://www.des.lk" id="download-button"
                   class="btn-large waves-effect waves-light orange">Visit Our Site</a>
            </div>
            <br><br>

        </div>
    </div>


    <div class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m3">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
                        <h5 class="center">Quotation Management</h5>

                        <p class="light">Easy and fast way to handle quotations and initialize a project</p>

                    </div>
                </div>
                <div class="col s12 m3">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
                        <h5 class="center">Project Management</h5>

                        <p class="light">One place for handling everything regarding projects. </p>

                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                        <h5 class="center">Dealer Management</h5>

                        <p class="light">Register new dealers and handle stocks</p>

                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
                        <h5 class="center">Return Management</h5>

                        <p class="light">Manage all the return items. Send them for repair or claim warranty</p>

                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col s12 m3 offset-m3"><a href="{{route('project')}}" id="download-button"
                                           class="btn-large waves-effect waves-light orange">Project</a></div>

                <div class="col s12 m3 offset-m3"><a href="{{route('returndashboard')}}" id="download-button"
                                           class="btn-large waves-effect waves-light orange">Return</a></div>

            </div>

        </div>
        <br><br>

        <div class="section">

        </div>
    </div>




    <!--  Scripts-->
    <script src="js/init.js"></script>

    </body>
@endsection