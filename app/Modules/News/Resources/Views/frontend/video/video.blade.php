@extends($activeTheme . '::frontend.master')

@section('content')

    <article>
        <div class="container" id="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="last-time" id="son-dakika">
                        <h4>Son Dakika:</h4>
                        <a href="new-details.html">Tortor Cras Nibh Egestas Vestibulum</a>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs">
                <p><a href="{!! route('index') !!}">{{trans('news.common')}}.</a>   \\
                    <a href="{{route('show_video_gallery',['slug' => $videoGallery->slug ])}}">
                        {{$videoGallery->title}}
                    </a>   \\
                    {{$video->name}}
                </p>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div id="new-content">
                        <div class="share-box">
                            <ul class="nav nav-justified">
                                <li>
                                    <a class="btn btn-block btn-social btn-facebook">
                                        <span class="fa fa-facebook"></span> Paylaş
                                    </a>
                                </li>
                                <li>
                                    <a class="btn btn-block btn-social btn-twitter">
                                        <span class="fa fa-twitter"></span> Paylaş
                                    </a>
                                </li>
                                <li>
                                    <a class="btn btn-block btn-social btn-google">
                                        <span class="fa fa-google-plus"></span> Paylaş
                                    </a>
                                </li>
                                <li>
                                    <a class="btn btn-block btn-social btn-linkedin">
                                        <span class="fa fa-linkedin"></span> Paylaş
                                    </a>
                                </li>
                            </ul><!-- /.nav -->
                        </div><!-- /.share-box -->
                        <div class="playerbox">

                            <div class="player">

                                @if(!empty($video->thumbnail))
                                    <video id="{{$video->id}}"
                                           class="video-js vjs-default-skin"
                                           controls preload="auto"
                                           poster="http://video-js.zencoder.com/oceans-clip.png"
                                           data-setup='{"example_option":true}'>
                                        <source src="{{url($video->file)}}" type="video/mp4" />
                                        <source src="{{url($video->file)}}" type="video/webm" />
                                        <source src="{{url($video->file)}}" type="video/ogg" />
                                        {{--<source src="http://video-js.zencoder.com/oceans-clip.ogv" type="video/ogg" />--}}
                                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                    </video>
                                @elseif(!empty($video->link))
                                    <video
                                            id="{{$video->id}}"
                                            class="video-js vjs-default-skin"
                                            controls
                                            {{--data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{url($video->link)}}"}] }'--}}
                                            data-setup='{ "techOrder": ["vimeo"], "sources": [{ "type": "video/vimeo", "src": "{{url($video->link)}}"}] }'>
                                    </video>
                                @endif
                            </div>

                            <div class="description">
                                <em>{{$videoGallery->title}} / {{$video->updated_at}}</em>
                                <h1>{{$video->title}}</h1>
                                <h2>{{$video->content}}</h2>
                                @foreach($tags as $tag)
                                {{$tag->name}},
                                @endforeach
                            </div>
                        </div>
                    </div><!-- /.new-content -->
                </div><!-- /.col-md-8 -->
                <div class="col-md-4">
                    <div class="sidebar">

                        <div class="sidebar-video">
                            <div class="title-section">
                                <h1>
                                    <span>Next Video</span>
                                </h1>
                            </div>
                            <div class="video-link">
                                {{--<a href="#">--}}
                                    {{--<div class="hold">--}}
                                        {{--<img src="img/video-manset/sidebar-video-img.jpg" alt="{{$nextVideo->name}}" title="{{$nextVideo->name}}">--}}
                                        {{--<i class="icon play"></i>--}}
                                    {{--</div>--}}
                                    {{--<span class="title">{{$nextVideo->name}}</span>--}}
                                    {{--<span class="time visible-lg">SAĞLIK - {{$nextVideo->updated_at}}</span>--}}
                                {{--</a>--}}
                            </div>
                        </div><!-- /.sidebar-video -->

                        <div class="sidebar-video">
                            <div class="title-section">
                                <h1>
                                    <span>you may also be interested in</span>
                                </h1>
                            </div>

                            @foreach($otherGalleryVideos as $otherGalleryVideo)
                                <div class="video-link">
                                    <a href="#">
                                        <div class="hold">
                                            <img src="img/video-manset/sidebar-video-img.jpg" alt="58 bedenden 38'e düştü!" title="58 bedenden 38'e düştü!">
                                            <i class="icon play"></i>
                                        </div>
                                        <span class="title">{{$otherGalleryVideo->name}}</span>
                                        <span class="time visible-lg">SAĞLIK - {{$otherGalleryVideo->updated_at}}</span>
                                    </a>
                                </div><!-- /.video-link -->
                            @endforeach
                        </div><!-- /.sidebar-video -->

                        <div class="nw-sm-img">
                            <div role="tabpanel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#son_dakika" aria-controls="son_dakika" role="tab" data-toggle="tab">Son Dakika</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#cok_okunanlar" aria-controls="cok_okunanlar" role="tab" data-toggle="tab">Çok Okunanlar</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="video">
                                        <ul class="new-list no-list slide-tab">
                                            <li class="nw-bx no-list active">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">1</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                            <li class="nw-bx no-list">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">2</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                            <li class="nw-bx no-list">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">3</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                            <li class="nw-bx no-list">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">4</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                            <li class="nw-bx no-list">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">5</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                        </ul><!-- /.new-list -->
                                    </div><!-- /.tab-pane -->
                                    <div role="tabpanel" class="tab-pane" id="son_dakika">
                                        <ul class="new-list no-list ">
                                            <li class="nw-bx no-list active">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">1</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                            <li class="nw-bx no-list">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">2</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                            <li class="nw-bx no-list">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">3</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                            <li class="nw-bx no-list">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">4</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                            <li class="nw-bx no-list">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">5</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                        </ul><!-- /.new-list -->
                                    </div><!-- /.tab-pane -->
                                    <div role="tabpanel" class="tab-pane" id="cok_okunanlar">
                                        <ul class="new-list no-list">
                                            <li class="nw-bx no-list active">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">1</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                            <li class="nw-bx no-list">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">2</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                            <li class="nw-bx no-list">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">3</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                            <li class="nw-bx no-list">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">4</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                            <li class="nw-bx no-list">
                                                <a href="new-details.html" title="" class="full-link"></a>
                                                <span class="imgwrap">
                                        <img src="img/mini-spot/d_296_2.jpg" alt="">
                                    </span>
                                                <span class="dec">5</span>
                                                <div class="spot">Pellentesque Quam</div>
                                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                            </li>
                                        </ul><!-- /.new-list -->
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div><!-- /rabpanel -->
                        </div><!-- /.nw-sm-img -->
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="videos">
                <div class="title-section">
                    <h1>
                        <span>Categories Other Videos</span>
                        <a href="video-details.html" class="btn btn-primary btn-xs m-v-btn">Daha fazla</a>
                    </h1>
                </div><!-- /.title-section -->
                <div class="row">

                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="r-box">
                            <a href="video-details.html">
                                <img src="img/video-manset/related-img.jpg" alt="">
                                <i class="icon"></i>
                                <span class="c-text">
                            Cras Nullam Vulputate Cras
                        </span>
                            </a>
                        </div><!-- /.r-box -->
                    </div><!-- /. -->

                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="r-box">
                            <a href="video-details.html">
                                <img src="img/video-manset/related-img.jpg" alt="">
                                <i class="icon"></i>
                                <span class="c-text">
                            Cras Nullam Vulputate Cras
                        </span>
                            </a>
                        </div><!-- /.r-box -->
                    </div><!-- /. -->

                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="r-box">
                            <a href="#">
                                <img src="img/video-manset/related-img.jpg" alt="">
                                <i class="icon"></i>
                                <span class="c-text">
                            Cras Nullam Vulputate Cras
                        </span>
                            </a>
                        </div><!-- /.r-box -->
                    </div><!-- /. -->

                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="r-box">
                            <a href="#">
                                <img src="img/video-manset/related-img.jpg" alt="">
                                <i class="icon"></i>
                                <span class="c-text">
                            Cras Nullam Vulputate Cras
                        </span>
                            </a>
                        </div><!-- /.r-box -->
                    </div><!-- /. -->

                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="r-box">
                            <a href="video-details.html">
                                <img src="img/video-manset/related-img.jpg" alt="">
                                <i class="icon"></i>
                                <span class="c-text">
                            Cras Nullam Vulputate Cras
                        </span>
                            </a>
                        </div><!-- /.r-box -->
                    </div><!-- /. -->


                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="r-box">
                            <a href="video-details.html">
                                <img src="img/video-manset/related-img.jpg" alt="">
                                <i class="icon"></i>
                                <span class="c-text">
                            Cras Nullam Vulputate Cras
                        </span>
                            </a>
                        </div><!-- /.r-box -->
                    </div><!-- /. -->


                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="r-box">
                            <a href="video-details.html">
                                <img src="img/video-manset/related-img.jpg" alt="">
                                <i class="icon"></i>
                                <span class="c-text">
                            Cras Nullam Vulputate Cras
                        </span>
                            </a>
                        </div><!-- /.r-box -->
                    </div><!-- /. -->

                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="r-box">
                            <a href="#">
                                <img src="img/video-manset/related-img.jpg" alt="">
                                <i class="icon"></i>
                                <span class="c-text">
                            Cras Nullam Vulputate Cras
                        </span>
                            </a>
                        </div><!-- /.r-box -->
                    </div><!-- /. -->

                </div><!-- /.row -->
            </div><!-- /.videos -->
        </div>
    </article><!-- /.article -->

@endsection


@section('meta_tags')
    <title> {{ $videoGallery->title }}  </title>
    <meta name="keywords" content="{{$videoGallery->keywords}}"/>
    <meta name="description" content="{{$videoGallery->description}}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='pagename' content='{{$videoGallery->title}}'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>

@endsection


@section('css')
    <link href="//vjs.zencdn.net/5.8/video-js.min.css" rel="stylesheet">

    <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">
@endsection

@section('js')
    <script src="js/app.js"></script>

    <script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-youtube/2.1.1/Youtube.min.js"></script>


    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>

    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/jquery.noty.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/themes/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/promise.js"></script>

@endsection