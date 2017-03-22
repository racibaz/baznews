@extends($activeTheme . '::frontend.master')

@section('content')


    <article class="container" id="container">
        <div class="breadcrumbs">
            <p><a href="new-details.html">Home.</a>   \\   <a href="new-details.html">World News.</a>   \\   Single.</p>
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
                    <div class="new-img">
                        <img src="{{$record->thumbnail}}" alt="new text">
                    </div>
                    <div class="content" id="content">
                        <h1 class="ct-title">
                            {!! $record->title !!}<br />
                            <br /></h1>
                        <span class="meta"> Ekleme Zamanı : {!! $record->created_at !!} \\  Güncelleme Zamanı : {!! $record->updated_at !!}
                            <a href="new-details.html">World News.</a>   \\   <a href="new-details.html">No Coments.</a>
                        </span><!-- /.meta -->
                        <div class="ct-text">
                            {!! $record->content !!}
                        </div><!-- /.ct-text -->
                    </div><!-- /.content -->
                </div><!-- /.new-content -->
            </div><!-- /.col-md-8 -->
            <div class="col-md-4">
                <div class="sidebar">
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
                                <div role="tabpanel" class="tab-pane" id="son_dakika">
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
                    @foreach($widgets as $widget)
                        @widget($widget['namespace'])
                    @endforeach
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->

    </article><!-- /.article -->
    <div class="fb-comment-embed" data-href="{{Cache::tags('Setting')->get('url')}}/{{$record->slug}}" data-width="560" data-include-parent="false"></div>

    @if($record->is_comment)
        {!! Cache::tags('Setting')->get('disqus') !!}
    @endif


@endsection


@section('meta_tags')
    <title> {{ $record->title }}  </title>
    <meta name="keywords" content="{{$record->keywords}}"/>
    <meta name="description" content="{{$record->description}}"/>
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
