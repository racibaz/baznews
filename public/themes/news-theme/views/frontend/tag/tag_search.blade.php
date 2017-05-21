@extends($activeTheme . '::frontend.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include($activeTheme . '::frontend.partials._breaking_news', ['breakNewsItems' => $breakNewsItems ])
            </div>
        </div>
    </div>
    <article class="container" id="container">

        <div class="tag-header module">
            <h1>
                <span class="label label-info">{{$record->name}}</span> etiketine sahip sonuçlar..
            </h1>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="tag-news-list">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title-section">
                                <h1>
                                    <span>Haberler</span>
                                </h1>
                            </div>
                            @foreach($record->news as $news)
                                <div class="news-box module">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-3 col-xs-4">
                                            <div class="frame-image">
                                                <a href="{!! route('show_news', ['slug' => $news->slug]) !!}">
                                                    <img src="http://baznews.app/images/news_images/2/196x150_2.jpg" alt="{{$news->title}}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-9 col-xs-8">
                                            <div class="news-right-txt">
                                                <a href="{!! route('show_news', ['slug' => $news->slug]) !!}">
                                                    <h2>{{$news->title}}</h2>
                                                </a>
                                                <div class="news-meta-left">
                                                    <a href="#" class="meta-date" title=""><i class="fa fa-clock-o"></i> 9 Şubat 2017</a>
                                                </div>
                                                <div class="news-excerpt">
                                                    <p>{{$news->spot}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title-section">
                                <h1>
                                    <span>Videolar</span>
                                </h1>
                            </div>
                            @foreach($record->videos as $video)
                                <div class="news-box module">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-3 col-xs-4">
                                            <div class="frame-image">
                                                <a href="{!! route('show_news', ['slug' => $video->slug]) !!}">
                                                    <img src="http://baznews.app/images/news_images/2/196x150_2.jpg" alt="{{$video->name}}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-9 col-xs-8">
                                            <div class="news-right-txt">
                                                <a href="{!! route('show_news', ['slug' => $video->slug]) !!}">
                                                    <h2>{{$video->name}}</h2>
                                                </a>
                                                <div class="news-meta-left">
                                                    <a href="#" class="meta-date" title=""><i class="fa fa-clock-o"></i> 9 Şubat 2017</a>
                                                </div>
                                                <div class="news-excerpt">
                                                    <p>{{$video->excerpt}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title-section">
                                <h1>
                                    <span>Foto Galeri</span>
                                </h1>
                            </div>
                            @foreach($record->photo_galleries as $photoGallery)
                                <div class="news-box module">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-3 col-xs-4">
                                            <div class="frame-image">
                                                <a href="{!! route('show_news', ['slug' => $photoGallery->slug]) !!}">
                                                    <img src="http://baznews.app/images/news_images/2/196x150_2.jpg" alt="{{$photoGallery->tinametle}}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-9 col-xs-8">
                                            <div class="news-right-txt">
                                                <a href="{!! route('show_news', ['slug' => $photoGallery->slug]) !!}">
                                                    <h2>{{$photoGallery->name}}</h2>
                                                </a>
                                                <div class="news-meta-left">
                                                    <a href="#" class="meta-date" title=""><i class="fa fa-clock-o"></i> 9 Şubat 2017</a>
                                                </div>
                                                <div class="news-excerpt">
                                                    <p>{{$photoGallery->excerpt}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div><!-- /.tag-news-list -->
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="nw-sm-img module">
                        <div role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a>
                                </li>
                                <li role="presentation">
                                    <a href="#son_dakika" aria-controls="son_dakika" role="tab" data-toggle="tab">Son Dakika</a>
                                </li>
                                <li role="presentation">
                                    <a href="#cok_okunanlar" aria-controls="cok_okunanlar" role="tab" data-toggle="tab">Çok Okunanlar</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="video">
                                    <ul class="new-list no-list">
                                        <li class="nw-bx no-list active">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">1</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                        <li class="nw-bx no-list">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">2</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                        <li class="nw-bx no-list">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">3</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                        <li class="nw-bx no-list">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">4</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                        <li class="nw-bx no-list">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">5</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                    </ul><!-- /.new-list -->
                                </div><!-- /.tab-pane -->
                                <div role="tabpanel" class="tab-pane" id="son_dakika">
                                    <ul class="new-list no-list">
                                        <li class="nw-bx no-list active">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">1</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                        <li class="nw-bx no-list">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">2</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                        <li class="nw-bx no-list">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">3</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                        <li class="nw-bx no-list">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">4</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                        <li class="nw-bx no-list">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">5</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                    </ul><!-- /.new-list -->
                                </div><!-- /.tab-pane -->

                                <div role="tabpanel" class="tab-pane" id="cok_okunanlar">
                                    <ul class="new-list no-list">
                                        <li class="nw-bx no-list active">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">1</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                        <li class="nw-bx no-list">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">2</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                        <li class="nw-bx no-list">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">3</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                        <li class="nw-bx no-list">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">4</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                        <li class="nw-bx no-list">
                                            <a href="new-details.html" title="" class="full-link"></a>
                                            <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                            <span class="dec">5</span>
                                            <div class="spot">Pellentesque Quam</div>
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                        </li>
                                    </ul><!-- /.new-list -->
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div><!-- /rabpanel -->
                    </div><!-- /.nw-sm-img -->
                    @foreach($widgets as $widget)
                        @widget($widget['namespace'])
                    @endforeach
                </div>
            </div>
        </div>
    </article>
@endsection

@section('meta_tags')
    <title> {{ $search }}  </title>
    <meta name="keywords" content="{{$search}}"/>
    <meta name="description" content="{{$search}}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='pagename' content='{{$search}}'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{Cache::tags('Setting')->get('twitter_account')}}">
    <meta name="twitter:title" content="{{$search}}">
    <meta name="twitter:description" content="{{$search}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $search }} " />
    <meta property="og:url" content="{{Cache::tags('Setting')->get('url')}}" />
    <meta property="og:site_name" content="{{Cache::tags('Setting')->get('title')}}" />
    <meta property="og:description" content="{{$search}}" />
    <meta property="fb:app_id" content="671303379704288">
    <meta property="article:author" content="">
@endsection