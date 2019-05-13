@extends($activeTheme . '::frontend.master')

@section('content')

    <div class="container" id="container">
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('common.homepage')}}</a>
            </li>
            <li>
                {{$record->name}}
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8" id="content">
                <article>
                    <div class="bio-content module">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="bio-profile">
                                    <div class="bio-img">
                                        <img src="{{ asset('images/biographies/' . $record->id . '/200x150_' . $record->photo) }}"
                                             alt="{{$record->title}}">
                                    </div>
                                    <div class="bio-detail">
                                        <h1 class="bio-name">{{$record->name}} </h1>
                                    </div>
                                </div><!-- /.bio-profile -->
                            </div>
                            <div class="col-md-8">
                                <div class="content">
                                    <h2>{{$record->title}}</h2>
                                    {!! $record->content !!}
                                </div><!-- /.content -->
                            </div>
                        </div><!-- /.bio-content -->
                    </div><!-- /.module -->
                </article>
                @include($activeTheme . '::frontend.partials._share')
                <div class="other-bio">
                    <div class="title-section">
                        <h2>
                            <span>Diğer Biyografiler</span>
                        </h2>
                    </div>
                    <div class="bio-box module">
                        <ul>
                            @foreach($otherBiographies as $otherBiography)
                                <li>
                                    <a href="{!! route('biography', ['slug' => $otherBiography->slug]) !!}">
                                        <span class="bio-img">
                                            <img src="{{ asset('images/biographies/' . $otherBiography->id . '/104x78_' . $otherBiography->photo) }}"
                                                 alt="{{$otherBiography->title}}" class="img-responsive">
                                        </span>
                                        <div class="bio-detail">
                                            <span class="bio-title">{{$otherBiography->name}}</span>
                                            <span class="bio-excerpt">{{$otherBiography->spot}}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div><!-- /.other-bio -->
                </div><!-- /.other-bio -->

                <div class="module">
                    <div class="advert advert-center">
                        {!! Cache::tags('Setting', 'Advertisement')->get('center_1') !!}
                    </div>
                </div>

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

    {{--<div class="fb-comment-embed" data-href="{{ ur($record->slug) }}" data-width="560" data-include-parent="false"></div>--}}
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
    <meta property="og:title" content="{{ $record->name }} "/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:description" content="{{$record->description}}"/>
    <meta property="fb:app_id" content="{{Cache::tags('Setting')->get('FACEBOOK_CLIENT_ID')}}">
    <meta property="og:image" content="{{asset('images/books/' . $record->id . '/original/' .$record->thumbnail)}}"/>
    <meta property="article:published_time" content="{{$record->created_at}}">
    <meta property="article:author" content="">
@endsection
@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script type="text/javascript">

        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
    </script>
@endpush