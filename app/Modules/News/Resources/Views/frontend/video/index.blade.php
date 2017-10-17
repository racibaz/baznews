@extends($activeTheme . '::frontend.master')

@section('content')
    <article class="container" id="container">
        <div class="row">
            <div class="col-lg-8" id="content">
                <div class="cat-posts">
                    <div class="title-section">
                        <h1>
                            <span>Videolar</span>
                        </h1>
                    </div><!-- /.title-section -->
                    <div class="posts">
                        <div class="row">
                            @foreach($records as $record)
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="r-box module">
                                        <div class="box-img">
                                            <a href="{{route('show_videos',['slug' => $record->slug ])}}">
                                                <img src="{{ asset('videos/' . $record->id . '/497x358_' . $record->thumbnail)}}"
                                                     alt="{{$record->title}}" title="{{$record->title}}"/>
                                                <span class="icon"></span>
                                            </a>
                                        </div>
                                        <div class="img-title">
                                            <a href="{{route('show_videos',['slug' => $record->slug ])}}">
                                                {{$record->name}}
                                            </a>
                                        </div>

                                    </div><!-- /.r-box -->
                                </div><!-- /. -->
                            @endforeach
                        </div>
                        @include($activeTheme . '::frontend.partials._pagination', ['records' => $records ])
                    </div>
                </div>
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
    </article>
@endsection

@section('meta_tags')
    <title> Video List</title>
@endsection
@section('css')
    {{--Css code--}}
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