@extends($activeTheme . '::frontend.master')

@section('content')


    <article class="container" id="container">
        <ul>
            @foreach($records as $record)

                @foreach($record->news as $news)
                    <a href="{!! route('show_news', ['slug' => $news->slug]) !!}">{{$news->title}}</a>
                @endforeach

                {{--todo video,photo ve varsa diğerleri yapılacak--}}

                <br />
            @endforeach
        </ul>
    </article>

@endsection


@section('meta_tags')
    <title> {{ $search }}  </title>
    <meta name="keywords" content="{{$search}}"/>
    <meta name="description" content="{{$search}}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='pagename' content='{{$search}}'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{Redis::get('twitter_account')}}">
    <meta name="twitter:title" content="{{$search}}">
    <meta name="twitter:description" content="{{$search}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $search }} " />
    <meta property="og:url" content="{{Redis::get('url')}}" />
    <meta property="og:site_name" content="{{Redis::get('title')}}" />
    <meta property="og:description" content="{{$search}}" />
    <meta property="fb:app_id" content="671303379704288">
    <meta property="article:author" content="">

@endsection