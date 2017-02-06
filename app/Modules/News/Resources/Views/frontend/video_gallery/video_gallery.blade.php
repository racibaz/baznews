@extends($activeTheme . '::frontend.master')

@section('content')

    <article>
        <div class="container" id="container">
            <div class="row">
                <div class="col col-md-12">
                    <div class="last-time" id="son-dakika">
                        <h4>Son Dakika:</h4>
                        <a href="new-details.html">Tortor Cras Nibh Egestas Vestibulum</a>
                    </div>
                </div>
            </div>

            <div class="big-title-section">
                <h1>
                    <span>{{$videoGallery->title}}</span>
                </h1>
            </div><!-- /.big-title-section -->

            <div class="video-main-show">
                <div class="row">
                    <div class="col col-md-7">
                        <div class="main-box">
                            <a href="{{route('show_videos',['slug' => $firstVideo->slug ])}}">
                                <img src="{{ asset('video_gallery/' . $videoGallery->id . '/photos/658x404_' . $videoGallery->thumbnail)}}" />
                                <div class="video-title">
                                    <h3>
                                        <span>{{$videoGallery->title}}</span>
                                    </h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col col-md-5">
                        <div class="mini-card-boxes">
                            <div class="row">
                                @foreach($galleryVideos as $video)
                                    <div class="col col-md-6 col-xs-6">
                                            <div class="mini-box">
                                                <a href="{{route('show_videos',['slug' => $video->slug ])}}">
                                                    <img src="{{ asset('video_gallery/' . $videoGallery->id . '/photos/224x195_' . $videoGallery->thumbnail)}}" />
                                                    <div class="video-title">
                                                        <h3>
                                                            <span>{{$video->title}}</span>
                                                        </h3>
                                                    </div>
                                                </a>
                                            </div><!-- /.mini-box -->
                                    </div><!-- /.col -->
                                @endforeach
                            </div><!-- /.row -->
                        </div><!-- /.mini-card-boxes -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.video-main-show -->

            <div class="title-section">
                <h1>
                    <span>Last Videos</span>
                </h1>
            </div><!-- /.title-section -->

            <div class="videos">
                <div class="row">
                    @foreach($lastVideos as $lastVideo)
                        <div class="col-md-2 col-sm-4 col-xs-6">
                            <div class="r-box">
                                <a href="{{route('show_videos',['slug' => $lastVideo->slug ])}}">
                                    <img src="{{ asset('videos/' . $lastVideo->id . '/165x90_' . $lastVideo->thumbnail)}}"   />
                                    <i class="icon"></i>
                                    <span class="c-text">{{$lastVideo->name}}</span>
                                </a>
                            </div>
                        </div><!-- /.col -->
                    @endforeach
                </div><!-- /.row -->
            </div><!-- /.related-videos -->

            <div class="videos">
                <div class="title-section">
                    <h1>
                        <span>Other Videos</span>
                        <a href="video-details.html" class="btn btn-primary btn-xs m-v-btn">Daha fazla</a>
                    </h1>
                </div><!-- /.title-section -->
                <div class="row">
                    @if($randomVideos)
                        @foreach($randomVideos as $randomVideo)
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="r-box">
                                    <a href="{{route('show_videos',['slug' => $randomVideo->slug ])}}">
                                        <img src="{{ asset('videos/' . $randomVideo->id . '/165x90_' . $randomVideo->thumbnail)}}"   />
                                        <i class="icon"></i>
                                        <span class="c-text">{{$randomVideo->name}}</span>
                                    </a>
                                </div><!-- /.r-box -->
                            </div><!-- /. -->
                        @endforeach
                    @endif
                </div><!-- /.row -->
            </div><!-- /.videos -->

            <div class="populars">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section">
                            <h1>
                                <span>Popular Videos</span>
                            </h1>
                        </div><!-- /.title-section -->
                    </div>
                </div>
                <div class="row">
                    <div class="videos">
                        <div class="col-md-5 hero">
                            <div class="box">
                                <a href="#">
                                    <img alt="Nişantaşı'ndan tinerci yolunu kestiği adamı yaktı" width="100%" src="img/video-manset/tab-big-image.jpg">
                                    <span class="title">
                            <strong>Nişantaşı'ndan tinerci yolunu kestiği adamı yaktı</strong>
                        </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-5 right">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#">
                                        <img width="100%" src="img/video-manset/tab-image.jpg">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="title">
                                        Alman televizyonu ZDF'den 2. Erdoğan skandalı
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#">
                                        <img width="100%" src="img/video-manset/tab-image.jpg">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="title">
                                        FETÖ sorumluları toplantı halindeyken yakalandı
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="videos hide">t1</div>
                    <div class="videos hide">t2</div>
                    <div class="videos hide">t3</div>
                    <div class="videos hide">t4</div>
                    <div class="videos hide">t5</div>
                    <div class="videos hide">t6</div>
                    <div class="col-md-2 visible-lg visible-md">
                        <ul class="tabs">
                            @foreach($videoCategories as $videoCategory)
                                @if ($loop->first)
                                    <li class="active"><a href="javascript:;">{{$videoCategory->name}}</a></li>
                                @else
                                    <li><a href="#">{{$videoCategory->name}}</a></li>
                                @endif

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div><!-- /.populars -->
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
