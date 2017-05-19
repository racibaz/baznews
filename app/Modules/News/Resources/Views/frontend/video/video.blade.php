@extends($activeTheme . '::frontend.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ticker last-time" id="son-dakika">
                    <strong>Son Dakika:</strong>
                    <ul>
                        <li>
                            <a href="#">Breaking News -1</a>
                        </li>
                        <li>
                            <a href="#">Breaking News -1</a>
                        </li>
                        <li>
                            <a href="#">Breaking News -1</a>
                        </li>
                    </ul>
                </div><!-- /.ticker -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <article>
        <div class="container" id="container">
            <ol class="breadcrumb">
                <li>
                    <a href="{!! route('index') !!}">{{trans('news.common')}}.</a>
                </li>
                <li>
                    <a href="{!! route('show_video_gallery', ['slug' => $videoGallery->slug]) !!}">
                        {{$videoGallery->title}}
                    </a>
                </li>
                <li>
                    {{$video->name}}
                </li>
            </ol>
            <div class="row">
                <div class="col-md-8">
                    <div id="new-content">
                        <div class="playerbox module">
                            <div class="player">
                                @if(!empty($video->file))
                                    <video id="{{$video->id}}"
                                           class="video-js vjs-default-skin"
                                           controls preload="auto" width="100%" height="400px"
                                           poster="http://video-js.zencoder.com/oceans-clip.png"
                                           data-setup='{"example_option":true}'>

                                        <source src="{{asset('video_gallery/' . $videoGallery->id . '/videos/' . $video->file)}}" type="video/mp4" />
                                        <source src="{{asset('video_gallery/' . $videoGallery->id . '/videos/' . $video->file)}}" type="video/webm" />
                                        <source src="{{asset('video_gallery/' . $videoGallery->id . '/videos/' . $video->file)}}" type="video/ogg" />

                                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                    </video>

                                    <script type="application/ld+json">
                                        {
                                          "@context": "http://schema.org",
                                          "@type": "VideoObject",
                                          "name": "{{$video->title}}",
                                          "description": "{{$video->description}}",
                                          "thumbnailUrl": "{{Cache::tags('Setting')->get('url') . '/' . asset('video_gallery/' . $video->video_gallery_id . '/photos/' . $video->thumbnail)}}",
                                          "uploadDate": "{{$video->updated_at}}",
                                          "publisher": {
                                            "@type": "Organization",
                                            "name": "{{Cache::tags('Setting')->get('url')}}",
                                            "logo": {
                                              "@type": "ImageObject",
                                              "url": "{{Cache::tags('Setting')->get('logo')}}"
                                            }
                                          },
                                          "contentUrl": "https://www.example.com/video123.flv",
                                          "embedUrl": "https://www.example.com/videoplayer.swf?video=123",
                                          "interactionCount": "2347"
                                        }
                                    </script>
                                @elseif(!empty($video->embed))
                                    {!! $video->embed !!}
                                @endif
                            </div>

                            <div class="description">
                                <em>{{$videoGallery->title}} / {{$video->updated_at}}</em>
                                <h1>{{$video->name}}</h1>
                                <h2>{{$video->content}}</h2>
                                @foreach($tags as $tag)
                                    <a href="{!! route('tag_search',['q' => $tag->name]) !!}">{{$tag->name}}</a>
                                @endforeach
                            </div>
                        </div><!-- /.player-box -->
                        <div class="share-box">
                            <div class="title-section">
                                <h1>
                                    <span>{{trans('common.share')}}</span>
                                </h1>
                            </div>
                            {!! Cache::tags('Setting')->get('addthis') !!}
                        </div><!-- /.share-box -->

                        @if($video->is_comment)
                            <div class="discus-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Cache::tags('Setting')->get('disqus') !!}
                                    </div>
                                </div>
                            </div><!-- /.discus-box -->
                        @endif
                    </div><!-- /.new-content -->
                </div><!-- /.col-md-8 -->
                <div class="col-md-4" id="video_sidebar">
                    <div class="sidebar">

                        <div class="sidebar-video">
                            <div class="title-section">
                                <h1>
                                    <span>Diğer Videoları</span>
                                </h1>
                            </div>

                            <div class="video-list-body">
                                @foreach($otherGalleryVideos as $otherGalleryVideo)
                                    <div class="video-link module">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <a href="{{route('show_videos',['slug' => $otherGalleryVideo->slug ])}}">
                                                    <div class="hold">
                                                        <img src="{{ asset('video_gallery/' . $otherGalleryVideo->video_gallery_id . '/photos/165x90_' . $otherGalleryVideo->thumbnail)}}"
                                                             alt="{{$otherGalleryVideo->title}}" title="{{$otherGalleryVideo->title}}"/>
                                                        <span class="icon play"></span>
                                                    </div>
                                                </a>
                                            </div><!-- /.col -->
                                            <div class="col-lg-9">
                                                <a href="{{route('show_videos',['slug' => $otherGalleryVideo->slug ])}}">
                                                    <span class="title">{{$otherGalleryVideo->name}}</span>
                                                    <span class="excerpt">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    </span>
                                                </a>
                                                <span class="time visible-lg"> {{$otherGalleryVideo->updated_at}}</span>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.video-link -->
                                @endforeach
                            </div>
                        </div><!-- /.sidebar-video -->

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
                                        <ul class="new-list no-list slide-tab">
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
                                        <ul class="new-list no-list ">
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
                        <div class="widget">
                            @foreach($widgets as $widget)
                                @widget($widget['namespace'])
                            @endforeach
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="videos">
                <div class="title-section">
                    <h1>
                        <span>Lastest Videos</span>
                        <a href="video-details.html" class="btn btn-primary btn-xs m-v-btn">Daha fazla</a>
                    </h1>
                </div><!-- /.title-section -->
                <div class="row">

                    @foreach($lastestVideos  as $lastestVideo)

                        <div class="col-md-2 col-sm-4 col-xs-6">
                            <div class="r-box module">
                                <div class="box-img">
                                    <a href="{{route('show_videos',['slug' => $lastestVideo->slug ])}}">
                                        <img src="{{ asset('video_gallery/' . $lastestVideo->video_gallery_id . '/photos/497x358_' . $lastestVideo->thumbnail)}}" alt="{{$lastestVideo->title}}" title="{{$lastestVideo->title}}"/>
                                        <span class="icon"></span>
                                    </a>
                                </div>
                                <div class="img-title">
                                    <a href="{{route('show_videos',['slug' => $lastestVideo->slug ])}}">
                                        {{$lastestVideo->name}}
                                    </a>
                                </div>

                            </div><!-- /.r-box -->
                        </div><!-- /. -->
                    @endforeach
                    <div class="clearfix"></div>
                </div><!-- /.row -->
            </div><!-- /.videos -->

            @if($categoryVideos)
                <div class="videos">
                    <div class="title-section">
                        <h1>
                            <span>Categories Other Videos</span>
                            <a href="video-details.html" class="btn btn-primary btn-xs m-v-btn">Daha fazla</a>
                        </h1>
                    </div><!-- /.title-section -->
                    <div class="row">
                        @foreach($categoryVideos  as $categoryVideo)

                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="r-box">
                                    <a href="{{route('show_videos',['slug' => $categoryVideo->slug ])}}">
                                        {{--<img src="{{ asset('videos/' . $lastVideo->id . '/165x90_' . $lastVideo->thumbnail)}}"   />--}}
                                        <img src="img/video-manset/related-img.jpg" alt="">
                                        <i class="icon"></i>
                                        <span class="c-text">{{$categoryVideo->name}}</span>
                                    </a>
                                </div><!-- /.r-box -->
                            </div><!-- /. -->

                        @endforeach
                    </div><!-- /.row -->
                </div><!-- /.videos -->
            @endif
        </div>
    </article><!-- /.article -->

@endsection


@section('meta_tags')
    <title> {{ $videoGallery->title }}  </title>
    <meta name="keywords" content="{{$videoGallery->keywords}}"/>
    <meta name="description" content="{{$videoGallery->description}}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='pagename' content='{{$videoGallery->title}}'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>

@endsection

@section('css')
    <link href="{{ Theme::asset($activeTheme . '::js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" type="text/css" rel="stylesheet">
@endsection

@section('js')

    <script src="{{ Theme::asset($activeTheme . '::js/video-js/video.novtt.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/video-js/video.js') }}"></script>
    <script type="text/javascript">
        videojs.options.flash.swf = "{{ Theme::asset($activeTheme . '::js/video-js/video-js.swf') }}"
        videojs("video-js", {}, function(){
            // Player (this) is initialized and ready.
        });
    </script>
    <script src="{{ Theme::asset($activeTheme . '::js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/jquery-ticker-master/jquery.ticker.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            /*--------------------------------------------------------
             Last Minute News Ticker Slider
             * --------------------------------------------------------*/
            $('.ticker').ticker();
            /*--------------------------------------------------------
             mCustomScrollbar
             * --------------------------------------------------------*/
            $('.sidebar-video .video-list-body').mCustomScrollbar({
                theme:"rounded-dark"
            });
        });

        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function() {
            jQuery('#video_sidebar').theiaStickySidebar();
        });
    </script>

@endsection
