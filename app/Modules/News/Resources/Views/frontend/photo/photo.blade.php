@extends($activeTheme . '::frontend.master')

@section('content')

    <article class="container" id="container">

        <div class="row">
            <div class="col-md-12">
                <div class="last-time" id="son-dakika">
                    <h4>Son Dakika:</h4>
                    <a href="new-details.html">Tortor Cras Nibh Egestas Vestibulum</a>
                </div>
            </div>
        </div>
        <div class="image-gallery">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-section">
                        <h1>
                            <span>Tristique Sollicitudin Porta Vehicula</span>
                        </h1>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="img-container">
                        <a href="#">
                            <div class="img">
                                <img src="img/img-gallery/cocuk.jpg" alt="" class="img-responsive">
                            </div>
                        </a>
                        <div class="pager">
                            <a href="" class="btn left">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a href="" class="btn right">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <ul class="pagination">
                            <li><a href="{{route('show_gallery_photos',['slug' => $firstPhoto->slug ])}}">İlk Sayfa</a></li>
                            @foreach($galleryPhotos as $index => $photo)
                                <li><a href="{{route('show_gallery_photos',['slug' => $photo->slug ])}}">{{++$index}}</a></li>
                            @endforeach
                            <li><a href="{{route('show_gallery_photos',['slug' => $lastPhoto->slug ])}}">Son Sayfa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="gallery-details">
                        <div class="gallery-text">
                            <p>
                                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                            </p>
                        </div><!-- /.gallery-text -->
                        <div class="time">
                            <small>
                                <i class="fa fa-clock-o"></i> 17 Aralık 2016, 03:42
                            </small>
                        </div><!-- /.time -->
                    </div><!-- /.gallery-details -->
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-7">
                    <div class="f-posts">
                        <div class="title-section">
                            <h1>
                                <span>Other Gallery</span>
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col col-md-4">
                                <a href="" class="news">
                    <span class="pic">
                        <img src="http://image.cdn.haber7.com/haber/haber7/bigmanset/2016/50/mostar_koprusu_halep_icin_isiklandirildi_1481828232_2568.jpg" alt="Mostar Köprüsü Halep için ışıklandırıldı" title="Mostar Köprüsü Halep için ışıklandırıldı">
                    </span>
                                </a>
                            </div><!-- /.col-->

                            <div class="col col-md-4">
                                <a href="" class="news">
                    <span class="pic">
                        <img src="http://image.cdn.haber7.com/haber/haber7/bigmanset/2016/50/mostar_koprusu_halep_icin_isiklandirildi_1481828232_2568.jpg" alt="Mostar Köprüsü Halep için ışıklandırıldı" title="Mostar Köprüsü Halep için ışıklandırıldı">
                    </span>
                                </a>
                            </div><!-- /.col-->

                            <div class="col col-md-4">
                                <a href="" class="news">
                    <span class="pic">
                        <img src="http://image.cdn.haber7.com/haber/haber7/bigmanset/2016/50/mostar_koprusu_halep_icin_isiklandirildi_1481828232_2568.jpg" alt="Mostar Köprüsü Halep için ışıklandırıldı" title="Mostar Köprüsü Halep için ışıklandırıldı">
                    </span>
                                </a>
                            </div><!-- /.col-->

                            <div class="col col-md-4">
                                <a href="" class="news">
                    <span class="pic">
                        <img src="http://image.cdn.haber7.com/haber/haber7/bigmanset/2016/50/mostar_koprusu_halep_icin_isiklandirildi_1481828232_2568.jpg" alt="Mostar Köprüsü Halep için ışıklandırıldı" title="Mostar Köprüsü Halep için ışıklandırıldı">
                    </span>
                                </a>
                            </div><!-- /.col-->
                        </div><!-- /.row -->
                    </div>
                </div>
                <div class="col-md-5">
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
                        <div class="widget">
                            <div class="title-section">
                                <h1>
                                    <span>Link Title</span>
                                </h1>
                            </div>
                            <ul>
                                <li><a href="#">Link1</a></li>
                                <li><a href="#">Link2</a></li>
                                <li><a href="#">Link3</a></li>
                                <li><a href="#">Link4</a></li>
                                <li><a href="#">Link5</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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


@section('css')
    <link href="//vjs.zencdn.net/5.8/photo-js.min.css" rel="stylesheet">

    <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">
@endsection

@section('js')
    <script src="js/app.js"></script>

    <script src="http://vjs.zencdn.net/5.8.8/photo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/photojs-youtube/2.1.1/Youtube.min.js"></script>


    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>

    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/jquery.noty.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/themes/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/promise.js"></script>

@endsection
