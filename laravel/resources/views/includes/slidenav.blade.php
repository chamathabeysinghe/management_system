
{{--<ul id="dropdown1" class="dropdown-content">--}}
    {{--<li><a href="#!">one</a></li>--}}
    {{--<li><a href="#!">two</a></li>--}}
    {{--<li class="divider"></li>--}}
    {{--<li><a href="#!">three</a></li>--}}
{{--</ul>--}}
{{--<nav>--}}
    {{--<ul class="right hide-on-med-and-down">--}}
        {{--<li><a href="#!">First Sidebar Link</a></li>--}}
        {{--<li><a href="#!">Second Sidebar Link</a></li>--}}
    {{--</ul>--}}
    {{--<ul id="slide-out" class="side-nav ">--}}
        {{--<li><a href="#!">Project Management</a></li>--}}
        {{--<li><a href="#!">Second Sidebar Link</a></li>--}}
        {{--<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>--}}

    {{--</ul>--}}
    {{--<a href="#" data-activates="slide-out" class="button-collapse show-on-large" style="text-decoration : none;color: inherit;"><i class="material-icons">menu</i></a>--}}
{{--</nav>--}}

<div class="navbar-fixed ">

<nav class="teal lighten-2">

    <ul class="right hide-on-med-and-down" >
        <li><a href="#!" style="text-decoration: none; color: inherit;">First Sidebar Link</a></li>
        <li><a href="#!" style="text-decoration: none; color: inherit;">Second Sidebar Link</a></li>
        <li><a href="#}" style="text-decoration: none; color: inherit;">{{Auth::check()? \Illuminate\Support\Facades\Auth::User()->full_name:''}}</a></li>
    </ul>
    <ul id="slide-out" class="side-nav">
        {{--<li class="bold"><a href="#!" class="waves-effect waves-teal">First Sidebar Link</a></li>--}}
        {{--<li class="bold"><a href="#!" class="waves-effect waves-teal">Second Sidebar Link</a></li>--}}
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">

                <li>
                    <a class="collapsible-header waves-effect waves-teal">Quotation Management<i class="mdi-navigation-arrow-drop-down"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{route('newquotation')}}">New Quotation</a></li>
                            <li><a href="{{route('newsellingitem')}}">New Selling Item</a></li>
                            <li><a href="{{route('quotationsummary')}}">Quotation Summary</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="collapsible-header waves-effect waves-teal">Project Management<i class="mdi-navigation-arrow-drop-down"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a style="text-decoration: none;" href="{{route('project')}}">Projects</a></li>
                            <li><a style="text-decoration: none;"href="{{route('technicians')}}">Technicians</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a style="text-decoration: none; " class="collapsible-header waves-effect waves-teal">Dealer Management<i class="mdi-navigation-arrow-drop-down"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a style="text-decoration: none;" href="{{route('register_dealer')}}">Registration</a></li>
                            <li><a style="text-decoration: none;"href="{{route('new_stock')}}">Stock</a></li>
                            
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="collapsible-header waves-effect waves-teal">Return Management<i class="mdi-navigation-arrow-drop-down"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{route('returndashboard')}}">Return Dashboard</a></li>
                            <li><a href="{{route('newreturnitem')}}">New Return</a></li>
                            <li><a href="{{route('managereturnitem')}}">Manage Return</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
        </li>

    </ul>
    <a href="#" data-activates="slide-out" class="button-collapse show-on-large" style="text-decoration : none;color: inherit;"><i class="material-icons">menu</i></a>


</nav>
</div>