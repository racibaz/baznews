@extends($activeTheme . '::frontend.master')

@section('content')
    <div class="container" id="container">
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('common.homepage')}}</a>
            </li>
            <li>
                <a href="{!! route('book_publisher', ['slug' => $bookPublisher->slug]) !!}">{{$bookPublisher->name}}</a>
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8" id="content">
                <article class="module">
                    <div class="publish-books">
                        <div class="publish-name">
                            <h1>
                                <span>{{$bookPublisher->name}}</span>
                            </h1>
                        </div>
                        <div class="books">
                            <h2>Yayın Evi Kitapları</h2>
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
                    </div><!-- /.publish-books -->
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

    {{--<div class="fb-comment-embed" data-href="{{ ur($bookPublisher->slug) }}" data-width="560" data-include-parent="false"></div>--}}
@endsection


@section('meta_tags')
    <title> {{ $bookPublisher->name }}  </title>
    <meta name="keywords" content="{{$bookPublisher->keywords}}"/>
    <meta name="description" content="{{$bookPublisher->description}}"/>
    <meta name='robots' content='index,follow'>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{Cache::tags('Setting')->get('twitter_account')}}">
    <meta name="twitter:title" content="{{$bookPublisher->name}}">
    <meta name="twitter:description" content="{{$bookPublisher->description}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $bookPublisher->name }} "/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:description" content="{{$bookPublisher->description}}"/>
    <meta property="fb:app_id" content="{{Cache::tags('Setting')->get('FACEBOOK_CLIENT_ID')}}">
    <meta property="og:image"
          content="{{asset('images/books/' . $bookPublisher->id . '/original/' .$bookPublisher->thumbnail)}}"/>
    <meta property="article:published_time" content="{{$bookPublisher->created_at}}">
    <meta property="article:author" content="">
@endsection
@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script type="text/javascript">

        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
    </script>
@endpush