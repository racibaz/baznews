<div id="sticky-container" class="adverts">
    <div id="dfp-pageskin-sol" class="ads-left-160 ads">
        {!! Cache::tags('Setting', 'Advertisement')->get('left') !!}
    </div>
    <div id="dfp-160-kare-sag" class="ads-right-160 ads">
        {!! Cache::tags('Setting', 'Advertisement')->get('right') !!}
    </div>
</div>
<!-- Header -->
<header id="header">
    <nav class="navbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" id="navbar-header">
            <div class="container">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#main-navbar-menu" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{!! route('index') !!}">
                    <img src="{{ asset('img/logo.jpg') }}" alt="Logo" width="130" height="120" class="img-responsive"/>
                </a>

                <div class="pull-right hright">

                    <div class="login-btns">
                        <div class="btn-group">
                            <a href="{!! route('login') !!}" class="btn btn-success btn-xs"><i
                                        class="glyphicon glyphicon-log-in"></i> {{trans('common.login')}}</a>
                            <a href="{!! route('register') !!}" class="btn btn-primary btn-xs"><i
                                        class="glyphicon glyphicon-floppy-disk"></i> {{trans('common.register')}}</a>
                        </div><!-- /.btn-group -->
                    </div><!-- /.login-btns -->

                    <div class="search">
                        {!! Form::open(array('route' => 'search', 'method' => 'post','class' => 'form')) !!}
                        {!!  Form::text('q', null, ['placeholder'=>'Ara.','class' => 'ft','onblur'=>"if(this.value=='') this.value='Ara.';","onfocus"=>"if(this.value=='Ara.') this.value='';"]) !!}
                        {{--<input type="q" value="Ara." onblur="if(this.value=='') this.value='Ara.';" onfocus="if(this.value=='Ara.') this.value='';" class="ft">--}}
                        <input type="submit" value="" class="fs">
                        {!!Form::close() !!}
                    </div><!-- /.search -->

                </div><!-- /.hright -->

                <div class="advert-header pull-right hidden-xs">
                    {!! Cache::tags('Setting', 'Advertisement')->get('header_1') !!}
                </div>
            </div><!-- /.container -->
        </div><!-- /.navbar-header -->
        <div class="menu">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-navbar-menu">
                <div class="container">
                    <ul class="nav navbar-nav">
                        @foreach(Cache::tags(['Setting', 'Menu'])->get('header_menus') as $menu)
                            @if(!empty($menu->route))
                                <li><a href="{!! url($menu->route) !!}"
                                       target="{{$menu->target}}">{!! $menu->icon !!} {{$menu->name}}</a></li>
                            @elseif(!empty($menu->url))
                                <li><a href="{{$menu->url}}"
                                       target="{{$menu->target}}">{!! $menu->icon !!} {{$menu->name}} </a></li>
                            @elseif(!empty($menu->page->id))
                                <li><a href="{!! route('page',['slug' => $menu->page->slug ]) !!}"
                                       title="{{$menu->name}}"
                                       target="{{$menu->target}}">{!! $menu->icon !!} {{$menu->name}}</a></li>
                            @endif
                        @endforeach
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alt Menü <b
                                        class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Örnek Bağlantı-1</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Örnek Bağlantı-2</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
@include($activeTheme . '::frontend.partials._breaking_news', ['breakNewsItems' => $breakNewsItems ])
