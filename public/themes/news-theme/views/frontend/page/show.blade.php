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
            <div class="col-md-8">
                <div class="page-content">
                    <h1>{{$record->name}}</h1>

                    {{$record->created_at}}
                    {{$record->updated_at}}

                    <br />
                    {!! $record->content !!}
                </div>

                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=oldu67"></script>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>

                @if($record->is_comment)
                    <div class="discus-box">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="disqus_thread"></div>
                                <script>
                                    var disqus_config = function () {
                                        this.page.url = '{{Redis::get('url')}}/{{$record->slug}}';
                                        this.page.identifier = 'page-{{$record->id}}';
                                        this.page.title = '{{$record->title}}';
                                    };

                                    (function() { // DON'T EDIT BELOW THIS LINE
                                        var d = document, s = d.createElement('script');
                                        s.src = '//baznews.disqus.com/embed.js';
                                        s.setAttribute('data-timestamp', +new Date());
                                        (d.head || d.body).appendChild(s);
                                    })();
                                </script>
                                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            </div>
                        </div><!-- Disqus Yorum Alanı -->
                    </div><!-- /.discus-box -->
                @endif

            </div>
            <div class="col-lg-4">
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
    </article><!-- /.article -->

@endsection

@section('meta_tags')
    <title> {{ $record->name }}  </title>
    <meta name="keywords" content="{{$record->keywords}}"/>
    <meta name="description" content="{{$record->description}}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='pagename' content='{{$record->title}}'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{Redis::get('twitter_account')}}">
    <meta name="twitter:title" content="{{$record->title}}">
    <meta name="twitter:description" content="{{$record->description}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $record->title }} " />
    <meta property="og:url" content="{{Redis::get('url')}}" />
    <meta property="og:site_name" content="{{Redis::get('title')}}" />
    <meta property="og:description" content="{{$record->description}}" />
    <meta property="fb:app_id" content="671303379704288">
    {{--<meta property="og:image" content="{{asset('images/news_images/' . $record->id . '/thumbnail/' .$record->thumbnail)}}"/>--}}
    <meta property="article:published_time" content="{{$record->created_at}}">
    {{--<meta property="article:author" content="">--}}

@endsection