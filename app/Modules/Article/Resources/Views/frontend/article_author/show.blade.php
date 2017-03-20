@extends($activeTheme . '::frontend.master')

@section('content')
    <div class="container" id="container">
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
                <article class="article-content module">
                    <h1 class="article-title">{{$record->name}}</h1>
                    <div class="content">
                        {{$record->cv}}
                        Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id elit non mi porta gravida at eget metus.
                    </div>
                </article>
                <div class="author-article">
                    <div class="title-section">
                        <h3>
                            <span>Yazarın Makaleleri</span>
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="articles module">
                                <ul class="sub-list">
                                    @foreach($record->articles as $record)
                                        <li>
                                            <a href="{!! route('article', ['slug' => $record->slug]) !!}">
                                                <span class="time">
                                                    <i class="fa fa-clock-o"></i> 12 Mart
                                                </span>
                                                <h3 class="title">
                                                    {{$record->title}}
                                                </h3>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul><!-- /.article-list -->
                            </div><!-- /.articles -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                </div><!-- /.author-article -->
                <div class="advert-center module">
                    <img src="{{ Theme::asset($activeTheme . '::img/advert-images/728x90.png') }}" alt="Advert Center">
                </div>
            </div><!-- /.new-content -->
            <div class="col-md-4" id="sidebar">
                <div class="sidebar">
                    @foreach($widgets as $widget)
                        @widget($widget['namespace'])
                    @endforeach
                    {{--@widgetGroup('right_bar')--}}
                </div><!-- /.sidebar -->
            </div><!-- /.col -->
        </div><!-- /.col-md-8 -->
    </div><!-- /.row -->

    {{--<div class="fb-comment-embed" data-href="{{Redis::get('url')}}/{{$record->slug}}" data-width="560" data-include-parent="false"></div>--}}
@endsection


@section('meta_tags')
    <title> {{ $record->name }}  </title>
    <meta name="keywords" content="{{$record->keywords}}"/>
    <meta name="description" content="{{$record->description}}"/>
    <meta name='robots' content='index,follow'>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='pagename' content='{{$record->name}}'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{Redis::get('twitter_account')}}">
    <meta name="twitter:title" content="{{$record->name}}">
    <meta name="twitter:description" content="{{$record->description}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $record->name }} " />
    <meta property="og:url" content="{{Redis::get('url')}}" />
    <meta property="og:site_name" content="{{Redis::get('title')}}" />
    <meta property="og:description" content="{{$record->description}}" />
    <meta property="fb:app_id" content="671303379704288">
    <meta property="og:image" content="{{asset('images/books/' . $record->id . '/original/' .$record->thumbnail)}}"/>
    <meta property="article:published_time" content="{{$record->created_at}}">
    <meta property="article:author" content="">
@endsection

@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script>
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function() {
            jQuery('#content,#sidebar').theiaStickySidebar();
        });
    </script>
@endsection