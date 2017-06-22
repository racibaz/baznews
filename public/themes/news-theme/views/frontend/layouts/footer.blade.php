<footer class="footer">
    <div class="container">
        <div class="footer-head">
            <div class="row">
                <div class="col-md-4">
                    <div class="ft-logo">
                        <img src="{{ asset('img/logo.jpg')}}" alt="Logo" width="80">
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
                                        @foreach(Cache::tags(['Setting', 'Menu'])->get('footer_menus') as $menu)
                                            @if(!empty($menu->route))
                                                <li><a href="{!! url($menu->route) !!}" target="{{$menu->target}}">{!! $menu->icon !!} {{$menu->name}}</a></li>
                                            @elseif(!empty($menu->url))
                                                <li><a href="{{$menu->url}}" target="{{$menu->target}}">{!! $menu->icon !!} {{$menu->name }}</a></li>
                                            @elseif(!empty($menu->page->id))
                                                <li><a href="{!! route('page',['slug' => $menu->page->slug ]) !!}" title="{{$menu->name}}">{!! $menu->icon !!} {{$menu->name}}</a></li>
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
                                        <li><a href="{{route('contact-index')}}" title="{{trans('contact.title')}}"><i class="fa fa-book"></i>{{trans('contact.title')}}</a></li>
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
                    <div class="algolia-logo pull-left">
                        <img src="{{ asset('img/Algolia_logo_bg-white.svg')}}" alt="Algolia" width="65">
                    </div>
                    <div class="cpy text-center">
                        <span>{{Cache::tags('Setting')->get('copyright')}}</span>
                    </div>
                </div>
            </div>
        </div><!-- /.footer-bottom -->
    </div>
</footer><!-- /.footer -->