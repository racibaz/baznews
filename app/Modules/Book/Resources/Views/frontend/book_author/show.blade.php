@extends($activeTheme . '::frontend.master')

@section('content')

    <div class="container" id="container">
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('common.homepage')}}</a>
            </li>
            <li>
                {{$bookAuthor->name}}
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8" id="content">
                <article class="module">
                    <div class="author-books">
                        <div class="author-head">
                            <div class="author-img">
                                <img src="{{ asset('images/book_authors/' . $bookAuthor->id . '/58x58_' . $bookAuthor->thumbnail)}}"
                                     alt="{{$bookAuthor->name}}"/>
                            </div>
                            <div class="detail">
                                <div class="author-name"><h1><span>{{$bookAuthor->name}}</span></h1></div>
                                <div class="author-bio">
                                    {{$bookAuthor->bio_note}}
                                </div>
                            </div>
                        </div>
                        <div class="books">
                            <h2>Yazarın Kitapları</h2>
                            <div class="book-list">
                                <div class="row">
                                    @foreach($records as $record)
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <a href="{!! route('book', ['slug' => $record->slug]) !!}"
                                               class="{{$record->name}}">
                                                <div class="thumbnail">
                                                    <img src="{{ asset('images/books/' . $record->id . '/original/' . $record->thumbnail)}}"
                                                         alt="{{$record->name}}" class="img-responsive"/>
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
                        @include($activeTheme . '::frontend.partials._pagination', ['records' => $records ])
                    </div>
                </article>
                <div class="share-box">
                    <div class="title-section">
                        <h1>
                            <span>Paylaş</span>
                        </h1>
                    </div>
                    {!! Cache::tags('Setting')->get('addthis') !!}
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

    {{--<div class="fb-comment-embed" data-href="{{ ur($bookAuthor->slug) }}" data-width="560" data-include-parent="false"></div>--}}
@endsection


@section('meta_tags')
    <title> {{ $bookAuthor->name }}  </title>
    <meta name="keywords" content="{{$bookAuthor->keywords}}"/>
    <meta name="description" content="{{$bookAuthor->description}}"/>
    <meta name='robots' content='index,follow'>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{Cache::tags('Setting')->get('twitter_account')}}">
    <meta name="twitter:title" content="{{$bookAuthor->name}}">
    <meta name="twitter:description" content="{{$bookAuthor->description}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $bookAuthor->name }} "/>
    <meta property="og:url" content="{{Cache::tags('Setting')->get('url')}}"/>
    <meta property="og:site_name" content="{{Cache::tags('Setting')->get('title')}}"/>
    <meta property="og:description" content="{{$bookAuthor->description}}"/>
    <meta property="fb:app_id" content="671303379704288">
    <meta property="og:image"
          content="{{asset('images/books/' . $bookAuthor->id . '/original/' .$bookAuthor->thumbnail)}}"/>
    <meta property="article:published_time" content="{{$bookAuthor->created_at}}">
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