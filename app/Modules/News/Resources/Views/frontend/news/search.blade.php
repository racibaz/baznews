@extends($activeTheme . '::frontend.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include($activeTheme . '::frontend.partials._breaking_news', ['breakNewsItems' => $breakNewsItems ])
        </div>
    </div>
    <article class="container" id="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="title-section">
                    <h1><span>{{trans('news::news.search_result')}} </span></h1>
                </div>
                <div class="row">
                    @foreach($records as $record)
                        <div class="col-lg-12 col-sm-6 col-md-6">
                            <div class="news-box module">
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-xs-4">
                                        <div class="frame-image">
                                            <a href="{!! route('show_news', ['slug' => $record->slug]) !!}">
                                                <img src="{{ asset('images/news_images/' . $record->id . '/196x150_' . $record->thumbnail )}}" alt="{{ $record->title }}" >
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-9 col-xs-8">
                                        <div class="news-right-txt">
                                            <a href="{!! route('show_news', ['slug' => $record->slug]) !!}">
                                                <h2>{{$record->title}}</h2>
                                            </a>
                                            <div class="news-meta-left">
                                                <a href="#" class="meta-date" title="" ><i class="fa fa-clock-o"></i> {{$record->updated_at->diffForHumans()}}</a>
                                            </div>
                                            <div class="news-excerpt">
                                                {{$record->spot}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col-lg-4 -->
                    @endforeach
                </div>
                @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
            </div>
            <div class="col-md-4" id="sidebar">
                <div class="sidebar">
                    <div class="widget">
                        @foreach($widgets as $widget)
                            @widget($widget['namespace'])
                        @endforeach
                    </div>
                    {{--@widgetGroup('right_bar')--}}
                </div><!-- /.sidebar -->
            </div><!-- /.col -->
        </div>
     </article>
@endsection

@section('meta_tags')
    <title> {{ $search }}  </title>
    <meta name="keywords" content="{{$search}}"/>
    <meta name="description" content="{{$search}}"/>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{Cache::tags('Setting')->get('twitter_account')}}">
    <meta name="twitter:title" content="{{$search}}">
    <meta name="twitter:description" content="{{$search}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $search }} " />
    <meta property="og:url" content="{{Cache::tags('Setting')->get('url')}}" />
    <meta property="og:site_name" content="{{Cache::tags('Setting')->get('title')}}" />
    <meta property="og:description" content="{{$search}}" />
    <meta property="fb:app_id" content="671303379704288">
    <meta property="article:author" content="">
@endsection

