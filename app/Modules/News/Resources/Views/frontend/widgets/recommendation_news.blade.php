<div class="widget">
    <div class="title-section">
        <h1>
            <span>{{trans('news.recommendation_news_widget_title')}}</span>
        </h1>
    </div>
    <div>
        <ul class="news-list">
            @foreach($recommendationNewsItems as $recommendationNewsItem)
                <li class="module">
                    <div class="imgwrap">
                        <a href="{!! route('show_news', ['slug' => $recommendationNewsItem->news->slug]) !!}">
                            <img src="{{ Theme::asset($activeTheme . '::img/mini-spot/d_296_2.jpg')}}" alt="">
                        </a>
                    </div><!-- /imgwrap -->
                    <div class="text">
                        <div class="title">
                            <a href="{!! route('show_news', ['slug' => $recommendationNewsItem->news->slug]) !!}">
                                <h3>
                                    {{$recommendationNewsItem->news->title}}
                                </h3>
                            </a>
                        </div><!-- /.title -->
                        <div class="excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                        <time class="new-date">
                            <span class="timeago">{{$recommendationNewsItem->news->updated_at->diffForHumans() }}</span>
                        </time>
                    </div><!-- /.text -->
                </li>
            @endforeach
        </ul>
    </div>
</div>

