<section class="container">
    <header class="header fixed-top clearfix">
     <div class="brand">
        <a href="{{ url('/') }}" class="logo"> Admin Panel </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>

    <div class="top-nav">
        <ul class="nav navbar-nav navbar-right">
           @if (Auth::guest())
           <li><a href="{{ url('/login') }}">{{ trans('static.login') }}</a></li>
           @else
           <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: relative;padding-left: 50px; "> <img src="/upload/avatars/{{Auth::user()->avatar}}" > {{ Auth::user()->name }} <span class="caret"></span> </a>
            <ul class="dropdown-menu" role="menu">
               <li> <a href="{{ url('/users/editProfile ') }}"> {{ trans('static.edit_my_profile') }} </a> </li>
               <li> <a href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ trans('static.logout') }} </a> <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }} </form> </li>
            </ul>
        </li>
        @endif
    </ul>
</div>
</header>
</section><!--\* End Top Menu -->


<div class="row">
    <div id="sidebar" class="nav-collapse md-box-shadowed col-md-2">
        <!-- sidebar menu start-->
        <div class="leftside-navigation leftside-navigation-scroll" style="overflow: hidden; outline: none;" tabindex="5000">
            <ul class="sidebar-menu" id="nav-accordion">
                @if (Auth::check())
                <li class="sidebar-profile">
                    <div class="profile-main">
                        <p class="text-right profile-options"><i class="profile-options-open icon-options-vertical fa-2x"></i></p>
                        <p class="image">  <img alt="image" src="/upload/avatars/{{ Auth::user()->avatar}}" width="80"> <span class="status"><i class="fa fa-circle text-success"></i></span> </p>
                        <p> <span class="name">{{Auth::user()->name}}</span><br> <span class="position" style="font-family: monospace;">{{Auth::user()->role}}</span> </p>
                    </div>
                </li>
                @endif

                <li class=" "><a  class="hvr-bounce-to-right-sidebar-parent {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}"><span class="fa fa-home icon-sidebar icon-home fa-2x"></span><span> {{ trans('static.dashboard') }}</span></a> </li>
                <li class="sub-menu  dcjq-parent-li"><a href="1" class="hvr-bounce-to-right-sidebar-parent dcjq-parent"><span class="fa fa-desktop fa-2x"></span><span>Layouts</span><span class="fa dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li > <a class="{{ Request::is('pages*') ? 'active' : '' }}" href="{{ route('pages.index') }}">{{ trans('static.page') }}</a></li>
                        <li > <a class="{{ Request::is('categories*') ? 'active' : '' }}"   href="{{ route('categories.index') }}">{{ trans('static.category') }}</a></li>
                        <li > <a class="{{ Request::is('blocks*') ? 'active' : '' }}"  href="{{ route('blocks.index') }}">{{ trans('static.block') }}</a></li>
                        <li > <a class="{{ Request::is('sliders*') ? 'active' : '' }}"  href="{{ route('sliders.index') }}">{{ trans('static.slider') }}</a></li>
                        <li > <a class="{{ Request::is('general/settings*') ? 'active' : '' }}"  href="{{ route('settings.create') }}">{{ trans('static.general_settings') }}</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('users.index') }}" class="hvr-bounce-to-right-sidebar-parent {{ Request::is('users*') ? 'active' : '' }}"><span class="icon-sidebar fa fa-users fa-2x"></span><span>{{ trans('static.user') }}</span></a> </li>
                <li><a href="{{ route('posts.index') }}" class="hvr-bounce-to-right-sidebar-parent {{ Request::is('posts*') ? 'active' : '' }}"><span class="icon-sidebar fa fa-eercast fa-2x"></span><span>{{ trans('static.post') }}</span></a> </li>
                <li><a href="{{ route('comments.index')}}" class="hvr-bounce-to-right-sidebar-parent {{ Request::is('comments*') ? 'active' : ''}}""><span class="icon-sidebar fa fa-comments-o fa-2x"></span><span>{{ trans('static.comment') }}</span></a></li>
                <li><a href="{{ route('feedbacks.index') }}" class="hvr-bounce-to-right-sidebar-parent {{ Request::is('feedbacks*') ? 'active' : ''}}"><span class="icon-sidebar fa fa-envelope fa-2x"></span><span>{{ trans('static.feedback') }}</span></a> </li>
            </ul>           
        </div>
    </div>

    <div class="col-md-10">
        <div class="container top-page-header">
            <div class="page-title"> <h2>Theme Dashboard</h2>  <small>Your admin dashboard.</small> </div>
            <div class="page-breadcrumb">
                <nav class="c_breadcrumbs">
                    <ul>
                        <li><a href="{{url('/dashboard')}}">{{trans('static.dashboard')}}</a></li>
                        <li class="active"> <a href="{{Route::current()->getUri()}}"> @yield('title')</a> </li>
                    </ul>
                </nav>
            </div>
        </div>


        <script src="{{ theme('js/global-plugins.js') }}"></script>
        <script src="{{ theme('js/theme.js') }}"></script>

        <script type="text/javascript">


            $(document).ready(function(){
                new WOW().init();

                App.initPage();
                App.initLeftSideBar();
                App.initCounter();
                App.initNiceScroll();
                App.initPanels();
                App.initProgressBar();
                App.initSlimScroll();
                App.initNotific8();
                App.initTooltipster();
                App.initStyleSwitcher();
                App.initMenuSelected();
                App.initRightSideBar();
                App.initEmail();
                App.initSummernote();
                App.initAccordion();
                App.initModal();
                App.initPopover();
                App.initOwlCarousel();
                App.initWidgets();




            });
        </script>




