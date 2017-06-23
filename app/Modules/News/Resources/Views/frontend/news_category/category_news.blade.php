@extends($activeTheme . '::frontend.master')

@section('content')
    <article class="container" id="container">
        <div class="row">
            <div class="col-lg-8" id="content">
                <div class="cat-posts">
                    <div class="title-section">
                        <h1>
                            <span>{{$newsCategory->name}}</span>
                        </h1>
                    </div><!-- /.title-section -->
                    <div class="posts">
                        <div class="row">
                            @foreach($records as $record)
                                <div class="col-lg-12">
                                    <div class="news-box module">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-3 col-xs-4">
                                                <div class="frame-image">
                                                    <a href="{!! route('show_news', ['slug' => $record->slug]) !!}">
                                                        <img src="{{asset('images/news_images/' . $record->id . '/165x90_' . $record->thumbnail)}}"
                                                             alt="{{$record->title}}">
                                                    </a>
                                                </div><!-- /.frame-image -->
                                            </div><!-- /.cols -->
                                            <div class="col-lg-8 col-md-9 col-xs-8">
                                                <div class="news-right-txt">
                                                    <div class="news-title">
                                                        <a href="{!! route('show_news', ['slug' => $record->slug]) !!}">
                                                            <h2>{{$record->title}}</h2>
                                                        </a>
                                                    </div>
                                                    <div class="news-meta-left">
                                                        <a href="#" class="meta-date" title="">
                                                            <i class="fa fa-clock-o"></i>{{$record->updated_at->diffForHumans()}}
                                                        </a>
                                                    </div>
                                                    <div class="news-excerpt">
                                                        <p>{{$record->spot}}</p>
                                                    </div><!-- /.news-except -->
                                                </div>
                                            </div><!-- /.cols -->
                                        </div><!-- /.row -->
                                    </div><!-- /news-box -->
                                </div><!-- /.col-lg-12 -->
                            @endforeach
                        </div>
                        @include($activeTheme . '::frontend.partials._pagination', ['records' => $records ])
                    </div>
                </div>
            </div>
            <div class="col-lg-4" id="sidebar">
                <div class="sidebar">
                    <div class="widget">
                        @foreach($widgets as $widget)
                            @widget($widget['namespace'])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection

@section('meta_tags')
    <title>{{ $newsCategory->name }}</title>
    <meta name="keywords" content="{{$newsCategory->keywords}}"/>
    <meta name="description" content="{{$newsCategory->description}}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='pagename' content='{{$newsCategory->title}}'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>
@endsection
@section('css')
    {{--Css code--}}
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script type="text/javascript">
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
    </script>
@endsection