@extends($activeTheme . '::frontend.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include($activeTheme . '::frontend.partials._breaking_news', ['breakNewsItems' => $breakNewsItems ])
        </div>
    </div>
    <div class="container" id="container">
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('news.common')}}.</a>
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8">
                <div class="title-section">
                    <h1>
                        <span>{{trans('article::article.article_authors')}}</span>
                    </h1>
                </div>
                <article class="module" style="padding-bottom: 0;">
                    <div class="row">
                        @foreach($records as $record)
                        <div class="col-lg-4">
                            <div class="a-box">
                                <div class="a-inner">
                                    <a href="{!! route('article_author', ['slug' => $record->slug]) !!}">
                                        <img src="{{ asset('images/article_author_images/' . $record->id . '/58x58_' . $record->photo)}}" class="img-circle">
                                        <span class="a-foot">
                                            <span class="name">{{$record->name}}</span>
                                            <span class="bio">{!! $record->cv !!}</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div><!-- /.col-lg-6 -->
                        @endforeach
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

