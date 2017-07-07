@extends($activeTheme . '::frontend.master')

@section('content')

    <div class="container" id="container">
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('common.homepage')}}</a>
            </li>
            @foreach($record->book_categories as $bookCategory)
                <li>
                    <a href="{!! route('book_category', ['slug' => $bookCategory->slug]) !!}">
                        {{$bookCategory->name}}
                    </a>
                </li>
            @endforeach
            <li>
                {{$record->name}}
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8" id="content">
                <article class="module">
                    <div id="book-detail">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="book-img">
                                    <img src="{{ asset('images/books/' . $record->id . '/original/' . $record->thumbnail)}}"
                                         alt="{{$record->name}}" class="img-responsive"/>
                                </div>
                                <div class="detail">
                                    <ul class="nav">
                                        <li><strong>ISBN:</strong><span>{{$record->ISBN}}</span></li>
                                        <li><strong>Yayın Tarihi:</strong><span>{{$record->release_date}}</span></li>
                                        <li><strong>Sayfa Sayısı:</strong><span>{{$record->number_of_print}}</span></li>
                                        <li><strong>Renk:</strong><span>{{$record->skin_type}}</span></li>
                                        <li><strong>Kağıt Tipi:</strong><span>{{$record->paper_typr}}</span></li>
                                        <li><strong>Öçüleri:</strong><span>{{$record->size}}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="detail-bar">
                                    <div class="book-name">
                                        <h1>
                                            {{$record->name}}
                                        </h1>
                                    </div>
                                    <div class="book-author">
                                        <a href="{!! route('book_author', ['slug' => $record->book_author->slug]) !!}">
                                            <span>{{$record->book_author->name}}</span>
                                        </a>
                                    </div>
                                    <div class="book-publisher">
                                        <a href="{!! route('book_publisher', ['slug' => $record->book_publisher->slug]) !!}">
                                            <span>{{$record->book_publisher->name}}</span>
                                        </a>
                                    </div>
                                    <div class="book-desc">
                                        {{$record->description}}
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /#book-detail -->
                </article>

                    <div class="share-box">
                        <div class="title-section">
                            <h1>
                                <span>Paylaş</span>
                            </h1>
                        </div>
                        {!! Cache::tags('Setting')->get('addthis') !!}
                    </div>

                    @if($record->is_comment)
                        <div class="discus-box">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Cache::tags('Setting')->get('disqus') !!}
                                </div>
                            </div>
                        </div><!-- /.discus-box -->
                    @endif

                    <div class="other-books">
                        <div class="title-section">
                            <h2><span>Diğer Kitaplar</span></h2>
                        </div>
                        <div class="book-list module">
                            <div class="row">
                                @foreach($firstCategoryBooks as $book)
                                    <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                                        <a href="{!! route('book', ['slug' => $book->slug]) !!}" class="thumbnail">
                                            <img src="{{ asset('images/books/' . $book->id . '/original/' . $book->thumbnail)}}"
                                                 alt="{{$book->name}}"/>
                                            <div class="caption">
                                                <h3>{{$book->name}}</h3>
                                            </div>
                                        </a>
                                    </div><!-- /.col -->
                                @endforeach
                            </div><!-- /.row -->
                        </div><!-- /.book-list -->
                    </div><!-- /.other-books -->

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

    {{--<div class="fb-comment-embed" data-href="{{ ur($record->slug) }}" data-width="560" data-include-parent="false"></div>--}}
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
    <meta property="og:title" content="{{ $record->name }} "/>
    <meta property="og:url" content="{{Cache::tags('Setting')->get('url')}}"/>
    <meta property="og:site_name" content="{{Cache::tags('Setting')->get('title')}}"/>
    <meta property="og:description" content="{{$record->description}}"/>
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
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
    </script>
@endsection