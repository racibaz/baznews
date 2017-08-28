@extends($activeTheme . '::frontend.master')

@section('content')
    <article class="container" id="container">

        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('common.homepage')}}</a>
            </li>
            <li>
                <a href="{!! route('show_news_category', ['slug' => $record->slug]) !!}">
                    {{$record->name}}
                </a>
            </li>
            <li>
                {{$record->title}}
            </li>
        </ol>

        <div class="row">
            <div class="col-md-8" id="content">
                <div class="page-content module">
                    <h1 class="page-title">{{$record->name}}</h1>
                    <div class="time">
                        <i class="fa fa-clock-o"></i>
                        <span>{{$record->created_at}}</span>
                        <span>{{$record->updated_at}}</span>
                    </div>
                    <div class="content">
                        {!! $record->content !!}
                    </div>
                </div>

                @include($activeTheme . '::frontend.partials._share')

                @if($record->is_comment)
                    @include($activeTheme . '::frontend.partials._comment')
                @endif

            </div>
            <div class="col-lg-4" id="sidebar">
                <div class="sidebar">
                    <div class="widget">
                        @foreach($widgets as $widget)
                            @widget($widget['namespace'])
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
    <meta name='pagename' content='{{$record->name}}'>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{Cache::tags('Setting')->get('twitter_account')}}">
    <meta name="twitter:title" content="{{$record->name}}">
    <meta name="twitter:description" content="{{$record->description}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $record->name }} "/>
    <meta property="og:url" content="{{Cache::tags('Setting')->get('url')}}"/>
    <meta property="og:site_name" content="{{Cache::tags('Setting')->get('title')}}"/>
    <meta property="og:description" content="{{$record->description}}"/>
    <meta property="fb:app_id" content="671303379704288">
    {{--<meta property="og:image" content="{{asset('images/news_images/' . $record->id . '/thumbnail/' .$record->thumbnail)}}"/>--}}
    <meta property="article:published_time" content="{{$record->created_at}}">
    {{--<meta property="article:author" content="">--}}

@endsection

@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script type="text/javascript">
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
    </script>
@endsection