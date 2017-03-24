@extends($activeTheme . '::frontend.master')

@section('content')


    <div class="container" id="container">
        <div class="breadcrumbs">
            <p><a href="{!! route('index') !!}">{{trans('news.common')}}.</a>   \
                <a href="{!! route('book_category', ['slug' => $record->slug]) !!}">{{$record->name}}</a>
            </p>
        </div>
        <div class="row">
            <div class="col-md-8">
                <article class="module">
                    <div class="publish-books">
                        <div class="publish-name">
                            <h1>
                                <span>{{$record->name}}</span>
                            </h1>
                        </div>
                        <div class="books">
                            <h2>Yayın Evi Kitapları</h2>
                            <div class="row">
                                @foreach($record->books as $record)
                                    <div class="col-md-2">
                                        <div class="book">
                                            <a href="{!! route('book', ['slug' => $record->slug]) !!}">
                                                <span class="book-img">
                                                    <img src="http://imageserver.kitapyurdu.com/select.php?imageid=1185590&amp;width=165&amp;isWatermarked=true" alt="" class="img-responsive">
                                                </span>
                                                <span class="book-name">
                                                    {{$record->name}}
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div><!-- /.books -->
                        </div>
                    </div><!-- /.publish-books -->
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
