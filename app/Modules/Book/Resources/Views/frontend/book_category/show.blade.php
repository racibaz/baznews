@extends($activeTheme . '::frontend.master')

@section('content')

    <div class="container" id="container">
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('common.homepage')}}</a>
            </li>
            <li>
                <a href="{!! route('book_category', ['slug' => $bookCategory->slug]) !!}">{{$bookCategory->name}}</a>
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8" id="content">
                <article class="module">
                    <div class="cat-books">
                        <div class="publish-name">
                            <h1>
                                <span>{{$bookCategory->name}}</span>
                            </h1>
                        </div>
                        <div class="books">
                            <h2>{{trans('book::book_category.category_books')}}</h2>

                            <div class="book-list">
                                <div class="row">
                                    @foreach($records as $record)
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <a href="{!! route('book', ['slug' => $record->slug]) !!}"
                                               class="{{$record->name}}">
                                                <div class="thumbnail">
                                                    <a href="{!! route('book', ['slug' => $record->slug]) !!}">
                                                        <img src="{{ asset('images/books/' . $record->id . '/original/' . $record->thumbnail)}}"
                                                             alt="{{$record->name}}" class="img-responsive"/>
                                                    </a>
                                                    <div class="caption">
                                                        <h3>{{$record->name}}</h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div><!-- /.col -->
                                    @endforeach

                                </div><!-- /.row -->
                            </div><!-- /.book-list -->
                        </div>
                    </div><!-- /.cat-books -->
                    @include($activeTheme . '::frontend.partials._pagination', ['records' => $records ])
                </article>
                @include($activeTheme . '::frontend.partials._share')
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

    {{--<div class="fb-comment-embed" data-href="{{ ur($bookCategory->slug) }}" data-width="560" data-include-parent="false"></div>--}}
@endsection


@section('meta_tags')
    <title> {{ $bookCategory->name }}  </title>
    <meta name="keywords" content="{{$bookCategory->keywords}}"/>
    <meta name="description" content="{{$bookCategory->description}}"/>
    <meta name='robots' content='index,follow'>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{Cache::tags('Setting')->get('twitter_account')}}">
    <meta name="twitter:title" content="{{$bookCategory->name}}">
    <meta name="twitter:description" content="{{$bookCategory->description}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $bookCategory->name }} "/>
    <meta property="og:url" content="{{Cache::tags('Setting')->get('url')}}"/>
    <meta property="og:site_name" content="{{Cache::tags('Setting')->get('title')}}"/>
    <meta property="og:description" content="{{$bookCategory->description}}"/>
    <meta property="fb:app_id" content="671303379704288">
    <meta property="og:image"
          content="{{asset('images/books/' . $bookCategory->id . '/original/' .$bookCategory->thumbnail)}}"/>
    <meta property="article:published_time" content="{{$bookCategory->created_at}}">
    <meta property="article:author" content="">
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