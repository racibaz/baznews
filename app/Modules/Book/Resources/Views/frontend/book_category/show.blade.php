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
                <a href="{!! route('book_category', ['slug' => $record->slug]) !!}">{{$record->name}}</a>
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8" id="content">
                <article class="module">
                    <div class="cat-books">
                        <div class="publish-name">
                            <h1>
                                <span>{{$record->name}}</span>
                            </h1>
                        </div>
                        <div class="books">
                            <h2>{{trans('book::book_category.category_books')}}</h2>

                            <div class="book-list">
                                <div class="row">
                                    @foreach($record->books as $book)
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <a href="{!! route('book', ['slug' => $book->slug]) !!}" class="{{$book->name}}">
                                                <div class="thumbnail">
                                                    <a href="{!! route('book', ['slug' => $book->slug]) !!}">
                                                        <img src="{{ asset('images/books/' . $book->id . '/original/' . $book->thumbnail)}}" alt="{{$book->name}}" class="img-responsive"/>
                                                    </a>
                                                    <div class="caption">
                                                        <h3>{{$book->name}}</h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div><!-- /.col -->
                                    @endforeach

                                </div><!-- /.row -->
                            </div><!-- /.book-list -->
                        </div>
                    </div><!-- /.cat-books -->
                </article>
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