@extends($activeTheme . '::frontend.master')

@section('content')


    <div class="container" id="container">
        <div class="breadcrumbs">
            <p><a href="{!! route('index') !!}">{{trans('news.common')}}.</a>   \
                @foreach($record->book_categories as $bookCategory)
                    <a href="{!! route('book_category', ['slug' => $bookCategory->slug]) !!}">{{$bookCategory->name}}</a> \
                @endforeach
                {{$record->name}}
            </p>
        </div>
        <div class="row">
            <div class="col-md-8">
                <article class="module">
                    <div id="book-detail">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="book-img">
                                    <img src="http://imageserver.kitapyurdu.com/select.php?imageid=1185590&amp;width=165&amp;isWatermarked=true" alt="">
                                </div>
                            </div>
                            <div class="col-md-8">
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
                        </div><!-- /.row -->
                    </div><!-- /#book-detail -->
                </article>
            </div><!-- /.new-content -->
            <div class="col-md-4">
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
