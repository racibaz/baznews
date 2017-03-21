@extends($activeTheme . '::frontend.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ticker last-time" id="son-dakika">
                    <strong>Son Dakika:</strong>
                    <ul>
                        <li>
                            <a href="#">Breaking News - 1</a>
                        </li>
                        <li>
                            <a href="#">Breaking News - 2</a>
                        </li>
                        <li>
                            <a href="#">Breaking News - 3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <article class="container" id="container">

        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('news.common')}}.</a>
            </li>
            <li>
                <a href="{!! route('show_news_category', ['slug' => $record->slug]) !!}">
                    {{$record->name}}
                </a>
            </li>
            <li>
                {{$record->title}}
            </li>
        </ol>

        <div class="row">
            <div class="col-md-8" id="content">
                <div class="page-content module">
                    <h1 class="page-title">{{$record->name}}</h1>
                    <div class="time">
                        <i class="fa fa-clock-o"></i>
                        <span>{{$record->created_at}}</span>
                        <span>{{$record->updated_at}}</span>
                    </div>
                    <div class="content">
                        {!! $record->content !!}
                    </div>
                </div>

                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=oldu67"></script>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>

                @if($record->is_comment)
                    <div class="discus-box">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="disqus_thread"></div>
                                <script>
                                    var disqus_config = function () {
                                        this.page.url = '{{Cache::tags('Setting')->get('url')}}/{{$record->slug}}';
                                        this.page.identifier = 'page-{{$record->id}}';
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

            </div>
            <div class="col-lg-4" id="sidebar">
                <div class="sidebar">
                    <div class="widget">
                        @foreach($widgets as $widget)
                            @widget($widget['namespace'])
                            <br />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article><!-- /.article -->

@endsection

@section('meta_tags')
    <title> {{ $record->name }}  </title>
    <meta name="keywords" content="{{$record->keywords}}"/>
    <meta name="description" content="{{$record->description}}"/>
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
    <meta name="twitter:site" content="{{Cache::tags('Setting')->get('twitter_account')}}">
    <meta name="twitter:title" content="{{$record->title}}">
    <meta name="twitter:description" content="{{$record->description}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $record->title }} " />
    <meta property="og:url" content="{{Cache::tags('Setting')->get('url')}}" />
    <meta property="og:site_name" content="{{Cache::tags('Setting')->get('title')}}" />
    <meta property="og:description" content="{{$record->description}}" />
    <meta property="fb:app_id" content="671303379704288">
    {{--<meta property="og:image" content="{{asset('images/news_images/' . $record->id . '/thumbnail/' .$record->thumbnail)}}"/>--}}
    <meta property="article:published_time" content="{{$record->created_at}}">
    {{--<meta property="article:author" content="">--}}

@endsection

@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/jquery-ticker-master/jquery.ticker.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script type="text/javascript">
        (function($){
            'use strict';
            /*--------------------------------------------------------
             Last Minute News Ticker Slider
             * --------------------------------------------------------*/
            $('.ticker').ticker();
        })(jQuery);
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function() {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
    </script>
@endsection