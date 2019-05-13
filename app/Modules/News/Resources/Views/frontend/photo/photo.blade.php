@extends($activeTheme . '::frontend.master')

@section('content')
    <article class="container" id="container">
        <div class="image-gallery">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-section">
                        <h1>
                            <span>{{ !empty($photo->subtitle) ? $photo->subtitle : $photo->name}}</span>
                        </h1>
                    </div>
                </div>
                <div class="col-lg-8" id="content-area">
                    <div class="gallery">
                        <div class="text-center module">
                            <ul class="pagination">
                                <li>
                                    <a href="{{route('show_photo',['slug' => $previousPhoto->slug ])}}"><i
                                                class="fa fa-angle-left"></i></a>
                                </li>
                                <li><a href="{{route('show_photo',['slug' => $photo->slug ])}}">{{$photo->name}}</a>
                                </li>
                                <li>
                                    <a href="{{route('show_photo',['slug' => $nextPhoto->slug ])}}"><i
                                                class="fa fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="img-container module">
                            <div class="img">
                                <a href="{{route('show_photo',['slug' => $photo->slug ])}}">
                                    <img src="{{ asset('photos/' . $photo->id . '/497x358_' . $photo->file)}}"
                                         alt="{{$photo->name}}" class="img-responsive"/>
                                </a>
                            </div>
                            <div class="pager">

                                <a href="{{route('show_photo',['slug' => $previousPhoto->slug ])}}" class="btn left">
                                    <i class="fa fa-angle-left"></i>
                                </a>

                                <a href="{{route('show_photo',['slug' => $nextPhoto->slug ])}}" class="btn right">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="text-center module">
                            <ul class="pagination">
                                <li>
                                    <a href="{{route('show_photo',['slug' => $previousPhoto->slug ])}}"><i
                                                class="fa fa-angle-left"></i></a>
                                </li>
                                <li><a href="{{route('show_photo',['slug' => $photo->slug ])}}">{{$photo->name}}</a>
                                </li>
                                <li>
                                    <a href="{{route('show_photo',['slug' => $nextPhoto->slug ])}}"><i
                                                class="fa fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- /.gallery -->

                    @include($activeTheme . '::frontend.partials._share')

                    @if($photo->is_comment)
                        @include($activeTheme . '::frontend.partials._comment')
                    @endif

                </div><!-- /.col -->
                <div class="col-lg-4" id="sidebar">
                    <div class="gallery-details module">
                        <div class="gallery-text">
                            <p>{{$photo->content}}</p>
                        </div><!-- /.gallery-text -->
                        <div class="time">
                            <small>
                                <i class="fa fa-clock-o"></i> {{$photo->updated_at}}
                            </small>
                        </div><!-- /.time -->
                    </div><!-- /.gallery-details -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        @foreach($photo->tags as $tag)
                            <a href="{!! route('tag_search',['q' => $tag->name]) !!}">{{$tag->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article><!-- /.article -->
@endsection


@section('meta_tags')
    <title>{{$photo->name}}</title>
    <meta name="keywords" content="{{$photo->keywords}}"/>
    <meta name="description" content="{{$photo->description}}"/>
    <meta name='pagename' content='{{$photo->name}}'>
@endsection


@section('css')
@endsection

@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script>
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#content-area,.sidebar').theiaStickySidebar({});
        });
    </script>
@endpush
