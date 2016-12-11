@extends($activeTheme . '::frontend.master')

@section('content')

    <article class="container" id="container">

        <div class="row">
            <div class="col-md-12">
                <div class="last-time" id="son-dakika">
                    <h4>Son Dakika:</h4>
                    @foreach($breakNewsItems as $breakNewsItem)
                        <a href="{!! route('show_news', ['slug' => $breakNewsItem->slug]) !!}">{{$breakNewsItem->title}}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="main-slider">
                    <ul class="bxslider">
                        @foreach($mainCuffNewsItems as $mainCuffNewsItem)
                             <li data-slide-index="{{$mainCuffNewsItem->id}}">
                                 <a href="{!! route('show_news', ['slug' => $mainCuffNewsItem->slug]) !!}">
                                    <img src="{{$mainCuffNewsItem->cuff_photo}}" alt="News Logo" >
                                 </a>
                             </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="main-slider spot">
                    <ul class="bxslider">
                        <li data-slide-index="0"><img src="{{ Theme::asset($activeTheme . '::img/spot.jpg')}}" alt="News Logo" ></li>
                        <li data-slide-index="1"><img src="{{ Theme::asset($activeTheme . '::img/spot.jpg')}}" alt="News Logo" ></li>
                        <li data-slide-index="2"><img src="{{ Theme::asset($activeTheme . '::img/spot.jpg')}}" alt="News Logo" ></li>
                        <li data-slide-index="3"><img src="{{ Theme::asset($activeTheme . '::img/spot.jpg')}}" alt="News Logo" ></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="post-box-slider">
                    <ul class="bxcarousel">
                        <li>
                            <div class="thumbnail">
                                <a href="new-details.html">
                                    <img src="{{ Theme::asset($activeTheme . '::img/spot/mini-spot1.jpg')}}" alt="Dummyİmage">
                                    <div class="caption">
                                        <span class="mini-title">Consectetur Cras</span>
                                        <span class="ct-title">
                                        Maecenas faucibus mollis interdum.
                                    </span>
                                    </div>
                                </a>
                            </div>
                            <!-- /.thumbnail -->
                        </li>
                        <!-- /.col -->

                        <li>
                            <div class="thumbnail">
                                <a href="new-details.html">
                                    <img src="{{ Theme::asset($activeTheme . '::img/spot/mini-spot2.jpg')}}" alt="Dummyİmage">
                                    <div class="caption">
                                        <span class="mini-title">Consectetur Cras</span>
                                        <span class="ct-title">
                                        Maecenas faucibus mollis interdum.
                                    </span>
                                    </div>
                                </a>
                            </div>
                            <!-- /.thumbnail -->
                        </li>
                        <!-- /.col -->
                        <li>
                            <div class="thumbnail">
                                <a href="new-details.html">
                                    <img src="{{ Theme::asset($activeTheme . '::img/spot/mini-spot3.jpg')}}" alt="Dummyİmage">
                                    <div class="caption">
                                        <span class="mini-title">Consectetur Cras</span>
                                        <span class="ct-title">
                                        Maecenas faucibus mollis interdum.
                                    </span>
                                    </div>
                                </a>
                            </div>
                            <!-- /.thumbnail -->
                        </li>
                        <!-- /.col -->
                        <li>
                            <div class="thumbnail">
                                <a href="new-details.html">
                                    <img src="{{ Theme::asset($activeTheme . '::img/spot/mini-spot2.jpg')}}" alt="Dummyİmage">
                                    <div class="caption">
                                        <span class="mini-title">Consectetur Cras</span>
                                        <span class="ct-title">
                                        Maecenas faucibus mollis interdum.
                                    </span>
                                    </div>
                                </a>
                            </div>
                            <!-- /.thumbnail -->
                        </li>
                        <!-- /.col -->
                        <li>
                            <div class="thumbnail">
                                <a href="new-details.html">
                                    <img src="{{ Theme::asset($activeTheme . '::img/spot/mini-spot1.jpg')}}" alt="Dummyİmage">
                                    <div class="caption">
                                        <span class="mini-title">Consectetur Cras</span>
                                        <span class="ct-title">
                                        Maecenas faucibus mollis interdum.
                                    </span>
                                    </div>
                                </a>
                            </div>
                            <!-- /.thumbnail -->
                        </li>
                        <!-- /.col -->
                    </ul>
                </div>
                <!-- /.post-box-slider -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="img-new-list">
                    <div class="title-section">
                        <h1>
                            <span>Spot News</span>
                        </h1>
                    </div>
                    <div class="new-list-ct">
                        <div class="left-img-ct" style="background: {{ Theme::asset($activeTheme . '::img/example.jpg')}}">
                            <a href="new-details.html" class="full-link"></a>
                            <span class="shadow"></span>
                            <div class="new-ct">
                                <h3 class="new-title">Dapibus Ridiculus Ultricies Ornare Consectetur1</h3>
                                <time class="new-date">
                                    <span class="timeago" title="">11 saat önce</span>
                                </time>
                            </div>
                        </div>
                        <ul class="new-list">
                            <li>
                                <a href="new-details.html" class="full-link active" data-img="img/mini-spot/haber2.jpg" data-title="Dapibus Ridiculus Ultricies Ornare" data-time="23 saat önce"></a>
                                <div class="new-ct">
                                    <h3 class="new-title">Dapibus Ridiculus Ultricies Ornare </h3>
                                    <time class="new-date">
                                        <span class="timeago" title="">23 saat önce</span>
                                    </time>
                                </div>
                            </li>
                            <li>
                                <a href="new-details.html" class="full-link" data-img="img/mini-spot/haber445.jpg" data-title="Dapibus Ridiculus Ultricies  Consectetur" data-time="18 saat önce"></a>
                                <div class="new-ct">
                                    <h3 class="new-title">Dapibus Ridiculus Ultricies  Consectetur</h3>
                                    <time class="new-date">
                                        <span class="timeago" title="">18 saat önce</span>
                                    </time>
                                </div>
                            </li>
                            <li>
                                <a href="new-details.html" class="full-link" data-img="img/example.jpg" data-title="Dapibus Ultricies Ornare Consectetur" data-time="12 saat önce"></a>
                                <div class="new-ct">
                                    <h3 class="new-title">Dapibus Ultricies Ornare Consectetur</h3>
                                    <time class="new-date">
                                        <span class="timeago" title="">12 saat önce</span>
                                    </time>
                                </div>
                            </li>
                            <li>
                                <a href="new-details.html" class="full-link" data-img="img/example.jpg" data-title="Dapibus Ridiculus Ultricies Ornare asd" data-time="99 saat önce"></a>
                                <div class="new-ct">
                                    <h3 class="new-title"> Ridiculus Ultricies Ornare Consectetur</h3>
                                    <time class="new-date">
                                        <span class="timeago" title="img/example.jpg">13 saat önce</span>
                                    </time>
                                </div>
                            </li>
                            <li>
                                <a href="new-details.html" class="full-link" data-img="img/example.jpg" data-title="asda Ridiculus Ultricies Ornare Consectetur" data-time="22 saat önce"></a>
                                <div class="new-ct">
                                    <h3 class="new-title">Dapibus Ridiculus Ultricies  Consectetur</h3>
                                    <time class="new-date">
                                        <span class="timeago" title="">44 saat önce</span>
                                    </time>
                                </div>
                            </li>
                        </ul>
                    </div><!-- /.new-list-ct -->
                </div><!-- /.col-md-8 -->
                <!-- /.image-banner-list -->
            </div>

            <div class="col-md-4">
                <div class="nw-sm-img">
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
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
                                    </span>
                                        <span class="dec">1</span>
                                        <div class="spot">Pellentesque Quam</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                    </li>
                                    <li class="nw-bx no-list">
                                        <a href="new-details.html" title="" class="full-link"></a>
                                        <span class="imgwrap">
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
                                    </span>
                                        <span class="dec">2</span>
                                        <div class="spot">Pellentesque Quam</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                    </li>
                                    <li class="nw-bx no-list">
                                        <a href="new-details.html" title="" class="full-link"></a>
                                        <span class="imgwrap">
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
                                    </span>
                                        <span class="dec">3</span>
                                        <div class="spot">Pellentesque Quam</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                    </li>
                                    <li class="nw-bx no-list">
                                        <a href="new-details.html" title="" class="full-link"></a>
                                        <span class="imgwrap">
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
                                    </span>
                                        <span class="dec">4</span>
                                        <div class="spot">Pellentesque Quam</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                    </li>
                                    <li class="nw-bx no-list">
                                        <a href="new-details.html" title="" class="full-link"></a>
                                        <span class="imgwrap">
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
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
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
                                    </span>
                                        <span class="dec">1</span>
                                        <div class="spot">Pellentesque Quam</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                    </li>
                                    <li class="nw-bx no-list">
                                        <a href="new-details.html" title="" class="full-link"></a>
                                        <span class="imgwrap">
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
                                    </span>
                                        <span class="dec">2</span>
                                        <div class="spot">Pellentesque Quam</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                    </li>
                                    <li class="nw-bx no-list">
                                        <a href="new-details.html" title="" class="full-link"></a>
                                        <span class="imgwrap">
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
                                    </span>
                                        <span class="dec">3</span>
                                        <div class="spot">Pellentesque Quam</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                    </li>
                                    <li class="nw-bx no-list">
                                        <a href="new-details.html" title="" class="full-link"></a>
                                        <span class="imgwrap">
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
                                    </span>
                                        <span class="dec">4</span>
                                        <div class="spot">Pellentesque Quam</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                    </li>
                                    <li class="nw-bx no-list">
                                        <a href="new-details.html" title="" class="full-link"></a>
                                        <span class="imgwrap">
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
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
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
                                    </span>
                                        <span class="dec">1</span>
                                        <div class="spot">Pellentesque Quam</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                    </li>
                                    <li class="nw-bx no-list">
                                        <a href="new-details.html" title="" class="full-link"></a>
                                        <span class="imgwrap">
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
                                    </span>
                                        <span class="dec">2</span>
                                        <div class="spot">Pellentesque Quam</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                    </li>
                                    <li class="nw-bx no-list">
                                        <a href="new-details.html" title="" class="full-link"></a>
                                        <span class="imgwrap">
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
                                    </span>
                                        <span class="dec">3</span>
                                        <div class="spot">Pellentesque Quam</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                    </li>
                                    <li class="nw-bx no-list">
                                        <a href="new-details.html" title="" class="full-link"></a>
                                        <span class="imgwrap">
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
                                    </span>
                                        <span class="dec">4</span>
                                        <div class="spot">Pellentesque Quam</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                    </li>
                                    <li class="nw-bx no-list">
                                        <a href="new-details.html" title="" class="full-link"></a>
                                        <span class="imgwrap">
                                        <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
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
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <div class="title-section">
                    <h1>
                        <span>Galeri</span>
                    </h1>
                </div>
                <div class="th-nw-slide">
                    <div id="m_pg1" class="pager">
                        <a data-slide-index="0" href="" onmouseover="this.click()"><span class="img-ct"><img src="{{ Theme::asset($activeTheme . '::img/spot/multimedia1.jpg')}}" /></span></a>
                        <a data-slide-index="1" href="" onmouseover="this.click()"><span class="img-ct"><img src="{{ Theme::asset($activeTheme . '::img/spot/multimedia2.jpg')}}" /></span></a>
                        <a data-slide-index="2" href="" onmouseover="this.click()"><span class="img-ct"><img src="{{ Theme::asset($activeTheme . '::img/spot/multimedia3.jpg')}}" /></span></a>
                    </div><!-- /.m-pg -->
                    <ul class="slide m-slider1">
                        <li><img src="{{ Theme::asset($activeTheme . '::img/spot/multimedia1.jpg')}}" /></li>
                        <li><img src="{{ Theme::asset($activeTheme . '::img/spot/multimedia2.jpg')}}" /></li>
                        <li><img src="{{ Theme::asset($activeTheme . '::img/spot/multimedia3.jpg')}}" /></li>
                    </ul><!-- /.m-slider -->
                </div><!-- /.th-nw-slide -->
            </div><!-- /.col -->
            <div class="col-md-6">
                <div class="title-section">
                    <h1>
                        <span>Video</span>
                    </h1>
                </div>
                <div class="th-nw-slide">
                    <div id="m_pg2" class="pager">
                        <a data-slide-index="0" href="" onmouseover="this.click()"><span class="img-ct"><img src="{{ Theme::asset($activeTheme . '::img/spot/multimedia1.jpg')}}" /></span></a>
                        <a data-slide-index="1" href="" onmouseover="this.click()"><span class="img-ct"><img src="{{ Theme::asset($activeTheme . '::img/spot/multimedia2.jpg')}}" /></span></a>
                        <a data-slide-index="2" href="" onmouseover="this.click()"><span class="img-ct"><img src="{{ Theme::asset($activeTheme . '::img/spot/multimedia3.jpg')}}" /></span></a>
                    </div><!-- /.m-pg -->
                    <ul class="slide m-slider2">
                        <li><img src="{{ Theme::asset($activeTheme . '::img/spot/multimedia1.jpg')}}" /></li>
                        <li><img src="{{ Theme::asset($activeTheme . '::img/spot/multimedia2.jpg')}}" /></li>
                        <li><img src="{{ Theme::asset($activeTheme . '::img/spot/multimedia3.jpg')}}" /></li>
                    </ul><!-- /.m-slider -->
                </div><!-- /.th-nw-slide -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </article><!-- /.article -->

@endsection



@section('meta_tags')
    <title> {{ Redis::get('title') }}  </title>
    <meta name="keywords" content="{{ Redis::get('keywords') }}"/>
    <meta name="description" content="{{ Redis::get('description') }}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='category' content=''>
    <meta name='pagename' content='jQuery Tools, Tutorials and Resources - O Reilly Media'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>
@endsection


@section('css')
    {{--<link href="//vjs.zencdn.net/5.8/video-js.min.css" rel="stylesheet">--}}

    {{--<link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">--}}
@endsection

@section('js')

    {{--<script src="http://code.jquery.com/jquery.min.js"></script>--}}
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>--}}

    <script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-youtube/2.1.1/Youtube.min.js"></script>

    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/jquery.noty.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/themes/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/promise.js"></script>


    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('72259496952df9087a50', {
            cluster: 'eu',
            encrypted: true
        });

        var channel = pusher.subscribe('test_channel');
        channel.bind('my_event', function(data) {

//                alert(data.title + ' ' + data.message );
//            var n = noty({text: data.title + ' ' + data.message});

        });
    </script>

@endsection
