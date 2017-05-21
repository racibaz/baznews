@extends($activeTheme . '::frontend.master')

@section('content')
    <article class="container" id="container">
        <ol class="breadcrumb">
            <li>
                <a href="#">Başlık</a>
            </li>
            <li>
                <a href="#">
                    Haber Kategorisi
                </a>
            </li>
            <li>
                En Son Sayfa Adı
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8" id="content">
                <div id="author-content">

                    <div class="author-box">
                        <div class="author-detail">
                            <div class="row">
                                <div class="col-lg-2 col-md-3">
                                    <div class="author-photo">
                                        <img src="http://www.prforexperts.com.au/wp-content/uploads/2013/02/61.png" alt="Author Name">
                                    </div><!-- /editor-photo -->
                                </div><!-- /.col -->
                                <div class="col-lg-10 col-md-9">
                                    <div class="author-info">

                                        <h2>{{$user->name}}</h2>

                                        <div class="bio-text">
                                            <p>{{$user->bio_note}}Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                                Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                            </p>
                                        </div>
                                        <span class="bio-long-btn">Genişlet</span>
                                    </div><!-- /.editor-info -->
                                    <div class="links">
                                        <ul class="nav nav-pills">
                                            <li>
                                                <a href="{{$user->web_site}}" target="_blank"><i class="fa fa-globe"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{$user->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{$user->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{$user->pinterest}}" target="_blank"><i class="fa fa-pinterest"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{$user->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{$user->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a>
                                            </li>
                                        </ul>
                                    </div><!-- /.editor-info -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.editor-detail -->
                    </div>

                    <div class="author-news">
                        <div class="title-section">
                            <h1>
                                <span>Editörün Haberleri</span>
                            </h1>
                        </div>
                        <div class="row">
                            @foreach($newsItems as $item)
                            <div class="col-lg-12 col-sm-6 col-md-12">
                                <div class="news-box module">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-3 col-xs-4">
                                            <div class="frame-image">
                                                <a href="{!! route('show_news', ['slug' => $item->slug]) !!}">
                                                    <img src="{{asset('images/news_images/2/196x150_2.jpg')}}" alt="{{$item->title}}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-9 col-xs-8">
                                            <div class="news-right-txt">
                                                <a href="{!! route('show_news', ['slug' => $item->slug]) !!}">
                                                    <h2>{{$item->title}}</h2>
                                                </a>
                                                <div class="news-meta-left">
                                                    <a href="#" class="meta-date" title="" ><i class="fa fa-clock-o"></i> 9 Şubat 2017</a>
                                                </div>
                                                <div class="news-excerpt">
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.col-lg-4 -->
                            @endforeach
                        </div>
                    </div>
                </div><!-- /.new-content -->
            </div><!-- /.col-md-8 -->
            <div class="col-md-4" id="sidebar">
                <div class="sidebar">
                    <div class="widget">
                        @foreach($widgets as $widget)
                            @widget($widget['namespace'])
                        @endforeach
                    </div>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->

    </article><!-- /.article -->
@endsection


@section('meta_tags')
    <title> {{ $user->name }}  </title>
    <meta name="keywords" content="{{$user->name}}"/>
    <meta name="description" content="{{$user->bio_note}}"/>
@endsection


@section('css')

@endsection

@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script type="text/javascript">

        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function() {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
    </script>
@endsection
