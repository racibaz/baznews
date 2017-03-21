<div class="widget">
    <div class="title-section">
        <h1>
            <span>{{trans('news.box_cuff_widget_title')}}</span>
        </h1>
    </div>
    <div>
        <ul class="news-list">
            @foreach($boxCuffNewsItmes as $boxCuffNewsItme)
                <li class="module">
                    <div class="imgwrap">
                        <a href="{!! route('show_news', ['slug' => $boxCuffNewsItme->slug]) !!}">
                            <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
                        </a>
                    </div><!-- /imgwrap -->
                    <div class="text">
                        <div class="title">
                            <a href="{!! route('show_news', ['slug' => $boxCuffNewsItme->slug]) !!}">
                                <h3>
                                    {{$boxCuffNewsItme->title}}
                                </h3>
                            </a>
                        </div><!-- /.title -->
                        <div class="excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                        <time class="new-date">
                            <span class="timeago">2017-02-25 23:07:46</span>
                        </time>
                    </div><!-- /.text -->
                </li>
            @endforeach
        </ul>
    </div>
</div>

