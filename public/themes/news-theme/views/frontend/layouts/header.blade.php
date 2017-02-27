<div id="sticky-container" class="adverts">
    <div id="dfp-pageskin-sol" class="ads-left-160 ads">
        <img src="{{ Theme::asset($activeTheme . '::img/ads-image1.jpeg')}}" alt="">
    </div>
    <div id="dfp-160-kare-sag" class="ads-right-160 ads">
        <img src="{{ Theme::asset($activeTheme . '::img/ads-image1.jpeg')}}" alt="">
    </div>
</div>
<!-- Header -->
<header id="header">
    <nav class="navbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" id="navbar-header">
            <div class="container">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-menu" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{!! route('index') !!}">
                    <img src="{{ Theme::asset($activeTheme . '::img/news-theme-logo.jpg') }}" alt="Logo" width="130" height="120" />
                </a>

                <div class="pull-right hright">
                    <div class="search">
                        {!! Form::open(array('route' => 'search', 'method' => 'post','class' => 'form')) !!}
                        {!!  Form::text('q', null, ['placeholder'=>'Ara.','class' => 'ft','onblur'=>"if(this.value=='') this.value='Ara.';","onfocus"=>"if(this.value=='Ara.') this.value='';"]) !!}
                        {{--<input type="q" value="Ara." onblur="if(this.value=='') this.value='Ara.';" onfocus="if(this.value=='Ara.') this.value='';" class="ft">--}}
                        <input type="submit" value="" class="fs">
                        {!!Form::close() !!}
                    </div>
                    <div class="login-btns">
                        <div class="btn-group">
                            <a href="{!! route('login') !!}" class="btn btn-success"><i class="glyphicon glyphicon-log-in"></i> {{trans('common.login')}}</a>
                            <a href="{!! route('register') !!}" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> {{trans('common.register')}}</a>
                        </div><!-- /.btn-group -->
                    </div><!-- /.login-btns -->
                </div><!-- /.hright -->

                <div class="advert-header pull-right">
                    <img src="{{ Theme::asset($activeTheme . '::img/advert-images/728x90.png') }}" alt="Advert Header">
                </div>


            </div>
        </div><!-- /.navbar-header -->
        <div class="menu">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-navbar-menu">
                <div class="container">
                    <ul class="nav navbar-nav">

                        @foreach($cuffNewsCategories as $cuffNewsCategory)
                            <li>
                                <a href="{!! route('show_news_category', ['newsCategorySlug' => $cuffNewsCategory->slug]) !!}">{{$cuffNewsCategory->name}}</a>
                            </li>
                        @endforeach

                        {{--<li class="current"><a href="new-details.html">{{$cuffNewsCategory->title}}</a></li>--}}
                        {{--<li><a href="new-details.html">SPOR</a></li>--}}
                        {{--<li><a href="new-details.html">SİYASET</a></li>--}}
                        {{--<li><a href="new-details.html">HAYAT</a></li>--}}
                        {{--<li><a href="new-details.html">SAĞLIK</a></li>--}}
                        {{--<li><a href="new-details.html">DİN</a></li>--}}
                    </ul>
                </div>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
