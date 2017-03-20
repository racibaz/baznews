@extends($activeTheme . '::frontend.master')

@section('content')
    <div class="container" id="container">
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('news.common')}}</a>
            </li>
            <li>
                <a href="{!! route('book_category', ['slug' => $record->slug]) !!}">{{$record->name}}</a>
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8" id="content">
                <article class="books">
                    <div class="publish-books module">
                        <div class="publish-name">
                            <h1>
                                <span>{{$record->name}}</span>
                            </h1>
                        </div>
                        <div class="books">
                            <h2>Yayın Evi Kitapları</h2>
                            <div class="book-list">
                                <div class="row">
                                    @foreach($record->books as $record)
                                    <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                                        <a href="{!! route('book', ['slug' => $record->slug]) !!}" class="thumbnail">
                                            <img src="http://imageserver.kitapyurdu.com/select.php?imageid=1185590&amp;width=165&amp;isWatermarked=true" alt="" class="img-responsive">
                                            <div class="caption">
                                                <h3>{{$record->name}}</h3>
                                            </div>
                                        </a>
                                    </div><!-- /.col -->
                                    @endforeach
                                </div><!-- /.row -->
                            </div><!-- /.book-list -->
                        </div><!-- /.books -->
                    </div><!-- /.publish-books -->
                </article>
                <div class="other-books">
                    <div class="title-section">
                        <h2>
                            <span>Diğer Kitapları</span>
                        </h2>
                    </div>
                    <div class="module">
                        <div class="book-list">
                            <div class="row">
                                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                                    <a href="#" class="thumbnail">
                                        <img src="http://imageserver.kitapyurdu.com/select.php?imageid=1185590&amp;width=165&amp;isWatermarked=true" alt="">
                                        <div class="caption">
                                            <h3>Title</h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                                    <a href="#" class="thumbnail">
                                        <img src="http://imageserver.kitapyurdu.com/select.php?imageid=1185590&amp;width=165&amp;isWatermarked=true" alt="">
                                        <div class="caption">
                                            <h3>Title</h3>
                                        </div>
                                    </a>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.book-list -->
                    </div>
                </div><!-- /.other-books -->

                <div class="advert-center module">
                    <img src="{{ Theme::asset($activeTheme . '::img/advert-images/728x90.png') }}" alt="Advert Center">
                </div><!-- /.advert-center -->

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