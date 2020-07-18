<nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0px">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'M.D.B CMS') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">

               

                <li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ route('dashboard') }}">{{ trans('static.dashboard') }}</a></li>
                <li class="{{ Request::is('pages*') ? 'active' : '' }}"><a href="{{ route('pages.index') }}">{{ trans('static.page') }}</a></li>
                <li class="{{ Request::is('users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}">{{ trans('static.user') }}</a></li>
                <li class="{{ Request::is('categories*') ? 'active' : '' }}" ><a href="{{ route('categories.index') }}">{{ trans('static.category') }}</a></li>
                <li class="{{ Request::is('posts*') ? 'active' : '' }}"><a href="{{ route('posts.index') }}">{{ trans('static.post') }}</a></li>
                <li class="{{ Request::is('blocks*') ? 'active' : '' }}"><a href="{{ route('blocks.index') }}">{{ trans('static.block') }}</a></li>
                <li class="{{ Request::is('comments*') ? 'active' : '' }}"><a href="{{ route('comments.index') }}">{{ trans('static.comment') }}</a></li>
                <li class="{{ Request::is('general/settings*') ? 'active' : '' }}"><a href="{{ route('settings.create') }}">{{ trans('static.general_settings') }}</a></li>
                <li class="{{ Request::is('sliders*') ? 'active' : '' }}"><a href="{{ route('sliders.index') }}">{{ trans('static.slider') }}</a></li>
                <li class="{{ Request::is('feedbacks*') ? 'active' : '' }}"><a href="{{ route('feedbacks.index') }}">{{ trans('static.feedback') }}</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">{{ trans('static.login') }}</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: relative;padding-left: 50px; ">
                       <img src="/upload/avatars/{{Auth::user()->avatar}}" style="width: 32px; height: 32px; position: absolute;top:10px; left:10px; border-radius: 50%;">

                       {{ Auth::user()->name }} <span class="caret"></span>
                   </a>

                   <ul class="dropdown-menu" role="menu">
                       <li>

                        <a href="{{ url('/users/editProfile ') }}">
                            {{ trans('static.edit_my_profile') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ trans('static.logout') }}
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

            </ul>
        </li>
        @endif
        <li></li>
        @if (App::isLocale('en'))
        <li>
            <a href="{{ URL::to('language') }}/bd"> <span class="flag-icon flag-icon-bd"></span> {{ trans('static.bangla') }}</a>
        </li>
        @else
        <li><a href="{{ URL::to('language') }}/en"> <span class="flag-icon flag-icon-us""></span> {{ trans('static.english') }}</a></li>
        @endif

    </ul>
</div>
</div>
</nav>