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
                {{--@if(Auth::user()->user_type==1)--}}
                    <li>
                        <a class="waves-effect waves-teal" href="{{route('newuser')}}">New User</a>

                    </li>
                {{--@endif--}}


            </ul>
        </li>

    </ul>
    <a href="#" data-activates="slide-out" class="button-collapse show-on-large" style="text-decoration : none;color: inherit;"><i class="material-icons">menu</i></a>


</nav>
</div>