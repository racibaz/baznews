@extends($activeTheme . '::frontend.master')

@section('content')
    <div class="container" id="container">
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('news.common')}}.</a>
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8">
                <article class="module">
                    <div class="row">
                        @foreach($records as $record)
                        <div class="col-lg-6">
                            <div class="author-box">
                                <div class="author-img">
                                    <img src="{{ asset('images/article_author_images/' . $record->id . '/58x58_' . $record->photo)}}">
                                </div><!-- /.author-img -->
                                <div class="author-content">
                                    <a href="{!! route('article_author', ['slug' => $record->slug]) !!}" class="name">{{$record->name}}</a>
                                    <div class="author-bio">
                                        <p>{!! $record->bio !!}</p>
                                    </div>
                                </div><!-- /.author-content -->
                            </div><!-- /.author-box -->
                        </div><!-- /.col-lg-6 -->
                        @endforeach
                    </div><!-- /.row -->
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

