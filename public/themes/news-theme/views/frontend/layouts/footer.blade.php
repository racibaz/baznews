<footer class="footer">
    <div class="container">
        <div class="footer-head">
            <div class="row">
                <div class="col-sm-2 col-md-2">
                    <div class="ft-logo">
                        <img src="{{ asset('img/logo.jpg')}}" alt="Logo" width="80">
                    </div>
                </div>
                <div class="col-sm-10 col-md-10">
                    <ul class="footer-menu">
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