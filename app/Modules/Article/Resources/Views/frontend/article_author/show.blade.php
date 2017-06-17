@extends($activeTheme . '::frontend.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include($activeTheme . '::frontend.partials._breaking_news', ['breakNewsItems' => $breakNewsItems ])
        </div>
    </div>
    <div class="container" id="container">
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('common.homepage')}}.</a>
            </li>
            <li>
                <a href="{!! route('article_category', ['slug' => $record->slug]) !!}">{{$record->name}}</a>
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8" id="content">
                <article class="article-author module">

                    <div class="author-head">
                        <div class="author-img">
                            <img src="{{ asset('images/article_author_images/' . $record->id . '/58x58_' . $record->photo)}}" alt="{{$record->name}}" class="img-circle">
                        </div>
                        <div class="author-name">
                            <h1>{{$record->name}}</h1>
                        </div>
                    </div>

                    <div class="author-bio">
                        {!! $record->cv !!}
                    </div>
                    {{--yazarı : <a href="{!! route('book_author', ['slug' => $record->book_author->slug]) !!}">{{$record->book_author->name}}</a>--}}
                    {{--yayıncı : <a href="{!! route('book_publisher', ['slug' => $record->book_publisher->slug]) !!}">{{$record->book_publisher->name}}</a>--}}
                </article>

                <div class="other-article">
                    <div class="title-section">
                        <h2>
                            <span>{{trans('article::article.other_articles')}}</span>
                        </h2>
                    </div>
                    <div class="module">
                        <ul class="article-list">
                            @foreach($record->articles as $article)
                            <li>
                                <div class="title pull-left">
                                    <a href="{!! route('article', ['slug' => $article->slug]) !!}">
                                        <span>{{$article->title}}</span>
                                    </a>
                                </div>
                                <div class="time pull-right">
                                    <a href="{!! route('article', ['slug' => $article->slug]) !!}">
                                        <i class="fa fa-clock-o"></i>
                                        <span>{{$article->created_at->diffForHumans()}}</span>
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
