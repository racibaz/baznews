@extends($activeTheme . '::frontend.master')

@section('content')


    <div class="container" id="container">
        <div class="breadcrumbs">
            <p><a href="{!! route('index') !!}">{{trans('news.common')}}.</a>   \
                {{$record->name}}
            </p>
        </div>
        <div class="row">
            <div class="col-md-8">
                <article class="module">
                    <div class="bio-content">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="bio-profile">
                                    <div class="bio-img">
                                        <img src="{{ asset('images/biographies/' . $record->id . '/104x78_' . $record->photo) }}" alt="{{$record->title}}">
                                    </div>
                                    <div class="bio-detail">
                                        <h1 class="bio-name">{{$record->name}} </h1>
                                        <div class="bio-social">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div><!-- /.bio-profile -->
                            </div>
                            <div class="col-md-8">
                                <div class="content">
                                    <h2>{{$record->title}}</h2>
                                    {{$record->content}}
                                </div><!-- /.content -->
                            </div>
                        </div><!-- /.bio-content -->
                    </div><!-- /.module -->
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
