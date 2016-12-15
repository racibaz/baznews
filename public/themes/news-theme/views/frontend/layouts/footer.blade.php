<footer>
    <div class="container">
        <div class="footer-head">
            <div class="row">
                <div class="col-md-4">
                    <div class="ft-logo">
                        <img src="{{ Theme::asset($activeTheme . '::img/news-theme-logo.jpg')}}" alt="News Logo" width="80">
                    </div><!-- /.ft-logo -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-8">
                    <div class="row">


                        <div class="col-md-4">
                            <div class="ft-m">
                                <div class="m-ttl">
                                    <h4>
                                        <span>Kurumsal</span>
                                    </h4>
                                </div>
                                <div class="m-ct">
                                    <ul class="mn">
                                        @foreach(\Illuminate\Support\Facades\Cache::get('menus') as $menu)
                                            @if(!empty($menu->url))
                                                <li><a href="{{$menu->url}}" target="_blank"><i class="fa fa-book"></i>{!! $menu->name !!}</a></li>
                                            @elseif(!empty($menu->page->id))
                                                <li><a href="{!! route('page',['slug' => $menu->page->slug ]) !!}" title="{{$menu->name}}"><i class="fa fa-book"></i>{!! $menu->name !!}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div><!-- /.m-ct -->
                            </div><!-- /.ft-m -->
                        </div><!-- /.col-md-4 -->
                        <div class="col-md-4">
                            <div class="ft-m">
                                <div class="m-ttl">
                                    <h4>
                                        <span>Bağlantılar</span>
                                    </h4>
                                </div>
                                <div class="m-ct">
                                    <ul class="mn">
                                        <li><a href="new-details.html" title="..">Mobil Uygulamalar</a></li>
                                        <li><a href="new-details.html" title="..">Gazete Manşetleri</a></li>
                                        <li><a href="new-details.html" title="..">Yerel Haberler</a></li>
                                    </ul>
                                </div><!-- /.m-ct -->
                            </div><!-- /.ft-m -->
                        </div><!-- /.col-md-4 -->

                        <div class="col-md-4">
                            <div class="ft-m">
                                <div class="m-ttl">
                                    <h4>
                                        <span>Populer Konular</span>
                                    </h4>
                                </div>
                                <div class="m-ct">
                                    <ul class="mn">
                                        <li><a href="{{route('sitemaps')}}" title="sitemaps"><i class="fa fa-book"></i>{{trans('homepage.sitemaps')}}</a></li>
                                        <li><a href="{{route('rss')}}" title="rss.xml"><i class="fa fa-book"></i>Rss.xml</a></li>
                                        <li><a href="new-details.html" title="...">Bilinen Gerçekler</a></li>
                                    </ul>
                                </div><!-- /.m-ct -->
                            </div><!-- /.ft-m -->
                        </div><!-- /.col-md-4 -->
                    </div>
                </div>
            </div>
        </div><!-- /.footer-head -->
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-12">
                    <div class="cpy text-center">
                        <span>{{Redis::get('copyright')}}</span>
                    </div>
                </div>
            </div>
        </div><!-- /.footer-bottom -->
    </div>
</footer><!-- /.footer -->