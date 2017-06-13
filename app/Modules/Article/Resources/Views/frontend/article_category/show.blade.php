@extends($activeTheme . '::frontend.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include($activeTheme . '::frontend.partials._breaking_news', ['breakNewsItems' => $breakNewsItems ])
        </div>
    </div>
    <div class="container" id="container">
        <div class="breadcrumbs">
            <p><a href="{!! route('index') !!}">{{trans('news.common')}}.</a>   \
                <a href="{!! route('article_category', ['slug' => $record->slug]) !!}">{{$record->name}}</a>
            </p>
        </div>
        <div class="row">
            <div class="col-md-8" id="content">
                <article class="article module">
                    <div class="article-head">
                        <div class="article-detail">
                            <div class="author-name">
                                <h2>{{$record->name}}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="article-content">
                        {{$record->cv}}
                    </div>
                    {{--yazarı : <a href="{!! route('book_author', ['slug' => $record->book_author->slug]) !!}">{{$record->book_author->name}}</a>--}}
                    {{--yayıncı : <a href="{!! route('book_publisher', ['slug' => $record->book_publisher->slug]) !!}">{{$record->book_publisher->name}}</a>--}}
                </article>

                <div class="other-article">
                    <div class="title-section">
                        <h2>
                            <span>Diğer Makaleler</span>
                        </h2>
                    </div>
                    <div class="module">
                        <ul class="article-list">
                            @foreach($record->articles as $record)
                                <li>
                                    <div class="article-title pull-left">
                                        <a href="{!! route('article', ['slug' => $record->slug]) !!}">
                                            <span>{{$record->title}}</span>
                                        </a>
                                    </div>
                                    <div class="time pull-right">
                                        <a href="{!! route('article', ['slug' => $record->slug]) !!}">
                                            <i class="fa fa-clock-o"></i>
                                            <span>{{Carbon\Carbon::parse($record->created_at)->format('d-m-Y')}}</span>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
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

    {{--<div class="fb-comment-embed" data-href="{{Cache::tags('Setting')->get('url')}}/{{$record->slug}}" data-width="560" data-include-parent="false"></div>--}}
@endsection


@section('meta_tags')
    <title> {{ $record->name }}  </title>
    <meta name="keywords" content="{{$record->keywords}}"/>
    <meta name="description" content="{{$record->description}}"/>
    <meta name='robots' content='index,follow'>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{Cache::tags('Setting')->get('twitter_account')}}">
    <meta name="twitter:title" content="{{$record->name}}">
    <meta name="twitter:description" content="{{$record->description}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $record->name }} " />
    <meta property="og:url" content="{{Cache::tags('Setting')->get('url')}}" />
    <meta property="og:site_name" content="{{Cache::tags('Setting')->get('title')}}" />
    <meta property="og:description" content="{{$record->description}}" />
    <meta property="fb:app_id" content="671303379704288">
    <meta property="og:image" content="{{asset('images/books/' . $record->id . '/original/' .$record->thumbnail)}}"/>
    <meta property="article:published_time" content="{{$record->created_at}}">
    <meta property="article:author" content="">
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script type="text/javascript">

        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function() {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
    </script>
@endsection