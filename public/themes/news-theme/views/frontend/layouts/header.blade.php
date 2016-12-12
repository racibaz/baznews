<!-- Header -->
<header>
    <nav class="navbar">
        <div id="sticky-container" class="adverts">
            <div id="dfp-pageskin-sol" class="ads-left-160 ads" style="position: absolute;left: 85px;top: 0;">
                <img src="{{ Theme::asset($activeTheme . '::img/ads-image1.jpeg')}}" alt="">
            </div>
            <div id="dfp-160-kare-sag" class="ads-right-160 ads" style="position: absolute; right: 84px; top: 0;">
                <img src="{{ Theme::asset($activeTheme . '::img/ads-image1.jpeg')}}" alt="">
            </div>
        </div>
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" id="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-menu" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{!! route('index') !!}">
                    <img src="{{ Theme::asset($activeTheme . '::img/news-theme-logo.jpg') }}" alt="Logo" width="130" height="120" />
                </a>
                <div class="search pull-right">
                    <form action="#" method="get">
                        <input type="text" value="Ara." onblur="if(this.value=='') this.value='Ara.';" onfocus="if(this.value=='Ara.') this.value='';" class="ft">
                        <input type="submit" value="" class="fs">
                    </form>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-navbar-menu">
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
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
<!-- /.container -->