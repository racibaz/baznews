@extends($activeTheme . '::frontend.master')

@section('content')


    <div class="container" id="container">
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
                <article class="module">
                    <div id="new-content">
                        <div class="meta">
                            <a href="new-details.html" class="cat-title">World News.</a>
                            <span class="timestamp">Oluşturma : {{ $record->created_at }} | Güncelleme: {{ $record->updated_at }}</span>
                        </div><!-- /.meta -->
                        <h1 class="news-title">{{ $record->title }}</h1>
                        @if($record->news_type == 0 || $record->news_type == 1)
                            <div class="new-img">
                                <img src="{{asset('images/news_images/' . $record->id . '/thumbnail/' .$record->thumbnail)}}" alt="{{$record->title}}">
                                <div class="image-subtitle">
                                    Venison pancetta cupim shankle stri (Haber 7)
                                </div>
                            </div>
                        @elseif($record->news_type == 2)
                            iç haber
                        @elseif($record->news_type == 3)
                            photo gallery
                        @elseif($record->news_type == 4)
                            video
                        @elseif($record->news_type == 5)
                            video gallery
                        @elseif($record->news_type == 6)
                            sound
                        @endif

                        <div class="content" id="content">
                            <div class="news-spot">
                                <p>{!! $record->spot !!}</p>
                            </div>
                            <div class="news-text">
                                {!! $record->content !!}
                            </div><!-- /.ct-text -->
                            <div class="new-source">
                                <span>Haber Kaynağı: </span>
                                {{$record->news_source->name}}
                            </div><!-- /.new-source -->
                        </div><!-- /.content -->

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
                                                           controls
                                                           width="100%" height="400px"
                                                           preload="auto"
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
                                                            width="100%" height="400px"
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
                            <div class="author-box">
                                <div class="author-detail">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3">
                                            <a href="{!! route('editor-profile',['slug' => $record->user->slug]) !!}">
                                                <div class="author-photo">
                                                    <img src="{{asset('images/news_images/4/58x58_4.jpg')}}">
                                                </div><!-- /editor-photo -->
                                            </a>
                                        </div><!-- /.col -->
                                        <div class="col-lg-10 col-md-9">
                                            <div class="author-info">
                                                <a href="{!! route('editor-profile',['slug' => $record->user->slug]) !!}">
                                                    <h2>{{$record->user->name}}</h2>
                                                </a>
                                                <div class="bio-text">
                                                    <p>{{$record->user->bio_note}}Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                                        Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                                    </p>
                                                </div>
                                                <span class="bio-long-btn">Genişlet</span>
                                            </div><!-- /.editor-info -->
                                            <div class="links">
                                                <ul class="nav nav-pills">
                                                    <li>
                                                        <a href="{{$record->user->web_site}}" target="_blank" ><i class="fa fa-globe"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{$record->user->facebook}}" target="_blank" ><i class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{$record->user->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{$record->user->pinterest}}" target="_blank" ><i class="fa fa-pinterest"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{$record->user->linkedin}}" target="_blank" ><i class="fa fa-linkedin"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{$record->user->youtube}}" target="_blank" ><i class="fa fa-youtube"></i></a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.editor-info -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div><!-- /.editor-detail -->
                            </div>
                        @endif
                        @if($record->is_show_previous_and_next_news)
                            <ul class="pager">
                                <li class="previous"><a href="{!! route('show_news', ['slug' => $previousNews->slug]) !!}"><i class="fa fa-chevron-left "></i>{{trans('news::news.previous_news')}}</a></li>
                                <li class="next"><a href="{!! route('show_news', ['slug' => $nextNews->slug]) !!}">{{trans('news::news.next_news')}} <i class="fa fa-chevron-right"></i></a></li>
                            </ul>
                    @endif

                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=oldu67"></script>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="share-box">
                            <div class="title-section">
                                <h1>
                                    <span>Paylaş</span>
                                </h1>
                            </div>
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>

                    </div><!-- /.content -->
                    @if($record->is_comment)
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
                    @endif
                </article>
            </div><!-- /.new-content -->
            <div class="col-md-4">
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
                    {{--@widgetGroup('right_bar')--}}
                </div><!-- /.sidebar -->
            </div><!-- /.col -->
        </div><!-- /.col-md-8 -->
    </div><!-- /.row -->

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

@endsection

@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/video-js/video.novtt.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/video-js/video.js') }}"></script>
    <script>
    videojs.options.flash.swf = "{{ Theme::asset($activeTheme . '::js/video-js/video-js.swf') }}"
    videojs("video-js", {}, function(){
    // Player (this) is initialized and ready.
    });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.bio-long-btn').click(function () {
                if($('.bio-text.open').length > 0){
                    console.log("Run..");
                    $('.bio-text').removeClass('open');
                    $(this).text("Genişlet");
                }else {
                    $(this).text("Daralt");
                    $('.bio-text').addClass('open');
                }
            });
        });
    </script>
@endsection
