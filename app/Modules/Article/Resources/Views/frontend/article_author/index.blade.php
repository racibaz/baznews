@extends($activeTheme . '::frontend.master')

@section('content')
    <div class="container" id="container">
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('news.common')}}.</a>
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
                <article class="module">
                    <div id="new-content">
                        @foreach($records as $record)
                            <img src="{{ asset('images/article_author_images/' . $record->id . '/58x58_' . $record->photo)}}">
                            <a href="{!! route('article_author', ['slug' => $record->slug]) !!}">{{$record->name}}</a>
                            <br />
                        @endforeach
                    </div>
                </article>
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

    {{--<div class="fb-comment-embed" data-href="{{Redis::get('url')}}/{{$record->slug}}" data-width="560" data-include-parent="false"></div>--}}
@endsection

@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script>
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function() {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
    </script>
@endsection