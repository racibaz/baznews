@extends($activeTheme . '::frontend.master')

@section('content')
    <article class="container" id="container">

        <div class="image-gallery">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-section">
                        <h1>
                            <span>{{ !empty($firstPhoto->subtitle) ? $firstPhoto->subtitle : $firstPhoto->name}}</span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8" id="content-area">
                    <div class="gallery">
                        <div class="paging text-center module">
                            <ul class="pagination">
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $firstPhoto->slug ])}}">İlk
                                        Sayfa</a>
                                </li>
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $lastPhoto->slug ])}}"><i
                                                class="fa fa-angle-left"></i></a>
                                </li>
                                @foreach($galleryPhotos as $index => $galleryPhoto)
                                    <li>
                                        <a href="{{route('show_gallery_photos',['slug' => $galleryPhoto->slug ])}}">{{++$index}}</a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $nextPhoto->slug ])}}"><i
                                                class="fa fa-angle-right"></i></a>
                                </li>
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $lastPhoto->slug ])}}">Son
                                        Sayfa</a>
                                </li>
                            </ul>
                        </div>
                        <div class="img-container module">
                            <div class="img">
                                <a href="{{route('show_gallery_photos',['slug' => $nextPhoto->slug ])}}">
                                    <img src="{{ asset('photos/' . $firstPhoto->id . '/' . $firstPhoto->file)}}"
                                         alt="{{$firstPhoto->name}}" class="img-responsive"/>
                                </a>
                            </div>
                            <div class="pager">
                                <a href="{{route('show_gallery_photos',['slug' => $lastPhoto->slug ])}}"
                                   class="btn left"><i class="fa fa-angle-left"></i></a>
                                <a href="{{route('show_gallery_photos',['slug' => $nextPhoto->slug ])}}"
                                   class="btn right"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="paging text-center module">
                            <ul class="pagination">
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $firstPhoto->slug ])}}">İlk
                                        Sayfa</a>
                                </li>
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $lastPhoto->slug ])}}"><i
                                                class="fa fa-angle-left"></i></a>
                                </li>
                                @foreach($galleryPhotos as $index => $galleryPhoto)
                                    <li>
                                        <a href="{{route('show_gallery_photos',['slug' => $galleryPhoto->slug ])}}">{{++$index}}</a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $nextPhoto->slug ])}}"><i
                                                class="fa fa-angle-right"></i></a>
                                </li>
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $lastPhoto->slug ])}}">Son
                                        Sayfa</a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- /.gallery -->
                    @include($activeTheme . '::frontend.partials._share')
                    @if($firstPhoto->is_comment)
                        @include($activeTheme . '::frontend.partials._comment')
                    @endif
                    <div class="tag-box">
                        @foreach($photoGallery->tags as $tag)
                            <a href="{!! route('tag_search',['q' => $tag->name]) !!}">{{$tag->name}}</a>
                        @endforeach
                    </div>
                    <div class="other-gallery">
                        <div class="f-posts">
                            <div class="title-section">
                                <h1>
                                    <span>{{trans('news::photo_gallery.other_galleries')}}</span>
                                </h1>
                            </div>
                            <div class="gallery-posts">
                                <div class="row">
                                    @foreach($photoCategoryGalleries as $photoCategoryGallery)
                                        <div class="col-md-3">
                                            <div class="r-box module">
                                                <div class="box-img">
                                                    <a href="{{route('show_photo_gallery',['slug' => $photoCategoryGallery->slug ])}}"
                                                       class="news">
                                                        <img src="{{ asset('gallery/' . $photoCategoryGallery->id . '/photos/' . $photoCategoryGallery->thumbnail)}}"
                                                             alt="{{$photoCategoryGallery->name}}"
                                                             title="{{$photoCategoryGallery->title}}">
                                                    </a>
                                                </div>
                                                <div class="img-title">
                                                    <a href="{{route('show_photo_gallery',['slug' => $photoCategoryGallery->slug ])}}">
                                                        {{$photoCategoryGallery->title}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div><!-- /.col-->
                                    @endforeach
                                </div><!-- /.row -->
                            </div><!-- /.gallery-posts -->
                        </div><!-- /.f-posts -->
                    </div><!-- /.other-gallery -->
                </div><!-- /.row -->
                <div class="col-md-4" id="sidebar">
                    <div class="gallery-details module">
                        <div class="details">
                            <div class="time">
                                <small>
                                    <i class="fa fa-clock-o"></i> {{$firstPhoto->updated_at->diffForHumans()}}
                                </small>
                            </div><!-- /.time -->
                            <div class="gallery-text">
                                <p>{{$firstPhoto->content}}</p>
                            </div><!-- /.gallery-text -->
                        </div>
                        <div class="advert advert-right">
                            {!! Cache::tags('Setting', 'Advertisement')->get('right_block_1') !!}
                        </div>
                    </div><!-- /.gallery-details -->
                    <div class="sidebar">
                        <div class="widget">
                            @foreach($widgets as $widget)
                                @widget($widget['namespace'])
                            @endforeach
                        </div>
                    </div><!-- /.sidebar -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.image-gallery -->

    </article><!-- /.article -->

@endsection


@section('meta_tags')
    <title> {{ $photoGallery->title }}  </title>
    <meta name="keywords" content="{{$photoGallery->keywords}}"/>
    <meta name="description" content="{{$photoGallery->description}}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='pagename' content='{{$photoGallery->title}}'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>

@endsection
@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script>
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#content-area,#sidebar').theiaStickySidebar();
        });
    </script>

@endpush
