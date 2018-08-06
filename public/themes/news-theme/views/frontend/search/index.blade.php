@extends($activeTheme . '::frontend.master')

@section('content')

    <article class="container" id="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="title-section">
                    <h1><span>{{trans('search.result')}} </span></h1>
                </div>
                <div class="row">
                    @foreach($results as $index => $result)

                        @foreach($result['data'] as  $data)

                            <div class="col-lg-12 col-sm-6 col-md-6">
                                <div class="news-box module">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-9 col-xs-8">
                                            <div class="news-right-txt">
                                                <a href="
                                                            @if($result['meta_data']->is_require_slug)
                                                                {!! route($result['meta_data']->route_name, ['slug' => $data->slug]) !!}
                                                            @else
                                                                {!! route($result['meta_data']->route_name, ['id' => $data->id]) !!}
                                                            @endif
                                                        ">
                                                    @php $field = $result['meta_data']->field; @endphp
                                                    <span>{{$data->$field}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.col-lg-4 -->

                        @endforeach

                    @endforeach
                </div>
                {{--@include($activeTheme . '::backend.partials._pagination', ['records' => $result])--}}
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
    <meta property="og:title" content="{{ $search }} "/>
    <meta property="og:url" content="{{Cache::tags('Setting')->get('url')}}"/>
    <meta property="og:description" content="{{$search}}"/>
    <meta property="fb:app_id" content="{{Cache::tags('Setting')->get('FACEBOOK_CLIENT_ID')}}">
    <meta property="article:author" content="">
@endsection

