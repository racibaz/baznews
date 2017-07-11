<header class="main-header">

    <!-- Logo -->
    <a href="{!! route('dashboard') !!}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>{{substr(Cache::tags('Setting')->get('title'),0,1)}} </b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>{!! Cache::tags('Setting')->get('title') !!} </b></span>
        <span class="logo-lg"> {!! Cache::tags('Setting')->get('title') !!}  </span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="header"><a href="/" target="_blank" title="{{ trans('dashboard.web_site') }}"><i
                                class="fa fa-home"></i> {{ trans('dashboard.web_site') }} </a></li>
                @permission('removeHomePageCache-backend')
                    <li class="header">
                        <a href="{!! URL::route('removeHomePageCache') !!}"><i
                                    class="fa fa-trash-o"></i> {{ trans('dashboard.remove_home_page_cache') }} </a>
                    </li>
                @endpermission

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{\App\Models\User::getUserAvatar(Auth::user()->email,20)}}" alt="" class="img-rounded"/>
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <p>{{Auth::user()->name}}</p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('/account') }}" class="btn btn-default btn-flat"><i class="fa fa-user"></i>{{trans('account.profile')}}</a>
                            </div>
                            <div class="pull-right">


                                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> {{trans('common.logout')}}
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>