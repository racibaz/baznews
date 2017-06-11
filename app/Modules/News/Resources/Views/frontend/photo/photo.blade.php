@extends($activeTheme . '::frontend.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include($activeTheme . '::frontend.partials._breaking_news', ['breakNewsItems' => $breakNewsItems ])
        </div>
    </div>
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
                                    <a href="{{route('show_photo',['slug' => $previousPhoto->slug ])}}"><i class="fa fa-angle-left"></i></a>
                                </li>
                                <li><a href="{{route('show_photo',['slug' => $photo->slug ])}}">{{$photo->name}}</a></li>
                                <li>
                                    <a href="{{route('show_photo',['slug' => $nextPhoto->slug ])}}"><i class="fa fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="img-container module">
                            <div class="img">
                                <a href="{{route('show_photo',['slug' => $photo->slug ])}}">
                                    <img src="{{ asset('gallery/' . $photo->photo_gallery_id . '/photos/' . $photo->file)}}" alt="{{$photo->name}}" class="img-responsive" />
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
                                    <a href="{{route('show_photo',['slug' => $previousPhoto->slug ])}}"><i class="fa fa-angle-left"></i></a>
                                </li>
                                <li><a href="{{route('show_photo',['slug' => $photo->slug ])}}">{{$photo->name}}</a></li>
                                <li>
                                    <a href="{{route('show_photo',['slug' => $nextPhoto->slug ])}}"><i class="fa fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- /.gallery -->

                    <div class="share-box">
                        <div class="title-section">
                            <h1>
                                <span>{{trans('common.share')}}</span>
                            </h1>
                        </div>
                        {!! Cache::tags('Setting')->get('addthis') !!}
                    </div>
                @if($record->is_comment)
                    <div class="discus-box">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Cache::tags('Setting')->get('disqus') !!}
                            </div>
                        </div>
                    </div><!-- /.discus-box -->
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
            <div class="row" id="home_center">
                <div class="col-md-8">
                    <div class="f-posts">
                        <div class="title-section">
                            <h1>
                                <span>{{trans('news::photo_gallery.other_galleries')}}</span>
                            </h1>
                        </div>
                        <div class="gallery-posts module">
                            <div class="row">
                                @foreach($lastPhotos as $lastPhoto)
                                    <div class="col-md-4">
                                        <a href="{{route('show_photo',['slug' => $lastPhoto->slug ])}}" class="news">
                                            <div class="pic">
                                                <img src="{{ asset('gallery/' . $lastPhoto->photo_gallery_id . '/photos/' . $lastPhoto->thumbnail)}}" alt="{{$lastPhoto->name}}"
                                                     title="{{$lastPhoto->name}}"/>
                                            </div>
                                        </a>
                                    </div><!-- /.col-->
                                @endforeach
                            </div><!-- /.row -->
                        </div><!-- /.gallery-post -->
                    </div><!-- /.f-posts -->

                    <div class="share-box">
                        <div class="title-section">
                            <h1>
                                <span>{{trans('news::common.share')}}</span>
                            </h1>
                        </div>
                        {!! Cache::tags('Setting')->get('addthis') !!}
                    </div>

                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>


    </article><!-- /.article -->

@endsection


@section('meta_tags')
    <title>{{$photo->name}}</title>
    <meta name="keywords" content="{{$photo->keywords}}"/>
    <meta name="description" content="{{$photo->description}}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='pagename' content='{{$photo->name}}'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>
@endsection


@section('css')
@endsection

@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script>
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function() {
            jQuery('#content-area,.sidebar').theiaStickySidebar({
            });
        });
    </script>
@endsection
