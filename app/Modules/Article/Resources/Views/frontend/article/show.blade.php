@extends($activeTheme . '::frontend.master')

@section('content')


    <div class="container" id="container">
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('news.common')}}.</a>
            </li>
            @foreach($record->article_categories as $articleCategory)
            <li>
                <a href="{!! route('show_news_category', ['slug' => $articleCategory->slug]) !!}">
                    {{$articleCategory->name}}
                </a>
            </li>
            @endforeach
            <li>
                {{$record->name}}
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8" id="content">
                <article class="article-content module">
                    <h1 class="article-title">{{$record->title}}</h1>
                    <div class="author">
                        <span>Yazar : </span>
                        <a href="{!! route('article_author', ['slug' => $record->article_author->slug]) !!}">{{$record->article_author->name}}</a>
                    </div>
                    <div class="content">
                        <p>Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur. Maecenas faucibus mollis interdum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Etiam porta sem malesuada magna mollis euismod.</p>
                        <p>Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo. Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
{{--                        yazarı : <a href="{!! route('book_author', ['slug' => $record->book_author->slug]) !!}">{{$record->book_author->name}}</a>--}}
{{--                        yayıncı : <a href="{!! route('book_publisher', ['slug' => $record->book_publisher->slug]) !!}">{{$record->book_publisher->name}}</a>--}}
                    </div>
                </article>
                <div class="author-article">
                    <div class="title-section">
                        <h3>
                            <span>Yazarın Diğer Makaleleri</span>
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="articles module">
                                <ul class="article-list">
                                    <li>
                                        <a href="#">
                                            <span class="time">
                                                <i class="fa fa-clock-o"></i> 12 Mart
                                            </span>
                                            <h3 class="title">
                                                Yazarın makale başlığı
                                            </h3>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="time">
                                                <i class="fa fa-clock-o"></i> 12 Mart
                                            </span>

                                            <h3 class="title">
                                                Yazarın makale başlığı
                                            </h3>
                                        </a>
                                    </li>


                                </ul><!-- /.article-list -->
                            </div><!-- /.articles -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                </div><!-- /.author-article -->
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

@endsection
