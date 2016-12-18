@extends($activeTheme . '::frontend.master')

@section('content')

    <article class="container" id="container">
        <div class="row">
            <div class="col-md-12">
                <div class="last-time" id="son-dakika">
                    <h4>Son Dakika:</h4>
                    <a href="new-details.html">Tortor Cras Nibh Egestas Vestibulum</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="cat-posts">
                    <div class="title-section">
                        <h1>
                            <span>{{$newsCategory->name}}</span>
                        </h1>
                    </div><!-- /.title-section -->
                    <div class="row">
                        @foreach($records as $record)
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="r-box">
                                    <a href="{{ route('show_news', ['slug' => $record->slug]) }}">
                                        <img src="{{asset('images/news_images/' . $record->id . '/165x90_' . $record->thumbnail)}}" alt="{{$record->title}}">
                                        <span class="c-text">{{$record->title}}</span>
                                    </a>
                                </div><!-- /.r-box -->
                            </div><!-- /. -->
                        @endforeach
                    </div><!-- /.row -->
                </div>
            </div>
            <div class="col-lg-5">
                <div class="sidebar">
                    <div class="widget">
                        @foreach($widgets as $widget)
                            @widget($widget['namespace'])
                            <br />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection

@section('meta_tags')
    <title>{{ $newsCategory->name }}</title>
    <meta name="keywords" content="{{$newsCategory->keywords}}"/>
    <meta name="description" content="{{$newsCategory->description}}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='pagename' content='{{$newsCategory->title}}'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>
@endsection
