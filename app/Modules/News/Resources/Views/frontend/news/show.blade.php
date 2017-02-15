@extends($activeTheme . '::frontend.master')

@section('content')


    <article class="container" id="container">
        <div class="breadcrumbs">
            <p><a href="{!! route('index') !!}">{{trans('news.common')}}.</a>   \\

                @foreach($record->news_categories as $newsCategory )
                    <a href="{!! route('show_news_category', ['slug' => $newsCategory->slug]) !!}">
                        {{$newsCategory->name}}
                    </a>   \\
                @endforeach
                {{$record->title}}
            </p>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div id="new-content">
                    <div class="meta">
                        <a href="new-details.html" class="cat-title">World News.</a>
                        <span class="timestamp">Oluşturma : {{ $record->created_at }} | Güncelleme: {{ $record->updated_at }}</span>
                    </div><!-- /.meta -->
                    <h1 class="news-title">{{ $record->title }}</h1>
                    <div class="news-spot">
                        <blockquote>
                            <p>{!! $record->spot !!}</p>
                        </blockquote>
                    </div>
                    <div class="new-img">
                        <img src="{{asset('images/news_images/' . $record->id . '/thumbnail/' .$record->thumbnail)}}" alt="{{$record->title}}">
                        <div class="image-subtitle">Venison pancetta cupim shankle stri (Haber 7)</div>
                    </div>
                    <div class="content" id="content">
                        <div class="news-text">
                            {!! $record->content !!}
                        </div><!-- /.ct-text -->
                        <div class="new-source">
                            <span>Haber Kaynağı: </span>
                            {{$record->news_source->name}}
                        </div>
                        <div class="relation-news">
                            <div class="title-section">
                                <h1>
                                    <span>İlişkili Haberler</span>
                                </h1>
                            </div>
                            <div class="relation-news-body">
                                <div class="row">
                                    @foreach($relatedNewsItems as $relatedNews)
                                        <div class="col-lg-3">
                                            <div class="relation-news-image">
                                                <a href="#">
                                                    <img src="{{asset('images/news_images/1/196x150_1.jpg')}}">
                                                    <div class="relation-news-title">
                                                        {{$relatedNews->title}}
                                                    </div>
                                                </a>
                                            </div>

                                        </div><!-- /.col -->
                                    @endforeach
                                </div>
                            </div>
                        </div><!-- /.relation-news -->

                        <div class="news-video-gallery">
                            <div class="title-section">
                                <h1>
                                    <span>Haberin Video Galerileri</span>
                                </h1>
                            </div>
                            <div class="news-video-body">
                                <div class="row">
                                    @foreach($record->video_galleries as $video_gallery)
                                    <div class="col-lg-3">
                                        <div class="news-video-image">
                                            <a href="#">
                                                <span class="play-icon"></span>
                                                <img src="{{asset('images/news_images/2/196x150_2.jpg')}}">
                                                <div class="news-video-title">
                                                    <span>{{$video_gallery->title}}</span>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </div><!-- /.news-videos -->

                        <div class="news-photo-gallery">
                            <div class="title-section">
                                <h1>
                                    <span>Haberin Photo Galerileri</span>
                                </h1>
                            </div>
                            <div class="news-photo-gallery-body">
                                <div class="row">
                                    @foreach($record->photo_galleries as $photo_gallery)
                                    <div class="col-lg-3 col-md-3 col-xs-4">
                                        <div class="gallery-image">
                                            <a href="#">
                                                <img src="{{asset('images/news_images/3/196x150_3.jpg')}}">
                                                <div class="gallery-title">
                                                    {{$photo_gallery->title}}
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div><!-- /.news-photo-gallery -->

                        <div class="news-videos">
                            <div class="title-section">
                                <h1>
                                    <span>Haberin Videoları</span>
                                </h1>
                            </div>
                            <div class="news-videos">
                                <div class="row">
                                    @foreach($record->videos as $video)
                                    <div class="col-lg-12">
                                            @if(!empty($video->file))
                                                <div class="video-box">
                                                    <video id="{{$video->id}}"
                                                           class="video-js vjs-default-skin"
                                                           controls preload="auto" width="100%" height="300"
                                                           poster=""
                                                           data-setup='{"example_option":true}'>
                                                        <source src="{{url($video->file)}}" type="video/mp4" />
                                                        <source src="{{url($video->file)}}" type="video/webm" />
                                                        <source src="{{url($video->file)}}" type="video/ogg" />
                                                        {{--<source src="http://video-js.zencoder.com/oceans-clip.ogv" type="video/ogg" />--}}
                                                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                                    </video>
                                                </div>
                                            @elseif(!empty($video->link))
                                               <div class="video-box">
                                                   <video
                                                           id="{{$video->id}}"
                                                           class="video-js vjs-default-skin"
                                                           controls
                                                           width="100%" height="264"
                                                           {{--data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{url($video->link)}}"}] }'--}}
                                                           data-setup='{ "techOrder": ["vimeo"], "sources": [{ "type": "video/vimeo", "src": "{{url($video->link)}}"}] }'>
                                                   </video>
                                               </div>
                                            @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="news-photos">
                            <div class="title-section">
                                <h1>
                                    <span>Haberin Resimleri</span>
                                </h1>
                            </div>
                            <div class="news-photos-body">
                                <div class="row">
                                    @foreach($record->photos as $photo)
                                        <div class="col-lg-12">
                                            <div class="news-photo-image">
                                                <img src="{{asset('images/news_images/4/196x150_4.jpg')}}">
                                                <div class="news-photo-title">
                                                    {{$photo->name}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="tags-box">
                            @foreach($record->tags as $tag)
                                <a href="{!! route('tag_search',['q' => $tag->name]) !!}">{{$tag->name}}</a>
                                {{--<a href="/tags/{{$tag->name}}">{{$tag->name}}</a>--}}
                            @endforeach
                        </div>

                        @if($record->is_show_editor_profile)
                            <div class="editor-box">
                                <div class="title-section">
                                    <h1>
                                        <span>Haber Yazarı</span>
                                    </h1>
                                </div>
                                <div class="editor-detail">
                                    <a href="{!! route('editor-profile',['slug' => $record->user->slug]) !!}">
                                        <span class="editor-photo">
                                            <img src="{{asset('images/news_images/4/58x58_4.jpg')}}">
                                        </span>
                                        <span class="editor-info">
                                            <h2>{{$record->user->name}}</h2>
                                            <p>{{$record->user->bio_note}}</p>
                                        </span>
                                    </a>
                                    <div class="clearfix"></div>
                                    <div class="other">
                                        <a href="{{$record->user->facebook}}">Facebook Profili</a>
                                        <a href="{{$record->user->web_site}}">Web Sitesi</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($record->is_show_previous_and_next_news)
                            <ul class="pager">
                                <li class="previous"><a href="{!! route('show_news', ['slug' => $previousNews->slug]) !!}">{{trans('news::news.previous_news')}}</a></li>
                                <li class="next"><a href="{!! route('show_news', ['slug' => $nextNews->slug]) !!}">{{trans('news::news.next_news')}}</a></li>
                            </ul>
                        @endif

                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=oldu67"></script>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox"></div>

                    </div><!-- /.content -->
                </div><!-- /.new-content -->

                <div class="discus-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="disqus_thread"></div>
                            <script>
                                var disqus_config = function () {
                                    this.page.url = '{{Redis::get('url')}}/{{$record->slug}}';
                                    this.page.identifier = '{{$record->id}}';
                                    this.page.title = '{{$record->title}}';
                                };

                                (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');
                                    s.src = '//baznews.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        </div>
                    </div><!-- Disqus Yorum Alanı -->
                </div><!-- /.discus-box -->

            </div><!-- /.col-md-8 -->
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="nw-sm-img ">
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
                    {{--@widgetGroup('right_bar')--}}
                </div><!-- /.sidebar -->
            </div><!-- /.col -->
        </div><!-- /.row -->

    </article><!-- /.article -->
    <div class="fb-comment-embed" data-href="{{Redis::get('url')}}/{{$record->slug}}" data-width="560" data-include-parent="false"></div>
@endsection


@section('meta_tags')
    <title> {{ $record->title }}  </title>
    <meta name="keywords" content="{{$record->keywords}}"/>
    <meta name="description" content="{{$record->description}}"/>

    @if($record->news_type == 1)
        <meta name='robots' content='noindex, nofollow'>
    @else
        <meta name='robots' content='index,follow'>
    @endif
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='pagename' content='{{$record->title}}'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{Redis::get('twitter_account')}}">
    <meta name="twitter:title" content="{{$record->title}}">
    <meta name="twitter:description" content="{{$record->description}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $record->title }} " />
    <meta property="og:url" content="{{Redis::get('url')}}" />
    <meta property="og:site_name" content="{{Redis::get('title')}}" />
    <meta property="og:description" content="{{$record->description}}" />
    <meta property="fb:app_id" content="671303379704288">
    <meta property="og:image" content="{{asset('images/news_images/' . $record->id . '/thumbnail/' .$record->thumbnail)}}"/>
    <meta property="article:published_time" content="{{$record->created_at}}">
    {{--<meta property="article:author" content="">--}}

@endsection


@section('css')
    <link href="//vjs.zencdn.net/5.8/video-js.min.css" rel="stylesheet">

    {{--<link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">--}}
@endsection

@section('js')
    <script src="js/app.js"></script>

    {{--<script src="http://vjs.zencdn.net/5.8.8/video.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-youtube/2.1.1/Youtube.min.js"></script>--}}
    <script src="{{ Theme::asset($activeTheme . '::js/videojs/Vimeo.js') }}"></script>


    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>

    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/jquery.noty.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/themes/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/promise.js"></script>

    <link href="{{ Theme::asset($activeTheme . '::js/video-js/video-js.min.css') }}" rel="stylesheet">
    <script src="{{ Theme::asset($activeTheme . '::js/video-js/video.novtt.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/video-js/video.js') }}"></script>
    <script>
        videojs.options.flash.swf = "{{ Theme::asset($activeTheme . '::js/video-js/video-js.swf') }}"
        videojs("video-js", {}, function(){
            // Player (this) is initialized and ready.
        });
    </script>
@endsection
